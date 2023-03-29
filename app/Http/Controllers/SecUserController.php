<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecUserRequest;
use App\Http\Requests\UpdateSecUserRequest;
use App\Models\AppRfdSearchTrx;
use App\Models\SecRole;
use App\Models\SecUser;
use App\Models\SecUserEntity;
use App\Models\SecUserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class SecUserController extends Controller
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
        if ($user === null) {
            return [
                'Login Error' => "You do not have an account yet",
            ];
        }

        $salt = 123;
        $generatedPassword = $request->password . "{" . $request->username . $salt . "}";
        $hashedPassword = md5($generatedPassword);

        //  $hashedPassword = md5($request->password);

        if ($user->password != $hashedPassword) {
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
        $entity = SecUserEntity::where('code', "RFND")->first();

        // if ($request->password != $request->cpassword) {
        //     return [
        //         'code' => 403,
        //         'message' => $request->password . " tidak sama dengan " . $request->cpassword,
        //     ];
        // }

        //create password
        $salt = 123;
        $generatedPassword = $request->password . "{" . $request->username . $salt . "}";
        $hashedPassword = md5($generatedPassword);

        //check user created

        $user = SecUser::create([
            "activation_email" => $request->activation_email,
            "active_code" => $request->active_code,
            "address1" => $request->address1,
            "address2" => $request->address2,
            "city" => $request->city,
            "claimant_type" => $request->claimant_type,
            "company_name" => $request->company_name,
            "country" => $request->country,
            "cpassword" => $hashedPassword,
            "created_by" => $request->created_by,
            "created_date" => $request->created_date,
            "dob" => $request->dob,
            "email" => $request->email,
            "enabled" => 1,
            "fax_no" => $request->fax_no,
            "first_login" => $request->first_login,
            "full_name" => $request->full_name,
            "gender" => $request->gender,
            "home_no" => $request->home_no,
            "identity_number" => $request->identity_number,
            "identity_type" => $request->identity_type,
            "last_logged_in_date" => $request->last_logged_in_date,
            "mobile_no" => $request->mobile_no,
            "modified_by" => $request->modified_by,
            "modified_date" => $request->modified_date,
            "office_no" => $request->office_no,
            "password" => $hashedPassword,
            "password_modified_date" => now(),
            "position" => $request->position,
            "postcode" => $request->postcode,
            "profileUpdated" => 0,
            "reset_password_email" => $request->reset_password_email,
            "state" => $request->state,
            "username" => $request->username,
            "userEntity_id" => $entity->id,
            "address3" => $request->address3,
            "search_count" => 0,
            "search_date" => now(),
            "aoCode" => $request->aoCode,
        ]);

        if ($user) {
            $role = SecRole::where('code', 'RRFND')->first();
            SecUserRole::create([
                'user_id' => $user->id,
                'role_id' => $role->id,
            ]);
        }

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

        $searchedToday = AppRfdSearchTrx::whereDate('search_date', now())->where('identity_number', $user->identity_number)->get();
        $user['bil_carian_user'] = count($searchedToday);
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
