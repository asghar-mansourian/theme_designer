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