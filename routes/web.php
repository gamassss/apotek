<?php

use App\Events\ChatEvent;
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
    Route::middleware(['ResetDefaultPassword'])->group(function () {
        Route::get('/dashboard/pegawai',[DashboardController::class,'indexPegawai'])->name('dashboard.pegawai');
    });
    Route::get('/reset-password',[DashboardController::class,'resetPassword'])->name('reset-password.pegawai');
    Route::put('/reset-password',[PegawaiController::class,'updatePassword'])->name('reset-password.pegawai.put');
});

// bersama
Route::group(['middleware' => ['auth','ResetDefaultPassword'], 'prefix' => '/admin'],function () {
    Route::resource('/transaksi-obat', TransaksiController::class);
    Route::prefix('/data')->group(function () {
        Route::resource('/obat', ObatController::class);
        Route::resource('/member', MemberController::class);
    });
    Route::get('/chats', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/get_name_by_number', [ChatController::class, 'getNameByPhoneNumber'])->name('get_name_by_phone_number');
    Route::get('/get_chat_by_number', [ChatController::class, 'getChatByPhoneNumber'])->name('get_chat_by_phone_number');
    Route::get('/get_chat_box_by_number', [ChatController::class, 'getChatBoxByPhoneNumber'])->name('get_chat_box_by_phone_number');
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
        Route::post('/pegawai/{pegawai}/reset-password', [PegawaiController::class,'resetPassword'])->name('pegawai.reset-password');
        Route::resource('/template-chat', TemplateChatController::class);
    });

    //get detail chat for every pegawai
    Route::get('/chats/pegawai/{id}', [DashboardController::class, 'showPegawaiChats'])->name('pegawai_chats.show');
});

Route::get('/login', [AuthenticationController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticationController::class, 'auth'])->name('auth');

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/tes_rabbit', function() {
    return view('message');
});

Route::get('/webhook', [FonnteWebhookController::class, 'getReplyMessage'])->name('webhook.get_reply');
Route::post('/webhook', [FonnteWebhookController::class, 'postReplyMessage'])->name('webhook.post_reply');
Route::get('/status', [FonnteWebhookController::class, 'get_update_message_status'])->name('update.get_msg_status');
Route::post('/status', [FonnteWebhookController::class, 'update_message_status'])->name('update.msg_status');

// Route::get('/tes_response_time', [DashboardController::class, 'getResponseTime'])->name('response_time.get');
Route::get('/search-chat', [ChatController::class, 'searchChat'])->name('chat.search');
Route::get('/search-chat-nonmember', [ChatController::class, 'searchChatNonMember'])->name('chat.search_nonmember');
Route::get('/update-chat-list', [ChatController::class, 'updateChatList'])->name('list_chat.update');
Route::get('/update-chat-list-nonmember', [ChatController::class, 'updateChatListNonMember'])->name('list_chat_nonmember.update');

// update member's messages status
Route::post('/update-member-msg-status', [ChatController::class, 'updateMemberMessageStatus'])->name('member_message_status.update');
