<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    //
    public function showRegistrationForm() {
        return view('/admin.admin_register');
    }

    public function confirm(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        session()->put('register_user', $validated);

        return view('admin.admin_register_confirm', [
            'formData' => $validated,
        ]);
    }

    public function create(Request $request) {
        $user = session('register_user');
        User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => $user['password'],
            'department_id' => 99,
            'grade_id' => 99,
            'master' => 1,
        ]);
        session()->forget('register_user');

        return redirect('/admin');
    }
}
