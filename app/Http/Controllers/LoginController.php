<?php

namespace App\Http\Controllers;

use App\Models\SecUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = SecUser::where([
            'username' => request('username'),
        ])->first();
        if (!$user) {
            toast('User tidak wujud', 'error');
            return redirect()->back();
        }

        $salt = 123;
        $generatedPassword = $request->password . "{" . $request->username . $salt . "}";
        $hashedPassword = md5($generatedPassword);

        //  $hashedPassword = md5($request->password);

        if ($user->password != $hashedPassword) {
            toast('Password yang dimasukkan salah', 'error');
            return redirect()->back();
        }
        Auth::login($user);
        return redirect('/audit-trail');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/');

    }
}
