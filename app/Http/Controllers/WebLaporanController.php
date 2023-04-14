<?php

namespace App\Http\Controllers;

use App\Models\AppRfdInfo;
use App\Models\AuditLogMa;
use App\Models\RefBoJoint;
use App\Models\RefBoMaster;
use Illuminate\Http\Request;

class WebLaporanController extends Controller
{
    public function semakanWtd()
    {
        // $semakan_wtd = AppRfdInfo::with(['user'])->get();
        $semakan_wtd = AuditLogMa::where('method_name', 'Carian WTD')->orderBy('created_date', 'desc')->get();

        foreach ($semakan_wtd as $semakan) {
            $refBoMaster = RefBoMaster::where('new_ic_number', $semakan->description)
                ->orWhere('old_ic_number', $semakan->description)->first();

            if (!$refBoMaster) {
                $refBoJoint = RefBoJoint::where('new_ic_number', $semakan->description)
                    ->orWhere('old_ic_number', $semakan->description)->first();
                if ($refBoJoint) {
                    $refBoMaster = RefBoMaster::where('id', $refBoJoint->bo_master_id)->first();
                }
            }
            $semakan['refBoMaster'] = $refBoMaster;
        }

        return view('pelaporan.laporan_semakan_wtd', compact('semakan_wtd'));
    }

    public function carianSemakanWtd(Request $request)
    {
        $semakan_wtd = AppRfdInfo::where('id', '!=', null);

        if ($request->nama) {
            $semakan_wtd->where('full_name', 'LIKE', '%' . $request->nama . '%');
        }
        if ($request->no_rujukan) {
            $semakan_wtd->where('file_refno', 'LIKE', '%' . $request->no_rujukan . '%');
        }
        if ($request->no_ic) {
            $semakan_wtd->where('id_no', 'LIKE', '%' . $request->no_ic . '%');
        }
        // if ($request->tempoh) {
        //     $semakan_wtd->whereDate('requested_time', 'LIKE', '%'.$request->tempoh.'%');
        // }
        if ($request->jenis_status) {
            $semakan_wtd->where('status', 'LIKE', '%' . $request->jenis_status . '%');
        }

        return view('pelaporan.laporan_semakan_wtd', [
            'semakan_wtd' => $semakan_wtd->get(),
            'nama' => $request->nama,
            'no_rujukan' => $request->no_rujukan,
            'no_ic' => $request->no_ic,
            'jenis_status' => $request->jenis_status,
        ]);

    }

    public function laporanGagalLogMasuk()
    {
        $logs = AuditLogMa::with('user')->whereIn('method_name', ["LOGIN FAIL", "FORGOT PASS", "USER REGISTERED"])->get();
        return view('pelaporan.laporan_gagal_log_masuk', compact('logs'));
    }

    public function laporanTuntutanAplikasi()
    {
        $info = AppRfdInfo::where('created_by', "MOBILEAPP")->get();
        return view('pelaporan.laporan_permohonan_tuntutan_aplikasi', compact('info'));
    }

    public function laporanTempohPenggunaanAplikasi()
    {
        return view('pelaporan.laporan_tempoh_penggunaan_aplikasi');
    }

}
