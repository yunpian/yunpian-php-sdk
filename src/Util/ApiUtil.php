<?php

namespace Yunpian\Sdk\Util;

class ApiUtil {

    /**
     *
     * @param array $text            
     * @param string $sepr            
     * @return string
     */
    static function urlEncodeAndLink(array $text, $sepr = ',') {
        if (empty($text)) return '';
        
        $count = count($text);
        $r = urlencode($text[0]);
        for($i = 1; $i < $count; $i++) {
            $r .= $sepr . urlencode($text[$i]);
        }
        return $r;
    }

}