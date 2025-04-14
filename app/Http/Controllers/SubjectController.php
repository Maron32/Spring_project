<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\EnrolledSubject;
use App\Models\Period;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    //管理者の科目登録ページ
    public function admin_subject_register() {
        $teachers = User::where([['master', 1], ['delete', 0]])->get();
        $terms = ['前期', '後期', '通年'];
        // 曜日、コマを取得
        $days = Day::all();
        $periods = Period::all();
        return view('admin.admin_subject_register', compact('teachers', 'terms', 'days', 'periods'));
    }

    // 管理者の科目登録確認ページ
    public function admin_subject_register_confirm(Request $request) {
        // ログインしていない場合は管理者ログインへ
        if (!Auth::check()) {
            return redirect('/admin/login');
        } else {
            $form = $request->all();
            unset($form['_token']);
            // セッションに入力された情報を格納する
            session()->put('name', $request->name);

            // 確認画面に送る情報を取得する
            // 科目情報
            $subject = [];
            $name = $request->name;
            $teacher = User::find($request->teacher);
            $term = $request->term;
            $lesson_days = $request->lesson_days;

            // 曜日・コマ
            $reqestDaytime = $request->daytime;
            $daytimes = [];
            foreach($reqestDaytime as $daytime) {
                $daytime_find['days'] = Day::find($daytime['day']);
                $daytime_find['periods'] = Period::find($daytime['period']);
                array_push($daytimes, $daytime_find);
            }
            return view('admin.admin_subject_register_confirm', compact('name', 'teacher', 'term', 'lesson_days','daytimes'));
        }
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
