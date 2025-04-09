<?php

use App\Http\Controllers\AdminAttendanceController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAttendanceController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 管理者ログインのルーティング
Route::get('/admin_login', [AdminAttendanceController::class, 'login'])->name('admin_login');
// 管理者側TOPのルーティング
Route::get('/admin', [AdminAttendanceController::class, 'index'])->name('admin');
// 科目ごとの生徒の出席状況一覧のルーティング
Route::get('/attendance_status', [AdminAttendanceController::class, 'attendance_status'])->name('attendance_status');

// 利用者のトップ画面
Route::get('user/user_top',[UserAttendanceController::class,'index']);
