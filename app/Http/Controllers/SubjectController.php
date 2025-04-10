<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EnrolledSubject;
use Illuminate\Support\Facades\Auth;

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
    public function user_subject_register_confirm(Request $request) {
        if (!Auth::check()) {
            // ログインしていない場合はログインページに遷移
            return redirect('/login');
        } else {
            $form = $request->all();
            unset($form['_token']);
            // セッションに入力された科目を登録する
            session()->put('subjects', $request->subjects);
            // 科目をビューに渡し、リダイレクト
            $subjects = $request->subjects;
            return view('user.user_subject_register_confirm', compact('subjects'));
        }
    }
}
