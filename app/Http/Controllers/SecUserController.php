<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSecUserRequest;
use App\Http\Requests\UpdateSecUserRequest;
use App\Mail\EgumisEmail;
use App\Models\AppEmailTemplate;
use App\Models\AppRfdBo;
use App\Models\AppRfdInfo;
use App\Models\AppRfdPayee;
use App\Models\AppRfdSearchTrx;
use App\Models\AppRfdStatus;
use App\Models\AppSystemConfig;
use App\Models\AuditLogMa;
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

        $mailFormat = AppEmailTemplate::where('code', 'ETSUBS')->first();
        $email = 'noramirulnordin@gmail.com';
        return $mailFormat->template_content_my;
        $content = str_replace('${submitterName}', 'Amirul', $mailFormat->template_content_my);
        $content = str_replace('${subInfo.eftNumber}', '123123', $content);
        $content = str_replace('${subInfo.totalAmt}', 'RM2000', $content);
        $content = str_replace('<a href="http://${egumisURL}" target="_blank">eGUMIS</a>', 'Aplikasi Mobile eGUMIS', $content);
        $mailData = [
            'name' => $mailFormat->name_my,
            'template_content' => $content,
        ];

        Mail::to($email)->send(new EgumisEmail($mailData));

        return response()->json([
            'message' => 'Email has been sent.',
        ], Response::HTTP_OK);
    }

    public function test()
    {

        $info = AppRfdInfo::where('user_id', '52397')->get();

        foreach ($info as $i) {
            AppRfdBo::where('refund_info_id', $i->id)->delete();
            AppRfdPayee::where('refund_info_id', $i->id)->delete();
            AppRfdStatus::where('rfd_id', $i->id)->delete();
            $i->delete();
        }
        return $info;
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
            AuditLogMa::create([
                "created_by" => "MOBILEAPP",
                "created_date" => now(),
                "menu_url" => "/api/login",
                "method_name" => "LOGIN FAIL",
                "description" => "Wrong Password",
                "descriptionmy" => "Gagal Log Masuk",
                "modified_by" => $user->id,
                "modified_date" => now(),
                "date_logged_in" => now(),
                "full_name" => $user->full_name,
                "http_method" => "POST",
                "ip_address" => request()->ip(),
                "requested_time" => now(),
                "requested_url" => "/api/login",
                "action" => "login",
                "action_by" => $user->id,
                "detail" => "Gagal Log Masuk",
                "entity_id" => $user->id,
                "entity_name" => $user->username,
            ]);
            return [
                'Login Error' => "Username and password does not match",
            ];
        }
        if ($user->password_modified_date) {
            $passwordModifiedDate = $user->password_modified_date;
            $now = now();
            $daysSincePasswordModified = $now->diffInDays($passwordModifiedDate);
            $dayFromConfig = AppSystemConfig::where('code', "USRPWD")->first()->int_value;
            if ($daysSincePasswordModified > $dayFromConfig) {
                return [
                    'code' => 19,
                    'massage' => "Password Expired",
                ];
            }
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
        $checkEmail = SecUser::where('email', $request->email)->first();
        $error = null;
        if ($checkEmail) {
            $error[] = 'Email telah didaftarkan';
        }
        if ($request->password != $request->cpassword) {
            $error[] = "Password " . $request->password . " tidak sama dengan " . $request->cpassword;
        }
        if ($error) {
            return [
                403,
                $error,
            ];
        }

        $entity = SecUserEntity::where('code', "RFND")->first();

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
            "claimant_type" => "IND",
            "company_name" => $request->company_name,
            "country" => $request->country,
            "cpassword" => $hashedPassword,
            "created_by" => "MOBILEAPP",
            "created_date" => now(),
            "dob" => $request->dob,
            "email" => $request->email,
            "enabled" => 1,
            "fax_no" => $request->fax_no,
            "first_login" => $request->first_login,
            "full_name" => $request->full_name,
            "gender" => $request->gender,
            "home_no" => $request->home_no,
            "identity_number" => $request->identity_number,
            "identity_type" => $request->identity_type ?? "INDV",
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

            AuditLogMa::create([
                "created_by" => $user->id,
                "created_date" => now(),
                "menu_url" => "/api/sec-user",
                "method_name" => "USER REGISTERED",
                "description" => "user was registered",
                "descriptionmy" => "User Telah Didaftarkan",
                "modified_by" => $user->id,
                "modified_date" => now(),
                "date_logged_in" => now(),
                "full_name" => $user->full_name,
                "http_method" => "POST",
                "ip_address" => request()->ip(),
                "requested_time" => now(),
                "requested_url" => "/api/sec-user",
                "action" => "register",
                "action_by" => $user->id,
                "detail" => "user telah didaftarkan",
                "entity_id" => $user->id,
                "entity_name" => $user->username,
                "entity_kp" => $user->identity_number,
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
    public function update(Request $request, $id)
    {
        $user = SecUser::find($id);
        if ($user === null) {
            return [
                'Error' => 'User does not exist',
            ];
        }
        $user->update([
            "activation_email" => $request->activation_email ?? $user->activation_email,
            "active_code" => $request->active_code ?? $user->active_code,
            "address1" => $request->address1 ?? $user->address1,
            "address2" => $request->address2 ?? $user->address2,
            "city" => $request->city ?? $user->city,
            "claimant_type" => $request->claimant_type ?? "IND",
            "company_name" => $request->company_name ?? ' ',
            "country" => $request->country ?? $user->country,
            "created_by" => "MOBILEAPP",
            "created_date" =>  $request->created_date ?? $user->created_date,
            "dob" => $request->dob ?? $user->dob,
            "enabled" =>  $request->enabled  ?? 1,
            "fax_no" => $request->fax_no ?? $user->fax_no,
            "first_login" => $request->first_login ?? $user->first_login,
            "full_name" => $request->full_name ?? $user->full_name,
            "gender" => $request->gender ?? $user->gender,
            "home_no" => $request->home_no ?? $user->home_no,
            "identity_number" => $request->identity_number ?? $user->identity_number,
            "identity_type" => $request->identity_type ?? "INDV",
            "last_logged_in_date" => now(),
            "mobile_no" => $request->mobile_no ?? $user->mobile_no,
            "modified_by" => $request->modified_by ?? $user->modified_by,
            "modified_date" => $request->modified_date ?? $user->modified_date,
            "office_no" => $request->office_no ?? ' ',
            "position" => $request->position ?? ' ',
            "postcode" => $request->postcode ?? $user->postcode,
            "profileUpdated" => $request->profileUpdated ?? $user->profileUpdated,
            "reset_password_email" => $request->reset_password_email ?? $user->reset_password_email,
            "state" => $request->state ?? $user->state,
            "username" => $request->username ?? $user->username,
            "address3" => $request->address3 ?? $user->address3,
            "search_count" => $request->search_count ?? 0,
            "aoCode" => $request->aoCode ?? $user->aoCode,
        ]);
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
        $user = SecUser::where('email', $id)->first();
        if ($user === null) {
            return [
                'Error' => 'User does not exist',
            ];
        }
        $info = AppRfdInfo::where('user_id', $user->id)->get();
        foreach ($info as $i) {
            AppRfdBo::where('refund_info_id', $i->id)->delete();
            AppRfdPayee::where('refund_info_id', $i->id)->delete();
            AppRfdStatus::where('rfd_id', $i->id)->delete();
            $i->delete();
        }
        SecUserRole::where('user_id', $user->id)->delete();

        $user->delete();
        return [
            'Delete' => "Successful",
        ];

    }

    public function ForgotPass()
    {
        $user = SecUser::where('email', request('email'))->first();
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

        AuditLogMa::create([
            "created_by" => "MOBILEAPP",
            "created_date" => now(),
            "menu_url" => "/api/forgot-pass",
            "method_name" => "FORGOT PASS",
            "description" => "User Reset Password",
            "descriptionmy" => "User Set Semula Kata Laluan",
            "modified_by" => $user->id,
            "modified_date" => now(),
            "date_logged_in" => now(),
            "full_name" => $user->full_name,
            "http_method" => "POST",
            "ip_address" => request()->ip(),
            "requested_time" => now(),
            "requested_url" => "/api/forgot-pass",
            "action" => "forgot password",
            "action_by" => $user->id,
            "detail" => "User Set Semula Kata Laluan",
            "entity_id" => $user->id,
            "entity_name" => $user->username,
        ]);

        return response()->json($new_password);
    }

    public function ChangePassword(Request $request, SecUser $user)
    {
        $salt = 123;
        $generatedPassword = $request->password . "{" . $user->username . $salt . "}";
        $hashedPassword = md5($generatedPassword);

        $user->update([
            'password' => $hashedPassword,
            'cpassword' => $hashedPassword,
        ]);
        return response()->json($user);
    }

    public function adminResetPass($username)
    {
        $user = SecUser::where('username', $username)->first();

        if (!$user) {
            return "User username: " . $username . " not found";
        }
        $salt = 123;
        $generatedPassword = 123 . "{" . $user->username . $salt . "}";
        $hashedPassword = md5($generatedPassword);

        $user->update([
            'password' => $hashedPassword,
            'cpassword' => $hashedPassword,
        ]);

        return "pasword berjaya ditukar ke 123";
    }
}