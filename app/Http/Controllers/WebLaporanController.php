<?php

namespace App\Http\Controllers;

use App\Models\AppRfdInfo;
use App\Models\AuditLogMa;
use App\Models\RefRegion;
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

    public function carianLaporanGagalLogMasuk(Request $request)
    {
        dd($request->all);
        $laporan = AuditLogMa::with('user');

        if ($request->nama_penuh) {
            $laporan->where('fullname', 'LIKE', '%' . $request->nama . '%');
        }
        if ($request->nama_pengguna) {
            $laporan->where('entity_name', 'LIKE', '%' . $request->nama_pengguna . '%');
        }
        if ($request->status) {
            $laporan->where('method_name', 'LIKE', '%' . $request->jenis_status . '%');
        }
        if ($request->no_ic) {
            $laporan->where('identity_number', 'LIKE', '%' . $request->no_ic . '%');
        }
        if ($request->tempoh) {
            $laporan->whereDate('created_date', 'LIKE', '%' . $request->tempoh . '%');
        }
        if ($request->emel) {
            $laporan->where('email', 'LIKE', '%' . $request->emel . '%');
        }

        return $request->jenis_status;
        return $laporan->get();
        return view('pelaporan.laporan_gagal_log_masuk', [
            'logs' => $laporan->get(),
            'nama' => $request->nama,
            'nama_pengguna' => $request->nama_pengguna,
            'status' => $request->status,
            'identity_number' => $request->no_ic,
            'tempoh' => $request->tempoh,
            'emel' => $request->emel,
        ]);
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

    public function laporanPermohonanWtd()
    {
        
        $permohonanWTD = AppRfdInfo::orderBy('created_date','DESC')->get();
        $refRegion = RefRegion::where('country_code',"MY")->get();
        // $wtd =  $permohonanWTD->first();

        // dd(RefRegion::pluck('region_code'));

        foreach ($refRegion as $r) {
            foreach ($permohonanWTD as $p) {
                if ($r->region_code == $p->state) {
                    $p['nama_region'] = $r->name;
                }
            }
        }
        // dd($AppRfdInfo::where('state',)->get());
        return view('pelaporan.laporan_permohonan_wtd',[
            'permohonanWTD'=> $permohonanWTD,
        ]);
    }

    public function carianPermohonanWtd(Request $request)
    {
        $createdDate2 = date('d-m-Y', strtotime($request->tempoh));
        $permohonanWTD = AppRfdInfo::orderBy('created_date','DESC');
        
        if ($request->no_ic) {
            $permohonanWTD->where('id_no',$request->no_ic);
        }
        if ($request->no_rujukan) {
            $permohonanWTD->where('ref_no',$request->no_rujukan);
        }
        if ($request->status) {
            $permohonanWTD->where('status',$request->status);
        }

        if ($request->tempoh) {
        //    $permohonanWTD->get()->filter(function($value) use ($request){
        //         dd($value->createDate,$request->tempoh);
        //         return $value->id == "2023-05-01";
        //     });
        //     dd($permohonanWTD->get());
            foreach ($permohonanWTD->get() as $p) {
                $createdDate = date('d-m-Y', strtotime($p->created_date));
                
                if ($createdDate == $createdDate2) {
                    $new[] = $p;
                }
            }
            if (!isset($new)) {
                $new = AppRfdInfo::where('id',null)->get();
            }
        }else {
            $new = $permohonanWTD->get();
        }
       
        $refRegion = RefRegion::where('country_code',"MY")->get();
       
        foreach ($refRegion as $r) {
            foreach ($new as $p) {
                if ($r->region_code == $p->state) {
                    $p['nama_region'] = $r->name;
                }
            }
        }


       

        return view('pelaporan.laporan_permohonan_wtd',[
            'permohonanWTD'=> $new,
            'tempoh' => $createdDate2,
            'no_ic'=>$request->no_ic,
            'no_rujukan'=>$request->no_rujukan,
            'status'=>$request->status,
        ]);
    }

}
