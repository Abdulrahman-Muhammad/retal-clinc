<?php

use App\Http\Controllers\AddDoctorsControllers;
use App\Http\Controllers\AddImageController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ShowDoctorsControllers;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Auth::routes();


//dont let not logged in user to access these routes 


Route::get('/login' , function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});


Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    // Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

 });

Route::get('/addPatient', [IndexController::class, 'HandleRequest']);

Route::get('/deletePatient', [DeleteController::class, 'DeleteRes']);


Route::get('/addDoctor', [AddDoctorsControllers::class, 'AddDoctors']);

Route::get('/deleteDoctor', [DeleteDoctorsControllers::class, 'DeleteDoctors']);

Route::get('/showDoctor', [ShowDoctorsControllers::class, 'ShowDataOfDoctors']);

//DeleteDoctorsControllers

Route::get('/showDataOfPatients', [ShowController::class, 'ShowDataOfPatients']);

// Route::post('register', [RegisterController::class, 'register'])->name('register');

// Route::post('login', [LoginController::class, 'login'])->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Route::get('image-upload', [ AddImageController::class, 'imageUpload' ])->name('image.upload');
// Route::post('image-upload', [ AddImageController::class, 'imageUploadPost' ])->name('image.upload.post');