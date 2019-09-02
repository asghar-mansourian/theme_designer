<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function categories($parent_id = 0)
    {
        if ($parent_id == 0) {
            return response()->json(Category::parents()->select('id', 'name as label')->get());
        } else
            return response()->json(Category::find($parent_id)->children()->select('id', 'name as label')->get());
    }
}