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
Route::get('/about','HomeController@about');
Route::get('/store','HomeController@store');
Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration'); 
Route::get('dashboard', 'AuthController@dashboard');
Route::get('logout', 'AuthController@logout');
Route::post('admin/feedback', 'AdminController@submitFeedback');


Route::get('dashboard/admin','AuthController@adminDashboard');
Route::get('dashboard/admin/fish','AdminController@createFish');
Route::post('dashboard/admin/post-createFish','AdminController@postCreateFish');
Route::post('dashboard/admin/post-editProfile','AdminController@postEditProfile');
Route::get('dashboard/admin/profile-edit','AdminController@editProfile');
Route::get('dashboard/admin/profile-view','AdminController@viewProfile');
Route::get('dashboard/admin/viewFish','AdminController@viewFish');
Route::get('dashboard/admin/editFish/{fishId}','AdminController@editFish')->name('editFish');
Route::post('dashboard/admin/post-editFish','AdminController@postEditFish');
Route::get('dashboard/admin/viewFeedbacks','AdminController@viewFeedback');
Route::get('dashboard/admin/viewAlerts','AdminController@viewAlerts');
Route::get('dashboard/admin/sendAlert','AdminController@sendAlert');
Route::get('dashboard/admin/manageUsers','AdminController@manageUsers');
Route::post('dashboard/admin/post-postAlert','AdminController@postSendAlert');
Route::get('dashboard/admin/updateFeedback/{feedbackId}','AdminController@updateFeedback')->name('updateFeedback');
Route::get('dashboard/admin/updateAlert/{alertId}','AdminController@updateAlert')->name('updateAlert');
Route::get('dashboard/admin/blockUser/{userId}/{status}','AdminController@blockUser')->name('blockUser');

Route::get('dashboard/seller','AuthController@sellerDashboard');
Route::get('dashboard/seller/profile-edit','SellerController@editProfile');
Route::get('dashboard/seller/profile-view','SellerController@viewProfile');
Route::post('dashboard/seller/post-editProfile','SellerController@postEditProfile');
Route::get('dashboard/seller/createAdd','SellerController@createAdd');
Route::post('dashboard/seller/post-createAdd','SellerController@postCreateAdd');
Route::get('dashboard/seller/orders','SellerController@viewOrders');
Route::get('dashboard/seller/confirmOrders','SellerController@viewConfirmOrders');
Route::get('dashboard/seller/viewAdds','SellerController@viewAdds');
Route::get('dashboard/seller/viewAlerts','SellerController@viewAlerts');
Route::get('dashboard/seller/viewBuyingAdds','SellerController@viewBuyingAds');
Route::post('dashboard/seller/post-order/{orderStatus}','SellerController@postSetOrder')->name('setOrderStatus');
Route::get('dashboard/seller/editAdd/{sellingAdId}/{action}','SellerController@editSellingAddStatus')->name('editSellingAdStatus');

Route::get('dashboard/buyer','AuthController@buyerDashboard');
Route::get('dashboard/buyer/createAdd','BuyerController@createAdd');
Route::post('dashboard/buyer/post-createAdd','BuyerController@postCreateAdd');
Route::get('dashboard/buyer/viewSellingAdds','BuyerController@viewSellingAdds');
Route::get('dashboard/buyer/setOrder/{sellingId}','BuyerController@setOrder')->name('setOrder');
Route::post('dashboard/buyer/post-createOrder/{sellingId}',"BuyerController@postSetOrder")->name('postSetOrder');
Route::get('dashboard/buyer/viewOrders','BuyerController@viewMyOrders');
Route::post('dashboard/buyer/post-editProfile','BuyerController@postEditProfile');
Route::get('dashboard/buyer/profile-edit','BuyerController@editProfile');
Route::get('dashboard/buyer/viewBuyingAdds','BuyerController@viewBuyingAdds');
Route::get('dashboard/buyer/cancelBuyingAd/{buyingAdId}','BuyerController@cancelBuyingAdd')->name('cancelBuyingAd');
Route::get('dashboard/buyer/viewAlerts','BuyerController@viewAlerts');


