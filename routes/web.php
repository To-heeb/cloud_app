<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ContactController;

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
    return view('default');
});

Route::get('/profile', function () {
    return view('welcome');
});

//about us named route
Route::get('/aboutus/{title}', function ($title) {
    return view('aboutus', ['title' => $title, 'lastname' => 'Liadi', 'firstname' => 'Aminat']);
})->name('aboutus');

Route::get('/aboutus', [HomeController::class, 'about']);

/*Route::get('/services', function () {
	return view('services');
})->name('services');
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users', [UserController::class, 'index']);
Route::get('users/details/{id?}', [UserController::class, 'details']);

//Routes about infomation
Route::get('/about', [InfoController::class, 'about'])->name('info.about');
Route::get('/contact', [InfoController::class, 'contact'])->name('info.contact');
Route::get('/services', [InfoController::class, 'services'])->name('info.services');
Route::get('/team', [InfoController::class, 'team'])->name('info.team');

Route::resource('students', StudentController::class)->middleware('auth');

Route::resource('contacts', ContactController::class)->middleware('auth');
