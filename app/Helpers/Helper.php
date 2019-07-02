<?php

function system_asset(string $string)
{
    $name = $string;
    if (substr($string, 0, 1) == '/' || substr($string, 0, 1) == '\\') {
        $name = DIRECTORY_SEPARATOR . substr($string, 1);
    } else {
        $name = DIRECTORY_SEPARATOR . $string;
    }
    $path = 'system' . $name;
    return asset($path);
}

function admin_asset(string $string)
{
    $name = $string;
    if (substr($string, 0, 1) == '/' || substr($string, 0, 1) == '\\') {
        $name = DIRECTORY_SEPARATOR . substr($string, 1);
    } else {
        $name = DIRECTORY_SEPARATOR . $string;
    }
    $path = \App\Config::getValue('admin.theme.current') . $name;
    return asset($path);
}

function front_asset(string $string)
{
    $name = $string;
    if (substr($string, 0, 1) == '/' || substr($string, 0, 1) == '\\') {
        $name = DIRECTORY_SEPARATOR . substr($string, 1);
    } else {
        $name = DIRECTORY_SEPARATOR . $string;
    }
    $path = \App\Config::getValue('admin.theme.current') . $name;
    return asset($path);
}
