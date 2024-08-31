<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[DashboardController::class,'check_login'])->name('check_login');
Route::match (['get', 'post'], '/login', [LoginController::class, 'index'])->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('Logout');
    Route::get('/dashboard',[FileController::class,'index'])->name('dashboard');

    Route::get('/files', [FileController::class, 'index'])->name('files.index');
    Route::get('/upload-file', [FileController::class, 'create'])->name('files.create');
    Route::post('/upload-file', [FileController::class, 'store'])->name('files.store');
    Route::get('/delete-file/{file_id}', [FileController::class, 'destroy'])->name('files.delete');



    Route::get('/file-share/{file_id}', [FileController::class, 'share'])->name('files.share');
    Route::post('/file-share/{file_id}', [FileController::class, 'shareStore'])->name('files.shareStore');
});

Route::fallback(function () {
    return redirect()->route('check_login');
});