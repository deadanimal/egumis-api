<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecUserRequest;
use App\Http\Requests\UpdateSecUserRequest;
use App\Models\SecUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class SecUserController extends Controller
{
    public function login()
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = SecUser::where([
            'username' => request('username'),
        ])->first();
        if ($user === null) {
            return [
                'Login Error' => "You do not have an account yet",
            ];
        }

        if ($user->password != md5(request('password'))) {
            return [
                'Login Error' => "Username and password does not match",
            ];
        }

        return [
            'Login' => "Succesfull",
            'user' => $user,
        ];

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SecUser::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSecUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = SecUser::create($request->except('cpassword'));

        $user->update([
            'cpassword' => md5($request->cpassword),
            'password' => md5($request->password),
        ]);

        return response()->json($user);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecUser  $secUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = SecUser::find($id);
        if ($user === null) {
            return [
                'Error' => 'User does not exist',
            ];
        }
        return response()->json($user);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSecUserRequest  $request
     * @param  \App\Models\SecUser  $secUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSecUserRequest $request, $id)
    {
        $user = SecUser::find($id);
        if ($user === null) {
            return [
                'Error' => 'User does not exist',
            ];
        }

        $user->update($request->except(['username', 'email', 'identity_number', 'userEntity_id']));
        return response()->json($user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecUser  $secUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = SecUser::find($id);
        if ($user === null) {
            return [
                'Error' => 'User does not exist',
            ];
        }
        $user->delete();
        return [
            'Delete' => "Successful",
        ];

    }

    public function ForgotPass()
    {
        $user = SecUser::where('username', request('username'))->first();
        $code = random_int(100000, 999999);
        $new_password = "egumis" . $code;
        if ($user === null) {
            return [
                'Error' => "Username was not registered",
            ];
        }

        // try {
        //     $mess = 'Password reset successful. Please use this new pasword : ' . $new_password;
        //     $response = Http::withHeaders([
        //         'Content-Type' => 'application/json',
        //         'Authorization' => 'FlIJxKC0DQ1RF5af9zKL95bsbQ6hEADEDBRO0fnBoFs=',
        //     ])->post('https://mysmsdvsb.azurewebsites.net/api/messages', [
        //         'keyword' => 'e-Sisper',
        //         'message' => $mess,
        //         'msisdn' => request('username'),
        //     ]);
        // } catch (\Exception$e) {
        //     return '400';
        // }

        if (isset($response)) {
            $user->update([
                'password' => Hash::make($new_password),
            ]);
        }

        return response()->json('Password Updated, New password is ' . $new_password);
    }

    public function ChangePassword(Request $request, SecUser $user)
    {
        $user->update([
            'password' => md5($request->password),
            'cpassword' => md5($request->password),
        ]);
        return response()->json($user);
    }
}
