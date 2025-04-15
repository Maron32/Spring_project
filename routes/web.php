<?php

use App\Http\Controllers\AdminAttendanceController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\AuthAdminRegsiterController;
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

// 管理者ログインのルーティング
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin_login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);

// 管理者のみがアクセス可能
Route::middleware(['auth', 'role:admin'])->group(function() {
    // ここに管理者のみがアクセスできるルーティングを追記
    
    // 管理者側TOPのルーティング
    Route::get('/admin', [AdminAttendanceController::class, 'index'])->name('admin');
    // 科目ごとの生徒の出席状況一覧のルーティング
    Route::get('/attendance_status', [AdminAttendanceController::class, 'attendance_status'])->name('attendance_status');

    // 管理者アカウント登録へのルーティング
    Route::get('/admin_register', [AdminRegisterController::class, 'showRegistrationForm']);
    // 管理者アカウント登録確認へのルーティング
    Route::match(['get', 'post'], '/admin_register_confirm', [AdminRegisterController::class, 'confirm']);
    // 管理者アカウント登録処理へのルーティング
    Route::post('/admin_create', [AdminRegisterController::class, 'create']);

    //管理者の科目登録ページのルーティング
    Route::get('/admin_subject_register', [SubjectController::class, 'admin_subject_register']);
    // 管理者の科目登録確認ページへのルーティング
    Route::post('/admin_subject_register_confirm', [SubjectController::class, 'admin_subject_register_confirm']);
    // 管理者の科目登録の登録へのルーティング
    Route::post('/admin_subject_create', [SubjectController::class, 'admin_subject_create']);
  
    // 管理者側の生徒名前検索
    Route::get('/admin/find', [AdminAttendanceController::class, 'students_find'])->name('students.find');
    Route::get('/admin/search', [AdminAttendanceController::class, 'students_search'])->name('students.search');

});
//ユーザーの科目登録ページのルーティング
Route::get('/user_subject_register', [SubjectController::class, 'user_subject_register']);
//ユーザーの科目登録確認ページのルーティング
Route::post('/user_subject_register_confirm', [SubjectController::class, 'user_subject_register_confirm']);
// ユーザーの科目登録処理(DBへ登録)へのルーティング
Route::post('/user_subject_create', [SubjectController::class, 'user_subject_create']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'user_top'])->name('home');

// 利用者のトップ画面
Route::get('/user',[UserAttendanceController::class,'index'])->name('user');
