<?php

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

Route::get('/getUserId/{UserId}', 'FrontendController@getUserId');
Auth::routes();

Route::get('/', 'FrontendController@index')->name('home_frontend');
Route::get('/about_us', 'FrontendController@about_us')->name('about_us');
Route::get('/contact_us', 'FrontendController@contact_us')->name('contact_us');
Route::get('/our_story', 'FrontendController@our_story')->name('our_story');
Route::get('/pricing_plan', 'FrontendController@pricing_plan')->name('pricing_plan');
Route::get('/what_we_do', 'FrontendController@what_we_do')->name('what_we_do');


Route::get('/subscribe', 'SubscriptionController@subscribe')->name('subscribe');
Route::get('/subscribe/{order_id}', 'SubscriptionController@subscribe_by_order')->name('subscribe_by_order');
Route::get('/pending_orders/{order_id}', 'HomeController@pending_orders')->name('pending_orders');
Route::post('/subscribe-stock', 'SubscriptionController@subscribeStock')->name('subscribe-stock');
Route::post('/get_available_stock', 'SubscriptionController@get_available_stock')->name('get_available_stock');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/graph', 'HomeController@graph')->name('graph');


Route::prefix('admin')->middleware('role')->group(function () {
  Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('/view-details/{id}', 'AdminController@details')->name('admin.view-details');
  Route::get('/view-all-orders/{id}', 'AdminController@user_all_orders')->name('admin.view-all-orders');
  Route::get('/users', 'AdminController@users')->name('admin.users');
  Route::post('/set-active-status', 'AdminController@setActiveStatus')->name('admin.set-active-status');
});

Route::prefix('user')->middleware('role')->group(function () {
  Route::get('/profile', 'HomeController@profile')->name('user.profile');
  Route::post('/update-profile', 'HomeController@updateProfile')->name('user.update-profile');

  Route::middleware(['subscription'])->group(function () {
    Route::get('/get-bar-chart-stock', 'HomeController@fetchBarChartStock')->name('user.barChartStock');
    Route::get('/history', 'HomeController@history')->name('user.history');
  });
});
// Paypal routes
Route::get('payment/{order_id}', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('success', 'PayPalController@success')->name('payment.success');
Route::get('refund/{transaction_id}', 'PayPalController@refund')->name('refund');


// Autorize Net Routes
Route::get('secure-payment/{order_id}', 'PaymentController@index')->name('secure-payment');
Route::get('refund_authorize/{transaction_id}', 'PaymentController@refund_authorize')->name('refund_authorize');
Route::post('charge', 'PaymentController@charge')->name('');
