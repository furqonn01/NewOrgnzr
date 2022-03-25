<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SertifController;
use App\Http\Controllers\UserController;
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
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('user/list', [UserController::class, 'index'])->name('users.index');
    Route::get('user/hapus/{id}', [UserController::class, 'hapus'])->name('users.hapus');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/post', [ProfileController::class, 'tambah'])->name('user.post');
});

Route::group(['prefix' => 'sertifikat', 'middleware' => 'auth'], function () {
    Route::get('list', [SertifController::class, 'index'])->name('sertifs.index');
    Route::get('hapus/{id}', [SertifController::class, 'hapus'])->name('sertifs.hapus');
    Route::post('post', [SertifController::class, 'post'])->name('sertifs.post');
});
