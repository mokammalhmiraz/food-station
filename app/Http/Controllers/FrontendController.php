<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function OniTech(){
        return view('onitech');
    }
    function contact(){
        echo "This is Oni Tech Contact";
    }



}
