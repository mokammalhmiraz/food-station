<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function Category()
    {
        $categorys = Category::latest()->get();
        $total_category = Category::count();
        return view('category.index', compact('categorys', 'total_category'));
    }
    function insert(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ],[
            // 'category_name.required' => 'CUSTOM MESSAGE',
            // 'category_name.unique' => 'CUSTOM MESSAGE'
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now()
        ]);

        return back()->with('status', 'Category Added Successfully!');
    }

    function delete($category_id)
    {
        Category::find($category_id)->delete();
        return back();
    }
}
