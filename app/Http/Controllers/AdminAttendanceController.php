<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAttendanceController extends Controller
{
    // 管理者TOP
    public function index(Request $request) {
        return view('admin.admin_top');
    }

    // 管理者ログイン
    public function login(Request $request) {
        return view('admin.admin_login');
    }

    // 科目ごとの生徒の出席状況
    public function attendance_status(Request $request) {
        return view('admin.attendance_status');
    }
}
