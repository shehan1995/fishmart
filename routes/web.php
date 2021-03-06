<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});

Route::get('home','HomeController@index');
Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration'); 
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');



Route::get('dashboard/admin/fish','AdminController@createFish');
Route::post('dashboard/admin/post-createFish','AdminController@postCreateFish');

Route::get('dashboard/seller/profile-edit','SellerController@editProfile');
Route::post('dashboard/seller/post-editProfile','SellerController@postEditProfile');
Route::get('dashboard/seller/createAdd','SellerController@createAdd');
Route::post('dashboard/seller/post-createAdd','SellerController@postCreateAdd');
Route::get('dashboard/seller/orders','SellerController@viewOrders');
Route::post('dashboard/seller/post-order/{orderStatus}','SellerController@postSetOrder')->name('setOrderStatus');

Route::get('dashboard/buyer/createAdd','BuyerController@createAdd');
Route::post('dashboard/buyer/post-createAdd','BuyerController@postCreateAdd');
Route::get('dashboard/buyer/viewSellingAdds','BuyerController@viewSellingAdds');
Route::get('dashboard/buyer/setOrder/{sellingId}','BuyerController@setOrder')->name('setOrder');
Route::post('dashboard/buyer/post-createOrder/{sellingId}',"BuyerController@postSetOrder")->name('postSetOrder');
Route::get('dashboard/buyer/viewOrders','BuyerController@viewMyOrders');

