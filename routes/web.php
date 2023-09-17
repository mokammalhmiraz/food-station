<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("Oni Tech", [FrontendController::class, 'OniTech']);
Route::get("contact", [FrontendController::class, 'contact']);

Route::get("products", [ProductController::class, 'product']);

Route::get("orderlist", [OrderController::class, 'orderlist']);
Route::post("order.insert", [OrderController::class, 'insert']);
Route::get("order.delete.{order_id}", [OrderController::class, 'delete']);
Route::get("order.update.{order_id}", [OrderController::class, 'update']);
Route::get("order.deliver.{order_id}", [OrderController::class, 'deliver']);
Route::get("order.cancel.{order_id}", [OrderController::class, 'cancel']);

Route::get("items", [ItemsController::class, 'items']);
Route::post("items.insert", [ItemsController::class, 'insert']);
Route::get("items.delete.{items_id}", [ItemsController::class, 'delete']);

// Route::get("orderlist", [UserController::class, 'order_list']);
Route::get("user", [UserController::class, 'userlist']);

Route::get("category", [CategoryController::class, 'Category']);
Route::post("category.insert", [CategoryController::class, 'insert']);
Route::get("category.delete.{category_id}", [CategoryController::class, 'delete']);

Route::get("subcategory", [SubCategoryController::class, 'Sub_Category']);
Route::post("subcategory.insert", [SubCategoryController::class, 'insert']);

// Route::get("Oni Tech", function(){
//     echo "hello world!";
// });

Route::get('/', function () {
    return view('onitech');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index']);
