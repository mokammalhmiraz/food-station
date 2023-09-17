<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\Subcategory;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function Sub_Category(){
        // $total_subcategory = Subcategory::count();
        return view('subcategory.subcategory', [
            'categories' => Category::latest()->get(),
            'subcategories' => Subcategory::Paginate(5)
        ]);
    }
    function insert(Request $subcat){

        print_r($subcat->all());

        $subcat->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required'
        ], [
            // 'category_name.required' => 'CUSTOM MESSAGE',
            // 'category_name.unique' => 'CUSTOM MESSAGE'
        ]);

        Subcategory::insert([
            'category_id' => $subcat->category_id,
            'sub_category_name' => $subcat->sub_category_name,
            'added_by' => Auth::id(),
            'created_at' => Carbon::now()
        ]);
        return back()->with('status', 'Sub Category Added Successfully!');

    }
}
