<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Orderlist;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function orderlist()
    {
        // return view('orderlist');
        // $total_price = Orderlist::where('added_by', '=', Auth::id())->sum('product_price');
        $added_id = Orderlist::where('added_by', '=', Auth::id());
        return view('orderlist', [
            'orders' => Orderlist::all()->where('added_by', '=', Auth::id()),
            'order_list' => Orderlist::Paginate(5),
            'total_order' => Orderlist::where('added_by', '=', Auth::id())->count(),
            'selected_order' => Orderlist::where('order_status', '=', 1)->where('added_by', '=', Auth::id())->count(),
            'total_orders' => Orderlist::count(),
            'total_price' => Orderlist:: where('order_status', '=', 1)->where('added_by', '=', Auth::id())->sum('product_price'),
            // 'item_list' => Item::latest()->get(),
            // 'total_item' => Item::count()
        ]);
    }

    function insert(Request $order)
    {
        if ((Auth::id()) == true) {

            Orderlist::insert([
                'product_name' => $order->product_name,
                'product_price' => $order->product_price,
                'product_catagory' => $order->product_category,
                'added_by' => Auth::id(),
                'created_at' => Carbon::now(),
                'order_status' => 0,
                'deliver_status' => 0
            ]);
            return back();
        } else {
            return view('auth.login');
        }
    }

    function delete($order_id){
        Orderlist::find($order_id)->delete();
        return back();
    }
    function update($order_id){
        // Orderlist::find($order_id)->update([
        //     'order_status' => 1
        // ]);
        $order_item= Orderlist::find($order_id);
        $order_item->order_status=1;
        $order_item->save();
        return back();
    }
    function deliver($order_id){
        // Orderlist::find($order_id)->update([
        //     'order_status' => 1
        // ]);
        $order_item= Orderlist::find($order_id);
        $order_item->deliver_status=1;
        $order_item->save();
        return back();
    }
    function cancel($order_id){
        // Orderlist::find($order_id)->update([
        //     'order_status' => 1
        // ]);
        $order_item= Orderlist::find($order_id);
        $order_item->order_status=-1;
        $order_item->save();
        return back();
    }
}
