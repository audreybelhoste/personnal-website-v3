<?php
/*
|--------------------------------------------------------------------------
| Debug functions
| Appeller la fonction dump($var) => Details la variables $var
| Appeler la fonction dd($var) => Details la variables $var et die en plus 
|--------------------------------------------------------------------------
*/
if (WP_DEBUG) {
    // require_once ABSPATH . 'wp-content/plugins/ci_debug/vendor/autoload.php';
    require_once dirname(__DIR__) . '/debug/vendor/autoload.php';

    /**
     * Dump variable.
     */
    if (!function_exists('dump')) {

        function dump()
        {
            call_user_func_array('dump', func_get_args());
        }
    }

    /**
     * Dump variables and die.
     */
    if (!function_exists('dd')) {

        function dd()
        {
            call_user_func_array('dump', func_get_args());
            die();
        }
    }
} else {

    /**
     * Dump variable.
     */
    if (!function_exists('dump')) {

        function dump()
        {
        }
    }

    /**
     * Dump variables and die.
     */
    if (!function_exists('dd')) {

        function dd()
        {
        }
    }
}
