<?php

use Illuminate\Support\Str;
if(!function_exists('currentSelectedItem')){
    function currentSelectedItem($value, $old_value)
    {
        return $value == $old_value ? 'selected' : '';
    }
}

if(!function_exists('matchSlug')){
    function matchSlug($newSlug,$oldSlug)
    {
       return $newSlug == $oldSlug ? $oldSlug : $newSlug;
    }
}
if(!function_exists('makeSlug')){
     function makeSlug($slug = '')
    {
        $slug = Str::slug($slug);
        return $slug;
    }
}




