<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecUserRequest;
use App\Http\Requests\UpdateSecUserRequest;
use App\Mail\EgumisEmail;
use App\Models\AppEmailTemplate;
use App\Models\AppRfdSearchTrx;
use App\Models\SecRole;
use App\Models\SecUser;
use App\Models\SecUserEntity;
use App\Models\SecUserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class SecUserController extends Controller
{

    public function sendEmail()
    {
        $mailFormat = AppEmailTemplate::where('code', 'ETRFDX')->first();
        $email = 'noramirulnordin@gmail.com';
        // return $mailFormat->template_content_my;
        $content = str_replace('${claimantName}', 'Amirul', $mailFormat->template_content_my);
        // $content = str_replace('${newPassword}', 'newpass', $content);

        $mailData = [
            'name' => $mailFormat->name_my,
            'template_content' => $content,
        ];

        Mail::to($email)->send(new EgumisEmail($mailData));

        return response()->json([
            'message' => 'Email has been sent.',
        ], Response::HTTP_OK);
    }

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

            //Sent Email
            $mailFormat = AppEmailTemplate::where('code', 'ETUSRC')->first();
            $email = $user->email;

            $content = str_replace('${user.fullName}', $user->username, $mailFormat->template_content_my);
            $content = str_replace('${user.username}', $user->full_name, $content);
            $content = str_replace('${tempPassword}', $request->password, $content);

            $mailData = [
                'name' => $mailFormat->name_my,
                'template_content' => $content,
            ];

            Mail::to($email)->send(new EgumisEmail($mailData));

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
        if (!$user) {
            return [
                'Error' => "Username was not registered",
            ];
        }

        $salt = 123;
        $generatedPassword = $new_password . "{" . $user->username . $salt . "}";
        $hashedPassword = md5($generatedPassword);

        $user->update([
            'password' => $hashedPassword,
        ]);

        $mailFormat = AppEmailTemplate::where('code', 'ETRPWD')->first();
        $email = $user->email;
        $content = str_replace('${fullName}', $user->full_name, $mailFormat->template_content_my);
        $content = str_replace('${userName}', $user->username, $content);
        $content = str_replace('${newPassword}', $new_password, $content);

        $mailData = [
            'name' => $mailFormat->name_my,
            'template_content' => $content,
        ];

        Mail::to($email)->send(new EgumisEmail($mailData));

        return response()->json($new_password);
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
