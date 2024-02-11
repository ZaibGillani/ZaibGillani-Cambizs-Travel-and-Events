<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventEditController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\DashboardController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [EventController::class, 'event_list'])->name('event_list');

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 

Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::get('main-dashboard', [AuthController::class, 'user_dashboard'])->middleware('auth')->name('dashboard.main');

Route::get('events/dashboard', [DashboardController::class, 'events_dashboard'])->middleware('auth')->name('dashboard.events');
Route::get('driver/dashboard', [DashboardController::class, 'driver_dashboard'])->middleware('auth')->name('dashboard.driver');
Route::get('buyer/dashboard', [DashboardController::class, 'buyer_dashboard'])->middleware('auth')->name('dashboard.buyer');

Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('Role')->name('dashboard');

/***admin urls***/
Route::get('dashboard_admin', [AuthController::class, 'dashboard_admin']); 
Route::get('admin_payout', [AuthController::class, 'admin_payout']); 
Route::get('confirm_payment', [AuthController::class, 'confirm_payment']);

 

Route::get('after_login', [AuthController::class, 'after_login']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('create_event', [EventController::class, 'create_event'])->name('create_event'); 
//Route::post('edit1', [EventEditController::class, 'edit_event'])->name('edit'); 
//Route::post('edit', [EventEditController::class, 'edit'])->name('edit'); 
Route::get('event/{id}', [EventController::class, 'get_event'])->name('get_event'); 
Route::get('dashboard/{id}', [EventController::class, 'event_single'])->name('event_single'); 
Route::get('dashboard/setting/{id}', [EventController::class, 'event_user_setting'])->name('event_user_setting'); 
Route::get('add_bank_details', [AuthController::class, 'add_bank'])->name('add_bank');  
Route::post('bank_register',[AuthController::class,"bank_register"])->name('bank_register');

Route::post("add",[EventController::class,"add"]);
Route::post("dashboard/edit",[EventEditController::class,"edit11"]);

Route::post('payment_process',[PaymentController::class,"payment_process"])->name('payment_process');
Route::post('payment_form',[PaymentController::class,"payment_form"])->name('payment_form');
Route::get('postpond_event',[EventController::class,"event_postpond"])->name('event_postpond');
Route::get('stripe', [PaymentController::class, 'stripe']);
Route::get('stripe_test', [PaymentController::class, 'stripe_test']);
Route::get('order/{id}', [PaymentController::class,"order_details"])->name('order_details');
Route::post('dashboard/setting/user_update', [AuthController::class, 'user_update'])->name('user_update'); 

Route::get('event_backend',[
   'middleware' => 'Role:editor',
   'uses' => 'App\Http\Controllers\AuthController@event_backend',
]);

Route::get('dashboard_admin', [AuthController::class, 'dashboard_admin']);
Route::get('post_a_ride2', [DriverController::class, 'post_a_ride']);
Route::get('all_events', [EventController::class, 'all_events']);

Route::get('post_a_ride',[
   'middleware' => 'Role:editor',
   'uses' => 'App\Http\Controllers\DriverController@post_a_ride',
]);
Route::get('posted_event', [AuthController::class, 'posted_event'])->name('posted_event');
Route::get('sendbasicemail', [EventController::class, 'basic_email'])->name('basic_email'); 
//Route::get('sendbasicemail','EventController@basic_email');
Route::get('sendhtmlemail','MainController@html_email');
Route::get('sendattachmentemail','MainController@attachment_email');

Route::get('post_a_ride', [DriverController::class, 'post_a_ride'])->name('post_ride');
Route::post('post_ride_insert', [DriverController::class, 'insert_data'])->name('insert_data'); 
Route::get('posted_event', [AuthController::class, 'posted_event']);

Route::get('send_mail_new', [PaymentController::class, 'send_mail_new']);

Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from ItSolutionStuff444.com',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('kushalk26@gmail.com')->send(new \App\Mail\MyMail($details));
   
    dd("Email is Sent.");
});

Route::post('search_ride', [DriverController::class, 'search_ride'])->name('search_ride');
Route::get('view_ride/{id}', [DriverController::class, 'book_ride'])->name('ride_book'); 
Route::post('book_ride_form', [DriverController::class, 'book_ride_form'])->name('book_ride_form'); 

Route::post('ride_payment_process',[DriverController::class,"ride_payment_process"])->name('ride_payment_process');

Route::get('driver_dashboard', [DriverController::class, 'dashboard_driver']);
Route::post('driver_profile', [DriverController::class, 'driver_profile'])->name('driver_profile'); 
//Route::post('driver_profile', [DriverController::class, 'driver_profile'])->name('driver_profile'); 
Route::get('complete_driver_registration/{id}', [DriverController::class, 'complete_registration'])->name('complete_registration'); 
Route::post('complete_driver_registration_submit', [DriverController::class, 'complete_driver_registration_submit'])->name('complete_driver_registration_submit'); 
Route::get('dashboard_driver_rides', [DriverController::class, 'dashboard_driver_rides'])->name('dashboard_driver_rides');
Route::get('dashboard_driver_profile', [DriverController::class, 'dashboard_driver_profile'])->name('dashboard_driver_profile');
Route::post('driver_profile_update', [DriverController::class, 'driver_profile_update'])->name('driver_profile_update'); 
/****order ride*****/ 
Route::get('order_ride/{id}', [DriverController::class, 'order_ride'])->name('order_ride'); 
Route::get('driver_ratings', [DriverController::class, 'driver_ratings'])->name('driver_ratings'); 
/***add bank details***/
Route::get('my_wallet', [AuthController::class, 'my_wallet'])->name('my_wallet');
//to manager
Route::get('add_bank_details', [AuthController::class, 'add_bank_details'])->name('add_bank_details');
Route::post('bank_add_data', [AuthController::class, 'bank_add_data'])->name('bank_add_data'); 
/***add bank details end***/
/****driver_payment request****/
Route::get('request_payment', [DriverController::class, 'request_payment'])->name('request_payment');
Route::post('request_payment_submit', [DriverController::class, 'request_payment_submit'])->name('request_payment_submit'); 
/***payout request****/
Route::get('admin_payout_ride', [AuthController::class, 'admin_payout_ride'])->name('admin_payout_ride');
Route::post('submit_payment_driver', [AuthController::class, 'submit_payment_driver'])->name('submit_payment_driver');
Route::get('confirm_payment', [AuthController::class, 'confirm_payment'])->name('confirm_payment');

/****31-12-22****/
Route::get('my_event', [EventController::class, 'get_event_manager']); 
/***01-01-22****/
//request payment manager
Route::get('request_payment_manager', [AuthController::class, 'request_payment_manager'])->name('request_payment_manager');

Route::post('request_payment_manager_submit', [AuthController::class, 'request_payment_manager_submit'])->name('request_payment_manager_submit'); 

/***payout request event****/
Route::get('admin_payout_artist', [AuthController::class, 'admin_payout_artist'])->name('admin_payout_artist');

Route::post('submit_payment_artist', [AuthController::class, 'submit_payment_artist'])->name('submit_payment_artist');

/***featured events home****/
Route::get('featured_events', [AuthController::class, 'admin_payout_artist'])->name('admin_payout_artist');
//
// Admin Prefix to routes
// Route::prefix('admin')->group(function () {
    Route::get('dashboard_driver', [AuthController::class, 'driver_dashboard_admin'])->name('driver_dashboard_admin');
// });

//view drivers
Route::get('list_drivers', [AuthController::class, 'list_drivers'])->name('list_drivers');
Route::get('view_driver_admin/{id}', [AuthController::class, 'view_driver'])->name('view_driver');
Route::post('save_driver_admin', [AuthController::class, 'save_driver_admin'])->name('save_driver_admin');
Route::get('delete_driver/{id}', [AuthController::class, 'delete_driver'])->name('delete_driver');
Route::get('view_driver_admin/view_driver_profile_admin/{id}', [AuthController::class, 'view_driver_profile_admin'])->name('view_driver_profile_admin');
Route::post('driver_profile_update_admin', [AuthController::class, 'driver_profile_update_admin'])->name('driver_profile_update_admin');
//Route::get('list_drivers1', [AuthController::class, 'list_drivers1'])->name('list_drivers1');
Route::post('update_driver', [AuthController::class, 'update_driver'])->name('update_driver');

//for events
Route::get('view_artist', [AuthController::class, 'view_artist'])->name('view_artist');
Route::get('view_artist/{id}', [AuthController::class, 'view_artist_single'])->name('view_artist_single');
Route::get('update_user_status', [AuthController::class, 'update_user_status'])->name('update_user_status');
Route::get('remove_artist/{id}', [AuthController::class, 'remove_artist'])->name('remove_artist');

// Email Verification Routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');

// Resend Email Verification Link
Route::post('/email/verification-notification', [VerificationController::class, 'resendVerificationEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Forgot Password Routes
Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'reset_password'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.update');
