<?php

namespace App\Http\Controllers;

use App\Models\User;

Use Auth;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Orderlist;

class ProductController extends Controller
{

    function product()
    {
        $category = Category::latest()->get();
        $item = Item::latest()->get();
        return view('product', compact('item', 'category'));
    }
}
