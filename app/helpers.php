<?php
/**
 * Created by PhpStorm.
 * User: donghyunkim
 * Date: 2017. 12. 3.
 * Time: PM 8:16
 */
if (!function_exists('markdown')) {
    function markdown($text=null)
    {
        return app(ParsedownExtra::class)->text($text);
    }
}