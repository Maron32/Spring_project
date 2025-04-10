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
            // 選択科目のidを受け取る
            $subjects_id = $request->subjects;
            // 選択した科目の情報を入れる配列の定義
            $subjects = Subject::whereIn('id', $subjects_id)->get();

            return view('user.user_subject_register_confirm', compact('subjects'));
        }
    }

    public function user_subject_create(Request $request) {
        // ログインしていない場合はログインページに遷移
        if (!Auth::check()) {
            return redirect('/login');
        } else {
            // セッションから科目idの配列を取得
            $subjects_id = session('subjects');
            // 科目idから一致する科目を全件取得
            $subjects = Subject::whereIn('id', $subjects_id)->get();
            // 1科目ずつ登録
            foreach ($subjects as $subject) {
                // 各情報を埋め込む
                $enrollSubject = new EnrolledSubject();
                $enrollSubject->subject_id = $subject->id;
                $enrollSubject->student_id = Auth::id();
                // DBへ登録
                $enrollSubject->save();
            }
            // セッションを削除
            session()->forget('subjects');
            return redirect('/user/user_top');
        }
    }
}
