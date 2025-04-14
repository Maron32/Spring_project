<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminAttendanceController extends Controller
{
    // 管理者TOP
    public function index(Request $request) {
        // 生徒の一覧表示〇
        $items = User::all();
        return view('admin.admin_top',['items' => $items]);
    }

    // 管理者ログイン
    public function login(Request $request) {
        return view('admin.admin_login');
    }

    // 科目ごとの生徒の出席状況
    public function attendance_status(Request $request) {
        return view('admin.attendance_status');
    }

    // 生徒の検索
    public function students_find(Request $request){
        $input = $request->input('name','');  // 'name'があればそれをなければ空文字
        return view('admin.admin_top',['input' => $input]);
    }

    public function students_search(Request $request){
        $name = $request->input('name');

        // 名前が空なら全件、そうでなければ部分一致検索
        if (empty($name)) {
            $items = User::all();
        } else {
            $items = User::nameSearch($name)->get();
        }

        return view('admin.admin_top', ['items' => $items, 'input' => $name]);
    }


    // 生徒の編集
    public function students_edit(Request $request){
        
    }
}
