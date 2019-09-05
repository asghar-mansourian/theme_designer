<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.categories.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, Category $category)
    {
        $validate =     Validator::make($request->all(), [
            'slug' => 'required|unique:categories'
        ]);
        if ($validate->fails()) {
            return response()->json(['slug' => 'فیلد اسلاق نباید تکراری باشد'], 400);
        }
        $category->name = $request->name;
        $category->img = upload_image('images/category/', $request->image);
        ($request->parent_id) ? $category->parent_id = $request->parent_id : $category->parent_id = 0;
        $category->position = $request->position;
        $category->slug = $request->slug;
        $category->type = $request->type;
        $category->priority = 1;
        $category->save();
        return response()->json(['success' => 'با موفقیت ثبت شد.'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}