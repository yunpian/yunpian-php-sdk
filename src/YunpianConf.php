<?php

namespace Yunpian\Sdk;

/**
 *
 * @author dzh
 * @since 1.0
 */
class YunpianConf implements Constant\YunpianConstant {
    
    /**
     *
     * @var array
     */
    private $conf = [];

    /**
     * to upsert $conf
     *
     * @param string $apikey            
     * @param array $conf            
     * @return \Yunpian\Sdk\YunpianConf
     */
    function with($apikey, array $conf = []) {
        if (!empty($conf)) foreach ($conf as $key => $value) {
            $this->conf[$key] = $value;
        }
        
        if (isset($apikey)) $this->conf[self::YP_APIKEY] = $apikey;
        
        return $this;
    }

    /**
     * load yunpian.ini to initialize YunpianConf firstly:
     * <p>
     *
     * </p>
     *
     * @return Yunpian\Sdk\YunpianConf
     */
    function init() {
        if (is_null($this->conf)) {
            $this->conf = [];
        }
        
        $yp = parse_ini_file("yunpian.ini");
        foreach ($yp as $key => $value) {
            $this->conf[$key] = $value;
        }
        return $this;
    }

    /**
     *
     * @param string $key            
     * @param mixed $defval            
     * @return mixed
     */
    function conf($key = null, $defval = null) {
        if (is_null($key)) return $this->conf;
        $val = $this->conf[$key];
        return is_null($val) ? $defval : $val;
    }

    /**
     *
     * @return string
     */
    function apikey() {
        return $this->conf[self::YP_APIKEY];
    }

}