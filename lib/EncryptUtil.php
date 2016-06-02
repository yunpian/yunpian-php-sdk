<?php
/** 加密工具类
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/19
 * Time: 下午6:18
 */



class EncryptUtil
{
    public static function encryptForYunpian($msg, $key)
    {
        $key = EncryptUtil::getTeaKey($key);
        $info=EncryptUtil::getBytes($msg);
        $retLen = count($info) + 8 - count($info) % 8;

    }
    public static function encrypt($content, $offset, $key, $times){
        $tempInt=EncryptUtil::bytesToInteger($content,$offset);
        $y=$tempInt[0];
        $z=$tempInt[1];
        $sum=0;
        $a=$key[0];$b=$key[1];$c=$key[2];$d=$key[3];
        $delta=0x9e3779b9;
        for ($i = 0; $i < $times; $i++) {
            $sum += $delta;
            $y += (($z<<4) + $a) ^ ($z + $sum) ^ (($z>>5) + $b);
            $z += (($y<<4) + $c) ^ ($y + $sum) ^ (($y>>5) + $d);
        }
        $tempInt[0]=$y;
        $tempInt[1]=$z;
        return EncryptUtil::integerToBytes($tempInt, 0);


    }
    public static function decrypt($bytes){

    }
    public static function bytesToInteger($bytes, $position) {
        $val = 0;
        $val = $bytes[$position + 3] & 0xff;
        $val <<= 8;
        $val |= $bytes[$position + 2] & 0xff;
        $val <<= 8;
        $val |= $bytes[$position + 1] & 0xff;
        $val <<= 8;
        $val |= $bytes[$position] & 0xff;
        return $val;
    }
    public static function integerToBytes($val) {
        $byt = array();
        $byt[0] = ($val & 0xff);
        $byt[1] = ($val >> 8 & 0xff);
        $byt[2] = ($val >> 16 & 0xff);
        $byt[3] = ($val >> 24 & 0xff);
        return $byt;
    }


    public static function getBytes($string)
    {
        $bytes = array();
        for ($i = 0; $i < strlen($string); $i++) {
            $bytes[] = ord($string[$i]);
        }
        return $bytes;
    }

    public static function getTeaKey($key)
    {
        $ints = array();
        $ints[0] = intval(substr($key, 0, 8),16);
        $ints[1] = intval(substr($key, 8, 8),16);
        $ints[2] = intval(substr($key, 16, 8),16);
        $ints[3] = intval(substr($key, 24, 8),16);
        return $ints;

    }
    public static function strToHex($string)//字符串转十六进制
    {
        $hex = "";
        for ($i = 0; $i < strlen($string); $i++)
            $hex .= dechex(ord($string[$i]));
        $hex = strtoupper($hex);
        return $hex;
    }



}

print_r(EncryptUtil::getTeaKey("12345678123456781234567812345678"));
print_r(ord('a'));
