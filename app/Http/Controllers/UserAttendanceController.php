<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAttendanceController extends Controller
{
    // ユーザーのトップ画面
    public function index(Request $request){
        return view('user.user_top');
    }
}