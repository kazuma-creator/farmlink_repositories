<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\PublicCropController;
use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// QRコードからアクセスされる公開ページ用のルート
Route::get('/crops/public/{id}', [PublicCropController::class, 'show'])->name('crops.public.show');


// 認証が必要なユーザー向けのルート設定
Route::middleware(['auth'])->group(function () {
    Route::resource('crops', CropController::class);
});

// QRコード生成用のルート
Route::middleware(['auth'])->group(function () {
    Route::get('crops/{crop}/generate-qr', [QRCodeController::class, 'create'])->name('qr.create');
    Route::post('crops/{crop}/generate-qr', [QRCodeController::class, 'store'])->name('qr.store');
});

Route::post('/profile/upload-icon', [ProfileController::class, 'uploadIcon'])->name('profile.upload-icon');


// QRコード作成用のルート
Route::post('/qr/create/{crop}', [QRCodeController::class, 'store'])->name('qr.store');


require __DIR__.'/auth.php';
