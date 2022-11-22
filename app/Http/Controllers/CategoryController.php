<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "title" => "Category",
            "categories" => Category::all(),
        ];

        return view("dashboard.admin.category.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            "title" => "Category Add",
            "categories" => Category::all(),
            "types" => Type::with("category")->get()
        ];

        return view("dashboard.admin.category.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "type_id" => "required",
                "name" => "required",
                "icon" => "required",
            ],
            [
                "type_id.required" => "Type must be selected."
            ]
        );

        $data = $request->except("_token");
        Category::create($data);

        return redirect()->route("category.index")->with("message", "Category successfully added.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [
            "title" => "Category Add",
            "category" => $category,
            "types" => Type::with("category")->get()
        ];

        return view("dashboard.admin.category.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                "type_id" => "required",
                "name" => "required",
                "icon" => "required",
            ],
            [
                "type_id.required" => "Type must be selected."
            ]
        );

        $data = $request->except("_token");
        Category::find($category->id)->update($data);

        return redirect()->route("category.index")->with("message", "Category successfully edited.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
    }
}
