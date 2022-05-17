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

    //Customer Dashboard
    Route::resource('customer', \App\Http\Controllers\Admin\CustomerController::class)->except(['destroy']);
    Route::delete('customer/delete', [\App\Http\Controllers\Admin\CustomerController::class, 'destroy'])->name('customer.delete');


//    Route::get('customer', [\App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customer'); //route index untuk show all
//    Route::post('customer', [\App\Http\Controllers\Admin\CustomerController::class, 'store'])->name('customer'); //store customer (lepas tekan submit button)
//    Route::get('customer/{uid}', [\App\Http\Controllers\Admin\CustomerController::class, 'show'])->name('customer'); //get individual customer info
//    Route::get('customer/{uid}/edit', [\App\Http\Controllers\Admin\CustomerController::class, 'edit'])->name('customer'); //show edit form for individual customer info
//    Route::put('customer/{uid}', [\App\Http\Controllers\Admin\CustomerController::class, 'update'])->name('customer'); //update individual customer info (lepas tekan submit button)
//    Route::delete('customer/{uid}', [\App\Http\Controllers\Admin\CustomerController::class, 'delete'])->name('customer'); //delete

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
Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => ['PreventBackHistory','isCustomer','auth','secure']], function(){
    Route::get('home', [CustomerController::class, 'index'])->name('home');

    // Logout
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
});



