<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EnrolledSubject;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    //管理者の科目登録ページ
    public function admin_subject_register() {
        return view('admin.admin_subject_register');
    }

    //ユーザーの科目登録ページ
    public function user_subject_register() {
        if (!Auth::check()) {
            // ログインしていない場合はログインページに遷移
            return redirect('/login');
        } else {
            // 削除フラグがfalseの科目のみを取得する
            $subjects = Subject::where('is_deleted', 0)->with(['user:id,name'])->get();
            // viewに科目を渡し、リダイレクト
            return view('user.user_subject_register', compact('subjects'));
        }
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
            // viewに科目を渡し、リダイレクト
            $subjects = $request->subjects;
            return view('user.user_subject_register_confirm', compact('subjects'));
        }
    }
}
