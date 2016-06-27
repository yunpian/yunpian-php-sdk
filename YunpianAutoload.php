<?php
/**
 * Created by PhpStorm.
 * User: bingone
 * Date: 16/1/20
 * Time: 上午10:20
 */
require_once 'config.php';
function YAutoload($classname)
{
    $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'lib/'. $classname . '.php';
    //echo $filename;
    if (is_readable($filename)) {
        require $filename;
    }
}

if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('YAutoload', true, true);
    } else {
        spl_autoload_register('YAutoload');
    }
} else {
    function __autoload($classname)
    {
        YAutoload($classname);
    }
}
?>
