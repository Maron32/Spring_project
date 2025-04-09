<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
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

//管理者の科目登録ページのルーティング
Route::get('/admin_subject_register', [SubjectController::class, 'admin_subject_register']);
//ユーザーの科目登録ページのルーティング
Route::get('/user_subject_register', [SubjectController::class, 'user_subject_register']);
//ユーザーの科目登録確認ページのルーティング
Route::get('/user_subject_register_confirm', [SubjectController::class, 'user_subject_register_confirm']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'user_top'])->name('home');
Route::get('user/user_top',[UserAttendanceController::class,'index']);
