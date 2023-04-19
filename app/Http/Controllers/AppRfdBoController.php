<?php

namespace App\Http\Controllers;

use App\Models\AppRfdBo;
use App\Models\RefEntityMaster;
use Illuminate\Http\Request;

class AppRfdBoController extends Controller
{

    public function index()
    {
        return response()->json(AppRfdBo::all());
    }

    public function show($id)
    {
        $wtd = AppRfdBo::find($id);
        if ($wtd === null) {
            return [
                "Error" => "Data Not found",
            ];
        }
        return response()->json($wtd);
    }

    public function store(Request $request)
    {
        if ($request->entity_code) {
            $entiti_master = RefEntityMaster::where('entity_code', $request->entity_code)->first();
            if ($entiti_master) {
                $request['entity_name'] = $entiti_master->entity_name_1;
            }
        }
        $doc = AppRfdBo::create($request->all());
        return response()->json($doc);
    }

    public function update(Request $request, AppRfdBo $appRfdBo)
    {
        $result = $appRfdBo->update($request->all());

        if ($result) {
            return response()->json($appRfdBo);
        } else {
            return 'failed';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppRfdBo  $appRfdBo
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppRfdBo $appRfdBo)
    {
        $result = $appRfdBo->delete();
        return response()->json($result);
    }

    public function searchByRefundInfoId()
    {
        $wtd = AppRfdBo::where('refund_info_id', request('refund_info_id'))
            ->get();
        if ($wtd === null) {
            return [
                "Error" => "Data Not found",
            ];
        }
        return response()->json($wtd);

    }

    public function searchByBo(Request $request)
    {
        $appRfdBo = AppRfdBo::with('appRfdInfo')->where('boMasterId', $request->boMasterId)->get();

        if (!$appRfdBo) {
            return [
                'Failed' => "boMasterId does not exist",
            ];
        }

        return response()->json($appRfdBo);
    }

    public function createManyBo(Request $request)
    {
        foreach ($request->bo as $bo) {

            if ($bo['entity_code']) {
                $entiti_master = RefEntityMaster::where('entity_code', $bo['entity_code'])->first();
                if ($entiti_master) {
                    $bo['entity_name'] = $entiti_master->entity_name_1;
                }
            }
            $rfdBo = AppRfdBo::create([
                "amount" => $bo['amount'] ?? null,
                "boMasterId" => $bo['boMasterId'] ?? null,
                "claimAmount" => $bo['claimAmount'] ?? null,
                "created_by" => $bo['created_by'] ?? null,
                "created_date" => $bo['created_date'] ?? null,
                "description" => $bo['description'] ?? null,
                "entity_code" => $bo['entity_code'] ?? null,
                "entity_name" => $bo['entity_name'] ?? null,
                "file_name" => $bo['file_name'] ?? null,
                "file_refno" => $bo['file_refno'] ?? null,
                "financial_year" => $bo['financial_year'] ?? null,
                "id_uma3" => $bo['id_uma3'] ?? null,
                "id_uma4" => $bo['id_uma4'] ?? null,
                "modified_by" => $bo['modified_by'] ?? null,
                "modified_date" => $bo['modified_date'] ?? null,
                "name" => $bo['name'] ?? null,
                "new_ic_number" => $bo['new_ic_number'] ?? null,
                "old_ic_number" => $bo['old_ic_number'] ?? null,
                "other_ref_no" => $bo['otherRefNo'] ?? null,
                "selected" => 1,
                "status" => $bo['status'] ?? null,
                "status_date" => $bo['status_date'] ?? null,
                "unclaimed_amount" => $bo['unclaimed_amount'] ?? null,
                "wtd_type" => $bo['wtd_type'] ?? null,
                "refund_info_id" => $bo['refund_info_id'] ?? null,
            ]);

            $updatedRfdBo[] = $rfdBo;

        }

        return $updatedRfdBo;
    }

}
