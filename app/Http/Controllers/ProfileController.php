<?php

namespace App\Http\Controllers;

use App\Mail\EgumisEmail;
use App\Models\AppEmailTemplate;
use App\Models\AuditLogMa;
use App\Models\SecRole;
use App\Models\SecUser;
use App\Models\SecUserEntity;
use App\Models\SecUserRole;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function daftar_pengguna()
    {
        return view('pengurusan-pengguna.daftar-pengguna');
    }

    public function simpan_pengguna(Request $request)
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
            return $error;
        }

        $entity = SecUserEntity::where('code', "RFND")->first();

        $salt = 123;
        $generatedPassword = $request->password . "{" . $request->username . $salt . "}";
        $hashedPassword = md5($generatedPassword);

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
            "first_login" => 0,
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

    }

    public function senarai_pengguna()
    {
        return view('pengurusan-pengguna.senarai-pengguna',
            ['senarai_pengguna' => SecUser::orderBy('created_date', 'desc')->get()]
        );

    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
