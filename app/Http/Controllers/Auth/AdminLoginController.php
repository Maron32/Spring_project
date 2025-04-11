<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // ログインページに遷移
    public function showLoginForm() {
        return view('admin.admin_login');
    }

    // ログイン処理
    public function login(Request $request) {
        $credentionals = $request->only('email', 'password');

        // emailとパスワードの認証
        if (Auth::attempt($credentionals)) {
            // 管理者であれば管理者TOPへ
            if (Auth::user()->master === 1) {
                return redirect()->intended('/admin');
            // 管理者でなければログアウトし、ログインページに戻す
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->withErrors([
                    'email' => '管理者アカウントではありません。'
                ]);
            }
        }
        
        return back()->withErrors([
            'email' => '認証情報が正しくありません。'
        ]);
    }
}
