<?php

namespace App\Http\Controllers;

use App\Models\AppRfdSearchTrx;
use App\Models\AppSystemConfig;
use App\Models\AuditLogMa;
use App\Models\RefBoJoint;
use App\Models\RefBoMaster;
use App\Models\SecUser;
use Illuminate\Http\Request;

class RefBoMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefBoMaster::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = RefBoMaster::create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefBoMaster  $refBoMaster
     * @return \Illuminate\Http\Response
     */
    public function show(RefBoMaster $refBoMaster)
    {
        return response()->json($refBoMaster);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefBoMaster  $refBoMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefBoMaster $refBoMaster)
    {
        $result = $refBoMaster->update($request->all());
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefBoMaster  $refBoMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefBoMaster $refBoMaster)
    {
        $result = $refBoMaster->delete();
        return response()->json($result);
    }

    public function searchByIc()
    {

        $wtd = RefBoMaster::with('appRfdBo.appRfdInfo')->where('old_ic_number', request('ic_number'))
            ->orWhere('new_ic_number', request('ic_number'))
            ->get();

        if (!isset($wtd)) {
            return [
                "Error" => "IC Not found in Bo Master",
            ];
        }

        $result = null;
        foreach ($wtd as $w) {
            if ($w->appRfdBo->appRfdInfo->status != '01') {
                $result[] = $w;
            }
        }

        if ($result) {
            $record = AppRfdSearchTrx::create([
                "created_by" => request('created_by'),
                "search_date" => now(),
                "search_value" => request('search_value'),
                "username" => request('username'),
                "created_date" => now(),
                "full_name" => request('full_name'),
                "identity_number" => request('identity_number'),
                "ip_address" => request()->ip(),
            ]);
            return $result;
        }

        return [
            "Error" => "Status is 01",
        ];

    }

    public function semakanWtd(Request $request)
    {
        $maxSearch = AppSystemConfig::where('code', 'SRCMAX')->first();

        if (!$request->ic_user) {
            return [
                'code' => 404,
                "message" => "Sila Masukkan data ic_user",
            ];
        }

        // $searchedToday = AppRfdSearchTrx::whereDate('search_date', now())->where('identity_number', $request->ic_user)->get();

        $user = SecUser::where('identity_number', $request->ic_user)->first();
        $dateUser = explode(' ', $user->search_date);
        if ($dateUser[0] != today()->format('Y-m-d')) {
            $user->update([
                'search_date' => now(),
                'search_count' => 0,
            ]);
        }

        $searchedToday = $user->search_count;

        if ($maxSearch->enable == 1) {
            if ($maxSearch->int_value != 0) {
                if ($searchedToday >= $maxSearch->int_value) {
                    return [
                        'code' => 403,
                        "message" => "Carian Melebihi Had Carian Harian",
                        "bil_carian_user" => $searchedToday,
                    ];
                }
            }
        }

        $searchedToday++;
        $user->update([
            'search_count' => $searchedToday,
        ]);

        $BoMaster = RefBoMaster::with('appRfdBo.appRfdInfo.AppRfdStatus')->where('old_ic_number', request('ic_carian'))
            ->orWhere('new_ic_number', request('ic_carian'))
            ->get();

        $BoJoint = RefBoJoint::where('old_ic_number', request('ic_carian'))
            ->orWhere('new_ic_number', request('ic_carian'))
            ->get();

        AppRfdSearchTrx::create([
            "created_by" => $user->username,
            "search_date" => now(),
            "search_value" => $request->ic_carian,
            "username" => $user->username,
            "created_date" => now(),
            "full_name" => $user->full_name,
            "identity_number" => $user->identity_number,
            "ip_address" => $request->ip(),
        ]);

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $model = explode(' ', $user_agent);
        $os_array = array(
            '/windows nt 10/i' => 'Windows 10',
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile',
        );

        foreach ($os_array as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }
        }

        AuditLogMa::create([
            "created_by" => $user->username,
            "created_date" => now(),
            "menu_name_en" => null,
            "menu_name_ms" => null,
            "menu_url" => "/api/semakan-wtd",
            "method_name" => 'Carian WTD',
            "description" => request('ic_carian'),
            "descriptionmy" => null,
            "modified_by" => $user->username,
            "modified_date" => now(),
            "date_logged_in" => null,
            "date_logged_out" => null,
            "full_name" => $user->full_name,
            "http_method" => "POST",
            "ip_address" => $request->ip(),
            "requested_time" => null,
            "requested_url" => "/api/semakan-wtd",
            "session_id" => null,
            "action" => 'Carian WTD',
            "action_by" => $user->username,
            "detail" => "carian kali ke" . $searchedToday,
            "entity_id" => request('ic_user'),
            "entity_name" => $user->username,
            "os" => $os_platform ?? 'unknown',
            "model" => $model[0] ?? 'unknown',
        ]);

        return [
            'RefBoMaster' => $BoMaster,
            'RefBoJoint' => $BoJoint,
            'User' => $user,
            "bil_carian_user" => $searchedToday,
        ];

    }

}
