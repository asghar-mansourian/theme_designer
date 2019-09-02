<?php
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