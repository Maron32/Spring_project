<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    //管理者の科目登録ページ
    public function admin_subject_register() {
        return view('admin.admin_subject_register');
    }

    //ユーザーの科目登録ページ
    public function user_subject_register() {
        return view('user.user_subject_register');
    }

    //ユーザーの科目登録確認ページ
    public function user_subject_register_confirm() {
        return view('user.user_subject_register_confirm');
    }
}
