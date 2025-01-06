<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoucherController;


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/pesanan', [AdminController::class, 'pesanan'])->name('admin.pesanan');
    Route::get('/admin/edit-destinasi', [AdminController::class, 'edit'])->name('admin.edit.destinasi');
    Route::post('/admin/update-destinasi', [AdminController::class, 'update'])->name('admin.update.destinasi');
});

Route::post('/voucher/storeAdmin', [VoucherController::class, 'store'])->name('voucherAdmin.store');

// HOME
Route::get('/', function () {
    return view('home');
});

// ANYER

Route::get('/pangandaran', function () {
    return view('pangandaran');
});

Route::get('/anyer', function () {
    return view('anyer');
});

Route::get('/karimun', function () {
    return view('karimun');
});

Route::get('/sindoro', function () {
    return view('sindoro');
});

Route::get('/bromo', function () {
    return view('bromo');
});

Route::get('/kawah', function () {
    return view('kawah');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/about-us', function () {
    return view('aboutus');
});

// LOGIN HOME

Use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    $userId = session('user_id', Auth::id()); // Ambil user_id dari session atau Auth
    $userName = \App\Models\User::find($userId)->name; // Cari nama user berdasarkan user_id

    return view('home', ['user_name' => $userName]);
})->middleware('auth')->name('home');


// PROFILE

Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

use App\Http\Controllers\UserController;

Route::post('/profile/update-name', [UserController::class, 'updateName'])->name('profile.update.name')->middleware('auth');
Route::post('/profile/update-password', [UserController::class, 'updatePassword'])->name('profile.update.password')->middleware('auth');
Route::post('/profile/update-image', [UserController::class, 'updateImage'])->name('profile.update.image');

Route::get('password/reset', [UserController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [UserController::class, 'sendResetLinkEmail'])->name('password.email');



// CONTROLLER PEMESANAN
use App\Http\Controllers\PemesananController;

Route::get('/home/{id}', [PemesananController::class, 'home'])->name('pemesanan.home');

Route::get('/api/check-availability/{destinasiId}/{date}/{time}', [PemesananController::class, 'checkAvailability']);

Route::get('/pemesanan/{id}', [PemesananController::class, 'showPemesanan'])->name('pemesanan.show');

Route::get('/api/booked-seats/{jenis_kendaraan}/{destinasi_id}', [PemesananController::class, 'getBookedSeats'])->name('pemesanan.booked');


// gevin
Route::get('/success/{id}', [PemesananController::class, 'success'])->name('pembayaran.success');

Route::get('/konfirmasiPembayaran/{id}', [PemesananController::class, 'konfirmasiPembayaran'])->name('konfirmasi.pembayaran');

Route::get('/pemesanan/sukses', [PemesananController::class, 'success'])->name('pemesanan.success');

Route::get('/pemesanan/{id}/edit', [PemesananController::class, 'edit'])->name('pemesanan.edit');

Route::put('/pemesanan/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');

Route::get('/cetak-tiket/{id}', [PemesananController::class, 'cetakTiket'])->name('cetak.tiket');

// DAFTAR PESANAN

Route::middleware('auth')->group(function () {
    Route::post('/pemesanan/store', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::get('/daftar-pesanan/{id}', [PemesananController::class, 'daftarPesanan'])->name('pemesanan.daftar');


});


Route::get('/daftar-pesanan', [PemesananController::class, 'daftarPesananHome'])->name('pemesanan.daftar.home');

Route::post('/daftar-pesanan/cancel/{id}', [PemesananController::class, 'cancel'])->name('pemesanan.cancel');

Route::delete('/daftar-pesanan/trash/{id}', [PemesananController::class, 'trash'])->name('pemesanan.trash');

// VOUCHER



Route::get('/voucher-admin', [VoucherController::class, 'voucher'])->name('voucher.admin');

Route::middleware('auth')->group(function () {
    
    Route::get('/voucher-user', [VoucherController::class, 'voucherUser'])->name('voucher.user');
});



Route::post('/voucher/storeUser', [VoucherController::class, 'storeUser'])->name('voucherUser.store');

Route::post('/voucher/claim', [VoucherController::class, 'claimVoucher'])->name('voucher.claim');

Route::post('/voucher/clear-session', [VoucherController::class, 'clearSession'])->name('voucher.clearSession');

// REVIEW

use App\Http\Controllers\ReviewController;

Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');
