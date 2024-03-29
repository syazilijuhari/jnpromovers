<?php

use App\Http\Controllers\Admin\AdminController;
//use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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


Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/home',[HomeController::class,'index'])->name('home');


Route::middleware(['middleware'=>'PreventBackHistory', 'secure'])->group(function(){
    Auth::routes();
});

//Gallery
Route::get('/gallery', function(){return view('gallery');})->name('gallery');

//Service
Route::resource('service', \App\Http\Controllers\ServiceController::class);

//About
Route::get('/about', function(){return view('about');})->name('about');

//Contact
Route::get('/contact', function(){return view('contact');})->name('contact');

//Email
Route::get('/sendemail', [SendEmailController::class, 'index'])->name('sendemail');
Route::post('/sendemail/send', [SendEmailController::class, 'send'])->name('send');

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['PreventBackHistory','isAdmin','auth']], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    //Order Dashboard
    Route::resource('order', \App\Http\Controllers\Admin\OrderController::class);
    Route::post('/order/{order}/assign', [\App\Http\Controllers\Admin\OrderController::class, 'assign'])->name('assign');
    Route::get('export/order', [\App\Http\Controllers\Admin\OrderController::class, 'export'])->name('order.export');


    //Customer Dashboard

    //Route::get('customer', [\App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customer'); //route index untuk show all
    //Route::post('customer', [\App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('customer'); //store customer (lepas tekan submit button)
    //Route::get('customer/{uid}', [\App\Http\Controllers\Admin\CustomerController::class, 'show'])->name('customer'); //get individual customer info
    //Route::get('customer/{uid}/edit', [\App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('customer'); //show edit form for individual customer info
    //Route::put('customer/{uid}', [\App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('customer'); //update individual customer info (lepas tekan submit button)
    //Route::delete('customer/{uid}', [\App\Http\Controllers\Admin\CustomerController::class, 'delete'])->name('customer'); //delete

    Route::resource('customer', \App\Http\Controllers\Admin\CustomerController::class)->except(['destroy']);
    Route::delete('customer/delete', [\App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('customer.delete');
    Route::get('export/customer', [\App\Http\Controllers\Admin\CustomerController::class, 'export'])->name('customer.export');

    //Employee Dashboard
    Route::resource('employee', \App\Http\Controllers\Admin\EmployeeController::class)->except(['destroy']);
    Route::delete('employee/delete', [\App\Http\Controllers\Admin\EmployeeController::class, 'destroy'])->name('employee.delete');

    //Info Details Dashboard
    Route::resource('infodetails', \App\Http\Controllers\Admin\InfoController::class)->except(['destroy']);
    Route::delete('infodetails/delete', [InfoController::class, 'destroy'])->name('infodetails.delete');

    // Logout
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
});

// Customer
Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => ['PreventBackHistory','isCustomer','auth']], function(){
    Route::get('home', [CustomerController::class, 'index'])->name('home');

    //Booking
    Route::get('booking/first', [\App\Http\Controllers\Customer\BookingController::class, 'createOrderFirst'])->name('booking-one');
    Route::post('booking/first', [\App\Http\Controllers\Customer\BookingController::class, 'postOrderFirst'])->name('booking-one.post');

    Route::get('booking/second', [\App\Http\Controllers\Customer\BookingController::class, 'createOrderSec'])->name('booking-two');
    Route::post('booking/second', [\App\Http\Controllers\Customer\BookingController::class, 'postOrderSec'])->name('booking-two.post');

    Route::get('booking/third', [\App\Http\Controllers\Customer\BookingController::class, 'createOrderThird'])->name('booking-three');
    Route::post('booking/third', [\App\Http\Controllers\Customer\BookingController::class, 'postOrderThird'])->name('booking-three.post');

    Route::get('booking/review', [\App\Http\Controllers\Customer\BookingController::class, 'orderReview'])->name('booking-review');
    Route::post('booking/review', [\App\Http\Controllers\Customer\BookingController::class, 'postOrderReview'])->name('booking-review.post');

    Route::get('booking/details', [\App\Http\Controllers\Customer\BookingController::class, 'index'])->name('booking-details');

    Route::get('booking/invoice/{order_id?}', [\App\Http\Controllers\Customer\BookingController::class, 'invoice'])->name('booking-invoice');

    // Logout
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
});




