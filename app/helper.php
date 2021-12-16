<?php

if (!function_exists('supportedOperators')) {

    function supportedOperators()
    {
        return array_keys(config('calculator.emoji_operators'));
    }

}
