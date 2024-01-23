<?php

use ezyang\HTMLPurifier as PurifierLib;
class Sanitize {
    public static function HTML($string, $allowHtml = false) {
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML', 'Allowed', $allowHtml);
        if($allowHtml == false) {
            $string = strip_tags($string);
        }
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($string);
    }
}