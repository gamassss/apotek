<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TemplateChatController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return view('login');
});

// pegawai
Route::group(['middleware' => ['auth','checkRole:Pegawai'], 'prefix' => '/admin'],function () {

});

// bersama
Route::group(['middleware' => ['auth'], 'prefix' => '/admin'],function () {
    Route::get('/',function () {
        return view('layout.main');
    })->name('home');
    Route::prefix('/data')->group(function () {
        Route::resource('/obat', ObatController::class);
        Route::resource('/member', MemberController::class);
    });
    Route::get('/chats', [ChatController::class, 'index']);
});

// manajemen
Route::group(['middleware' => ['auth','checkRole:Manajemen'], 'prefix' => '/admin'],function () {
    Route::prefix('/data')->group(function () {
        Route::resource('/pegawai', PegawaiController::class);
        Route::resource('/template-chat', TemplateChatController::class);
    });
});

Route::get('/login', [AuthenticationController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'auth'])->name('auth');

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');