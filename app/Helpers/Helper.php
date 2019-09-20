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

function get_string_between($string, $start, $end)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function put_string_between($string, $start, $end, $replacement)
{
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;

    $part1 = substr($string, 0, $ini);
    $part2 = substr($string, $len);
    return $part1 . $replacement . $part2;
}

function get_blade_section(string $path, string $section)
{
    $contents = file_get_contents($path);
    $sectionNameStart = "@section('".$section."')";
    $sectionNameEnd = "@endsection";

    return get_string_between($contents, $sectionNameStart, $sectionNameEnd);
}

function put_blade_section(string $path, string $section, $replacement)
{
    $contents = file_get_contents($path);
    $sectionNameStart = "@section('".$section."')";
    $sectionNameEnd = "@endsection";

    return put_string_between($contents, $sectionNameStart, $sectionNameEnd, '\\n' . $replacement . '\\n');
}
