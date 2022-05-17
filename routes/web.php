<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\StudentController;

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

//_Class CRUD RouteS
Route::get('class', [ClassController::class, 'index'])->name('class.index');
Route::get('create/class', [ClassController::class, 'create'])->name('create.class');
Route::post('store/class', [ClassController::class, 'store'])->name('store.class');
Route::get('class/delete/{id}', [ClassController::class, 'delete'])->name('class.delete');
Route::get('class/edit/{id}', [ClassController::class, 'edit'])->name('class.edit');
Route::post('class/update/{id}', [ClassController::class, 'update'])->name('class.update');

//_Student CRUD_ Route Resource//
Route::resource('students', StudentController::class);

//_Email verification Routes

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
