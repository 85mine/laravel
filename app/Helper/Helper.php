<?php

if (!function_exists('menu_active')) {

    function menu_active($url)
    {
        $class = null;
        $segments = session('segments');
        $segment = (count($segments) && isset($segments[0])) ? $segments[0] : null;
        if(!$segment)
            return $class;

        if(in_array($segment, explode('/', $url)))
            $class = 'active';

        return $class;
    }
}