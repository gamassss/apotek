<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\FonnteController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TemplateChatController;
use App\Http\Controllers\FonnteWebhookController;
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
    return redirect()->route('login');
});

// pegawai
Route::group(['middleware' => ['auth','checkRole:pegawai'], 'prefix' => '/admin'],function () {
    Route::get('/dashboard/pegawai',[DashboardController::class,'indexPegawai'])->name('dashboard.pegawai');

});

// bersama
Route::group(['middleware' => ['auth'], 'prefix' => '/admin'],function () {
    Route::resource('/transaksi-obat', TransaksiController::class);
    Route::prefix('/data')->group(function () {
        Route::resource('/obat', ObatController::class);
        Route::resource('/member', MemberController::class);
    });
    Route::get('/chats', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/get_name_by_number', [ChatController::class, 'getNameByPhoneNumber'])->name('get_name_by_phone_number');
    Route::get('/get_chat_by_number', [ChatController::class, 'getChatByPhoneNumber'])->name('get_chat_by_phone_number');
    Route::post('/send_message', [ChatController::class, 'sendMessage'])->name('send_message');
    Route::get('/dashboard/pegawai/peningkatan-member/monthly',[DashboardController::class,'peningkatanMemberPegawaiMonthly'])->name('peningkatan.member.pegawai.monthly');
    Route::get('/dashboard/pegawai/peningkatan-member/yearly',[DashboardController::class,'peningkatanMemberPegawaiYearly'])->name('peningkatan.member.pegawai.yearly');
    Route::get('/dashboard/pegawai/peningkatan-transaksi/monthly',[DashboardController::class,'peningkatanTransaksiPegawaiMonthly'])->name('peningkatan.transaksi.pegawai.monthly');
    Route::get('/dashboard/pegawai/peningkatan-transaksi/yearly',[DashboardController::class,'peningkatanTransaksiPegawaiYearly'])->name('peningkatan.transaksi.pegawai.yearly');
});

// manajemen
Route::group(['middleware' => ['auth','checkRole:manajemen'], 'prefix' => '/admin'],function () {
    Route::get('/dashboard/manajemen',[DashboardController::class,'indexManajemen'])->name('dashboard.manajemen');
    Route::get('/dashboard/manajemen/peningkatan-member/monthly',[DashboardController::class,'peningkatanMemberMonthly'])->name('peningkatan.member.monthly');
    Route::get('/dashboard/manajemen/peningkatan-member/yearly',[DashboardController::class,'peningkatanMemberYearly'])->name('peningkatan.member.yearly');
    Route::get('/dashboard/manajemen/peningkatan-transaksi/monthly',[DashboardController::class,'peningkatanTransaksiMonthly'])->name('peningkatan.transaksi.monthly');
    Route::get('/dashboard/manajemen/peningkatan-transaksi/yearly',[DashboardController::class,'peningkatanTransaksiYearly'])->name('peningkatan.transaksi.yearly');
    Route::prefix('/data')->group(function () {
        Route::resource('/pegawai', PegawaiController::class);
        Route::get('/pegawai/profile/{username}', [PegawaiController::class,'viewProfilePegawai'])->name('pegawai.profile');
        Route::resource('/template-chat', TemplateChatController::class);
    });
});

Route::get('/login', [AuthenticationController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'auth'])->name('auth');

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/tes_rabbit', function() {
    return view('message');
});

Route::get('/webhook', [FonnteWebhookController::class, 'getReplyMessage'])->name('webhook.get_reply');
Route::post('/webhook', [FonnteWebhookController::class, 'postReplyMessage'])->name('webhook.post_reply');
Route::get('/tes_response_time', [ChatController::class, 'getResponseTime'])->name('response_time.get');