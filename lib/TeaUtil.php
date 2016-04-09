<?php
/**
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/19
 * Time: 下午6:21
 */


$date = '';
$key = '002d88e24fdaf41801d1d18ef8109996';
$t = new TeaUtil ();
$tea = $t->encrypt($date, $key);
$eetea = $t->decrypt($tea, $key);
print $eetea;
var_dump(base64_encode($tea));
var_dump($eetea);

class TeaUtil
{
    public static function getBytes($string)
    {
        $bytes = array();
        for ($i = 0; $i < strlen($string); $i++) {
            $bytes[] = ord($string[$i]);
        }
        return $bytes;
    }

    private $a, $b, $c, $d;
    private $n_iter;

    public function __construct()
    {
        $this->setIter(32);
    }

    private function setIter($n_iter)
    {
        $this->n_iter = $n_iter;
    }

    private function getIter()
    {
        return $this->n_iter;
    }

    public function encrypt($data, $key)
    {
        // resize data to 32 bits (4 bytes)
        $n = $this->_resize($data, 8);

        // convert data to long
        $data_long [0] = $n;
        $n_data_long = $this->_str2long($n, $data, $data_long);

        // resize data_long to 64 bits (2 longs of 32 bits)
        $n = count($data_long);
        if (($n & 1) == 1) {
            $data_long [$n] = chr(0);
            $n_data_long++;
        }

        // resize key to a multiple of 128 bits (16 bytes)
        $this->_resize($key, 16, true);
        if ('' == $key)
            $key = '0000000000000000';

        // convert key to long
        $n_key_long = $this->_str2long(0, $key, $key_long);

        // encrypt the long data with the key
        $enc_data = '';
        $w = array(0, 0);
        $j = 0;
        $k = array(0, 0, 0, 0);
        for ($i = 0; $i < $n_data_long; ++$i) {
            // get next key part of 128 bits
            if ($j + 4 <= $n_key_long) {
                $k [0] = $key_long [$j];
                $k [1] = $key_long [$j + 1];
                $k [2] = $key_long [$j + 2];
                $k [3] = $key_long [$j + 3];
            } else {
                $k [0] = $key_long [$j % $n_key_long];
                $k [1] = $key_long [($j + 1) % $n_key_long];
                $k [2] = $key_long [($j + 2) % $n_key_long];
                $k [3] = $key_long [($j + 3) % $n_key_long];
            }
            $j = ($j + 4) % $n_key_long;

            $this->_encipherLong($data_long [$i], $data_long [++$i], $w, $k);

            // append the enciphered longs to the result
            $enc_data .= $this->_long2str($w [0]);
            $enc_data .= $this->_long2str($w [1]);
        }

        return $enc_data;
    }

    public function decrypt($enc_data, $key)
    {
        // convert data to long
        $n_enc_data_long = $this->_str2long(0, $enc_data, $enc_data_long);

        // resize key to a multiple of 128 bits (16 bytes)
        $this->_resize($key, 16, true);
        if ('' == $key)
            $key = '0000000000000000';

        // convert key to long
        $n_key_long = $this->_str2long(0, $key, $key_long);

        // decrypt the long data with the key
        $data = '';
        $w = array(0, 0);
        $j = 0;
        $len = 0;
        $k = array(0, 0, 0, 0);
        $pos = 0;

        for ($i = 0; $i < $n_enc_data_long; $i += 2) {
            // get next key part of 128 bits
            if ($j + 4 <= $n_key_long) {
                $k [0] = $key_long [$j];
                $k [1] = $key_long [$j + 1];
                $k [2] = $key_long [$j + 2];
                $k [3] = $key_long [$j + 3];
            } else {
                $k [0] = $key_long [$j % $n_key_long];
                $k [1] = $key_long [($j + 1) % $n_key_long];
                $k [2] = $key_long [($j + 2) % $n_key_long];
                $k [3] = $key_long [($j + 3) % $n_key_long];
            }
            $j = ($j + 4) % $n_key_long;

            $this->_decipherLong($enc_data_long [$i], $enc_data_long [$i + 1], $w, $k);

            // append the deciphered longs to the result data (remove padding)
            if (0 == $i) {
                $len = $w [0];
                if (4 <= $len) {
                    $data .= $this->_long2str($w [1]);
                } else {
                    $data .= substr($this->_long2str($w [1]), 0, $len % 4);
                }
            } else {
                $pos = ($i - 1) * 4;
                if ($pos + 4 <= $len) {
                    $data .= $this->_long2str($w [0]);

                    if ($pos + 8 <= $len) {
                        $data .= $this->_long2str($w [1]);
                    } elseif ($pos + 4 < $len) {
                        $data .= substr($this->_long2str($w [1]), 0, $len % 4);
                    }
                } else {
                    $data .= substr($this->_long2str($w [0]), 0, $len % 4);
                }
            }
        }
        return $data;
    }

    private function _encipherLong($y, $z, &$w, &$k)
    {
        $sum = ( integer )0;
        $delta = 0x9E3779B9;
        $n = ( integer )$this->n_iter;

        while ($n-- > 0) {
            //C v0 += ((v1<<4) + k0) ^ (v1 + sum) ^ ((v1>>5) + k1);
            //C v1 += ((v0<<4) + k2) ^ (v0 + sum) ^ ((v0>>5) + k3);
            $sum = $this->_add($sum, $delta);
            $y = $this->_add($y, $this->_add(($z << 4), $this->a) ^ $this->_add($z, $sum) ^ $this->_add($this->_rshift($z, 5), $this->b));
            $z = $this->_add($z, $this->_add(($y << 4), $this->a) ^ $this->_add($y, $sum) ^ $this->_add($this->_rshift($y, 5), $this->b));
        }

        $w [0] = $y;
        $w [1] = $z;
    }

    private function _decipherLong($y, $z, &$w, &$k)
    {
        // sum = delta<<5, in general sum = delta * n
        $sum = 0xC6EF3720;
        $delta = 0x9E3779B9;
        $n = ( integer )$this->n_iter;

        while ($n-- > 0) {
            //C v1 -= ((v0<<4) + k2) ^ (v0 + sum) ^ ((v0>>5) + k3);
            //C v0 -= ((v1<<4) + k0) ^ (v1 + sum) ^ ((v1>>5) + k1);
            $z = $this->_add($z, -($this->_add(($y << 4), $this->a) ^ $this->_add($y, $sum) ^ $this->_add($this->_rshift($y, 5), $this->b)));
            $y = $this->_add($y, -($this->_add(($z << 4), $this->a) ^ $this->_add($z, $sum) ^ $this->_add($this->_rshift($z, 5), $this->b)));
            $sum = $this->_add($sum, -$delta);
        }

        $w [0] = $y;
        $w [1] = $z;
    }

    private function _resize(&$data, $size, $nonull = false)
    {
        $n = strlen($data);
        $nmod = $n % $size;
        if (0 == $nmod)
            $nmod = $size;

        if ($nmod > 0) {
            if ($nonull) {
                for ($i = $n; $i < $n - $nmod + $size; ++$i) {
                    $data [$i] = $data [$i % $n];
                }
            } else {
                for ($i = $n; $i < $n - $nmod + $size; ++$i) {
                    $data [$i] = chr(0);
                }
            }
        }
        return 8-$nmod;
    }

    private function _hex2bin($str)
    {
        $len = strlen($str);
        return pack('H' . $len, $str);
    }

    private function _str2long($start, &$data, &$data_long)
    {
        $n = strlen($data);

        $tmp = unpack('N*', $data);
        $j = $start;

        foreach ($tmp as $value)
            $data_long [$j++] = $value;

        return $j;
    }

    private function _long2str($l)
    {
        return pack('N', $l);
    }


    private function _rshift($integer, $n)
    {
        // convert to 32 bits
        if (0xffffffff < $integer || -0xffffffff > $integer) {
            $integer = fmod($integer, 0xffffffff + 1);
        }

        // convert to unsigned integer
        if (0x7fffffff < $integer) {
            $integer -= 0xffffffff + 1.0;
        } elseif (-0x80000000 > $integer) {
            $integer += 0xffffffff + 1.0;
        }

        // do right shift
        if (0 > $integer) {
            $integer &= 0x7fffffff; // remove sign bit before shift
            $integer >>= $n; // right shift
            $integer |= 1 << (31 - $n); // set shifted sign bit
        } else {
            $integer >>= $n; // use normal right shift
        }

        return $integer;
    }

    private function _add($i1, $i2)
    {
        $result = 0.0;

        foreach (func_get_args() as $value) {
            // remove sign if necessary
            if (0.0 > $value) {
                $value -= 1.0 + 0xffffffff;
            }

            $result += $value;
        }

        // convert to 32 bits
        if (0xffffffff < $result || -0xffffffff > $result) {
            $result = fmod($result, 0xffffffff + 1);
        }

        // convert to signed integer
        if (0x7fffffff < $result) {
            $result -= 0xffffffff + 1.0;
        } elseif (-0x80000000 > $result) {
            $result += 0xffffffff + 1.0;
        }

        return $result;
    }
}

?>