<?php

use Ramsey\Uuid\Uuid;

if (!function_exists('get_all_category_positions')) {
    function get_all_category_positions()
    {
        $all_positions = [];
        foreach (config('enums.category_positions') as $category_position) {
            foreach ($category_position as $items) {
                array_push($all_positions, $items);
            }
        }
        return $all_positions;
    }
}
if (!function_exists('upload_image')) {
    function upload_image($dir, $file)
    {
        if ($file) {
            $fileName = 'image-' . Uuid::uuid4()->toString() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($dir), $fileName);
            return $fileName;
        }
    }
}
if (!function_exists('position_fetch')) {
    function position_fetch($position)
    {
        switch ($position) {
            case 'PT1':
                return 'بالای صفحه گروه یک';
                break;
            case 'PT2':
                return 'بالای صفحه گروه دوم';
                break;
            case 'PC1':
                return 'وسط صفحه گروه یکم';
                break;
            case 'PC2':
                return 'وسط صفحه گروه دوم';
                break;
            case 'PB1':
                return 'پایین صفحه گروه یکم';
                break;
            case 'PB2':
                return 'پایین صفحه گروه دوم';
        }
    }
}