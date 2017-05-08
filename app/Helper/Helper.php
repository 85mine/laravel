<?php
use Carbon\Carbon;

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

if (!function_exists('datetime_now')) {

    function datetime_now()
    {
       return Carbon::now()->format('Y-m-d H:i:s');
    }
}
