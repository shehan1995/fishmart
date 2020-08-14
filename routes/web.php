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

//Route::get('/', function () {
//    return view('index');
//});

Route::get('/','HomeController@index');
Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration'); 
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');


Route::get('dashboard/admin','AuthController@adminDashboard');
Route::get('dashboard/admin/fish','AdminController@createFish');
Route::post('dashboard/admin/post-createFish','AdminController@postCreateFish');
Route::post('dashboard/admin/post-editProfile','AdminController@postEditProfile');
Route::get('dashboard/admin/profile-edit','AdminController@editProfile');
Route::get('dashboard/admin/profile-view','AdminController@viewProfile');

Route::get('dashboard/seller','AuthController@sellerDashboard');
Route::get('dashboard/seller/profile-edit','SellerController@editProfile');
Route::get('dashboard/seller/profile-view','SellerController@viewProfile');
Route::post('dashboard/seller/post-editProfile','SellerController@postEditProfile');
Route::get('dashboard/seller/createAdd','SellerController@createAdd');
Route::post('dashboard/seller/post-createAdd','SellerController@postCreateAdd');
Route::get('dashboard/seller/orders','SellerController@viewOrders');
Route::get('dashboard/seller/confirmOrders','SellerController@viewConfirmOrders');
Route::get('dashboard/seller/viewAdds','SellerController@viewAdds');
Route::post('dashboard/seller/post-order/{orderStatus}','SellerController@postSetOrder')->name('setOrderStatus');

Route::get('dashboard/buyer','AuthController@buyerDashboard');
Route::get('dashboard/buyer/createAdd','BuyerController@createAdd');
Route::post('dashboard/buyer/post-createAdd','BuyerController@postCreateAdd');
Route::get('dashboard/buyer/viewSellingAdds','BuyerController@viewSellingAdds');
Route::get('dashboard/buyer/setOrder/{sellingId}','BuyerController@setOrder')->name('setOrder');
Route::post('dashboard/buyer/post-createOrder/{sellingId}',"BuyerController@postSetOrder")->name('postSetOrder');
Route::get('dashboard/buyer/viewOrders','BuyerController@viewMyOrders');
Route::post('dashboard/buyer/post-editProfile','BuyerController@postEditProfile');
Route::get('dashboard/buyer/profile-edit','BuyerController@editProfile');


