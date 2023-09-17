<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class ItemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // function Sub_Category()
    // {
    //     // $total_subcategory = Subcategory::count();
    //     return view('subcategory.subcategory', [
    //         'categories' => Category::latest()->get(),
    //         'subcategories' => Subcategory::Paginate(5)
    //     ]);
    // }

    function items()
    {
        return view('itemlist',[
            'categories' => Category::latest()->get(),
            'item_list' => Item::latest()->get(),
            'total_item' => Item::count()
        ]);
    }

    function insert(Request $items)
    {

        $items->validate([
            'category_id' => 'required',
            'item_name' => 'required',
            'item_price' => 'required',
            'item_review' => 'required',
        ], [
            // 'category_name.required' => 'CUSTOM MESSAGE',
            // 'category_name.unique' => 'CUSTOM MESSAGE'
        ]);
        if ( ($items->item_offer) == true) {

            $item_image_id = Item::insertGetId([
                'category_id' => $items->category_id,
                'item_name' => $items->item_name,
                'item_price' => $items->item_price,
                'item_review' => $items->item_review,
                'item_offer' => $items->item_offer,
                'added_by' => Auth::id(),
                'created_at' => Carbon::now()
            ]);
        }else{
            $item_image_id = Item::insertGetId([
                'category_id' => $items->category_id,
                'item_name' => $items->item_name,
                'item_price' => $items->item_price,
                'item_review' => $items->item_review,
                'item_offer' => 0,
                'added_by' => Auth::id(),
                'created_at' => Carbon::now()
            ]);
        }
        $new_item_image = $items->file('item_image'); //get photo
        $new_item_image_name = $item_image_id . "." . $new_item_image->getClientOriginalExtension();

        Image::make($new_item_image)->save(base_path('public/uploads/item_image/' . $new_item_image_name));

        Item::find($item_image_id)->update([
            'item_image' => $new_item_image_name
        ]);
        return back()->with('status', 'Item Added Successfully!');
    }
    function delete($items_id){
        Item::find($items_id)->delete();
        return back();
    }
}
