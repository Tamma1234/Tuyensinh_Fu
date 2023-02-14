<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        if (auth()->user() != "") {
            return redirect()->route('dashboard');
        } else {
            return view('auth.login');
        }
    }
    public function postLogin(Request $request) {
        if (auth()->user() != "") {
            return redirect()->route('dashboard');
        } else {
            $user_code = $request->user_code;
            $user_code = User::where('user_code', $user_code)->first();

            if ($user_code) {
                    $credentials = $request->validate([
                        'user_code' => ['required'],
                        'password' => ['required'],
                    ]);

                    // Ghi nhớ đăng nhập
                    $remenber = $request->remember_token;
                    /**
                     * Dùng Auth::attempt xem email,password có trong table users k
                     *  Nếu có thì dùng session để lưu, ghi nhớ thông tin login
                     * Sau đó chuyển hướng đến trang dasboard
                     */

                    if (auth()->attempt($credentials, $remenber)) {
                        $request->session()->regenerate();

                        return redirect()->route('dashboard');
                    }
                    // Còn không sẽ trả về back và hiển thị lỗi email
            } else {
                return redirect()->route('login');
            }
        }
    }
}
