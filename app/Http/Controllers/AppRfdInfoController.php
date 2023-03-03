<?php

namespace App\Http\Controllers;

use App\Models\AppRfdInfo;
use App\Models\AppRfdPayee;
use Illuminate\Http\Request;

class AppRfdInfoController extends Controller
{

    public function index()
    {
        return response()->json(AppRfdInfo::all());
    }

    public function store(Request $request)
    {
        $info = AppRfdInfo::create($request->all());
        return response()->json($info);

    }

    public function show($id)
    {
        $info = AppRfdInfo::with(['Payee', 'Doc', 'Bo'])->find($id);

        if ($info === null) {
            return [
                'Error' => "Data Not Found",
            ];
        }
        return response()->json($info);

    }

    public function update(Request $request, $id)
    {
        $info = AppRfdInfo::find($id);

        if ($info === null) {
            return [
                'Error' => "Data Not Found",
            ];
        }

        $info->update($request->except(['id', 'SEC_USER_ID']));
        return response()->json($info);

    }

    public function destroy($id)
    {
        $info = AppRfdInfo::find($id);
        if ($info === null) {
            return [
                'Error' => "Data Not Found",
            ];
        }

        $info->delete();
        return [
            'Delete' => 'Successful',
        ];

    }

    public function search(Request $request)
    {
        $result = AppRfdInfo::where('sec_user_id', 'LIKE', '%' . $request->sec_user_id . '%')
            ->orWhere('claimanIdType', 'LIKE', '%' . $request->claimanIdType . '%')
            ->orWhere('claimanIdName', 'LIKE', '%' . $request->claimanIdName . '%')
            ->orWhere('country', 'LIKE', '%' . $request->country . '%')
            ->orWhere('email', 'LIKE', '%' . $request->email . '%')
            ->orWhere('mobile_no', 'LIKE', '%' . $request->mobile_no . '%')
            ->orWhere('phone_no', 'LIKE', '%' . $request->phone_no . '%')
            ->orWhere('total_claim', 'LIKE', '%' . $request->total_claim . '%')
            ->orWhere('status', 'LIKE', '%' . $request->status . '%')
            ->orWhere('state', 'LIKE', '%' . $request->state . '%')
            ->orWhere('status_description', 'LIKE', '%' . $request->status_description . '%')
            ->get();

        return $result;
    }

    public function searchByUserId()
    {
        $wtd = AppRfdInfo::where('user_id', request('user_id'))->get();
        if ($wtd === null) {
            return [
                "Error" => "Data Not found",
            ];
        }
        return response()->json($wtd);

    }

    public function listRfdinfoRfdPayee(Request $request)
    {
        foreach ($request->rfdInfo as $info) {
            $rfdInfo = AppRfdInfo::create([
                "address1" => $info['address1'] ?? null,
                "address2" => $info['address2'] ?? null,
                "address3" => $info['address3'] ?? null,
                "city" => $info['city'] ?? null,
                "claim_date" => $info['claim_date'] ?? null,
                "id_no" => $info['id_no'] ?? null,
                "claimantIdType" => $info['claimanIdType'] ?? null,
                "claimantName" => $info['claimantName'] ?? null,
                "country" => $info['country'] ?? null,
                "created_by" => $info['created_by'] ?? null,
                "created_date" => $info['created_date'] ?? null,
                "email" => $info['email'] ?? null,
                "email_status" => $info['email_status'] ?? null,
                "express" => $info['express'] ?? null,
                "fax_no" => $info['fax_no'] ?? null,
                "idd_created" => $info['idd_created'] ?? null,
                "idd_file_name" => $info['idd_file_name'] ?? null,
                "joint_account" => $info['joint_account'] ?? null,
                "mobile_no" => $info['mobile_no'] ?? null,
                "modified_by" => $info['modified_by'] ?? null,
                "modified_date" => $info['modified_date'] ?? null,
                "phone_no" => $info['phone_no'] ?? null,
                "postcode" => $info['postcode'] ?? null,
                "record_count" => $info['record_count'] ?? null,
                "ref_no" => $info['ref_no'] ?? null,
                "state" => $info['state'] ?? null,
                "status" => $info['status'] ?? null,
                "status_date" => $info['status_date'] ?? null,
                "total_claim" => $info['total_claim'] ?? null,
                "validateStatus" => $info['validateStatus'] ?? null,
                "user_id" => $info['user_id'] ?? null,
                "status_description" => $info['status_description'] ?? null,
                "verify_by" => $info['verify_by'] ?? null,
            ]);
            $updatedRfdInfo[] = $rfdInfo;
        }

        foreach ($request->rfdPayee as $payee) {

            $rfdPayee = AppRfdPayee::create([
                "acc_no" => $payee['acc_no'] ?? null,
                "address" => $payee['address'] ?? null,
                "bankCode" => $payee['bankCode'] ?? null,
                "city" => $payee['city'] ?? null,
                "claimAmount" => $payee['claimAmount'] ?? null,
                "country" => $payee['country'] ?? null,
                "created_by" => $payee['created_by'] ?? null,
                "created_date" => $payee['created_date'] ?? null,
                "email" => $payee['email'] ?? null,
                "fax_no" => $payee['fax_no'] ?? null,
                "id_no" => $payee['id_no'] ?? null,
                "idType" => $payee['idType'] ?? null,
                "mobile_no" => $payee['mobile_no'] ?? null,
                "modified_by" => $payee['modified_by'] ?? null,
                "modified_date" => $payee['modified_date'] ?? null,
                "name" => $payee['name'] ?? null,
                "phone_no" => $payee['phone_no'] ?? null,
                "postcode" => $payee['postcode'] ?? null,
                "validateStatus" => $payee['validateStatus'] ?? null,
                "refund_info_id" => $payee['refund_info_id'] ?? null,
            ]);
            $updatedRfdPayee[] = $rfdPayee;
        }

        return [
            $updatedRfdInfo,
            $updatedRfdPayee,
        ];

    }

    public function backup(Request $request)
    {
        foreach ($request->rfdInfo as $key => $info) {
            $rfdInfo = AppRfdInfo::find($key);
            if ($rfdInfo === null) {
                return [
                    "Error" => "AppRfdInfo Id " . $key . " Not found",
                ];
            }
            $rfdInfo->update([
                "address1" => $info['address1'] ?? $rfdInfo->address1,
                "address2" => $info['address2'] ?? $rfdInfo->address2,
                "address3" => $info['address3'] ?? $rfdInfo->address3,
                "city" => $info['city'] ?? $rfdInfo->city,
                "claim_date" => $info['claim_date'] ?? $rfdInfo->claim_date,
                "id_no" => $info['id_no'] ?? $rfdInfo->id_no,
                "claimantIdType" => $info['claimanIdType'] ?? $rfdInfo->claimanIdType,
                "claimantName" => $info['claimantName'] ?? $rfdInfo->claimantName,
                "country" => $info['country'] ?? $rfdInfo->country,
                "created_by" => $info['created_by'] ?? $rfdInfo->created_by,
                "created_date" => $info['created_date'] ?? $rfdInfo->created_date,
                "email" => $info['email'] ?? $rfdInfo->email,
                "email_status" => $info['email_status'] ?? $rfdInfo->email_status,
                "express" => $info['express'] ?? $rfdInfo->express,
                "fax_no" => $info['fax_no'] ?? $rfdInfo->fax_no,
                "idd_created" => $info['idd_created'] ?? $rfdInfo->idd_created,
                "idd_file_name" => $info['idd_file_name'] ?? $rfdInfo->idd_file_name,
                "joint_account" => $info['joint_account'] ?? $rfdInfo->joint_account,
                "mobile_no" => $info['mobile_no'] ?? $rfdInfo->mobile_no,
                "modified_by" => $info['modified_by'] ?? $rfdInfo->modified_by,
                "modified_date" => $info['modified_date'] ?? $rfdInfo->modified_date,
                "phone_no" => $info['phone_no'] ?? $rfdInfo->phone_no,
                "postcode" => $info['postcode'] ?? $rfdInfo->postcode,
                "record_count" => $info['record_count'] ?? $rfdInfo->record_count,
                "ref_no" => $info['ref_no'] ?? $rfdInfo->ref_no,
                "state" => $info['state'] ?? $rfdInfo->state,
                "status" => $info['status'] ?? $rfdInfo->status,
                "status_date" => $info['status_date'] ?? $rfdInfo->status_date,
                "total_claim" => $info['total_claim'] ?? $rfdInfo->total_claim,
                "validateStatus" => $info['validateStatus'] ?? $rfdInfo->validateStatus,
                "user_id" => $info['user_id'] ?? $rfdInfo->user_id,
                "status_description" => $info['status_description'] ?? $rfdInfo->status_description,
                "verify_by" => $info['verify_by'] ?? $rfdInfo->verify_by,
            ]);
            $updatedRfdInfo[] = $rfdInfo;
        }

        foreach ($request->rfdPayee as $key => $payee) {
            $rfdPayee = AppRfdPayee::find($key);
            if ($rfdPayee === null) {
                return [
                    "Error" => "AppRfdPayee Id " . $key . " Not found",
                ];
            }
            $rfdPayee->update([
                "acc_no" => $payee['acc_no'] ?? $rfdPayee->acc_no,
                "address" => $payee['address'] ?? $rfdPayee->address,
                "bankCode" => $payee['bankCode'] ?? $rfdPayee->bankCode,
                "city" => $payee['city'] ?? $rfdPayee->city,
                "claimAmount" => $payee['claimAmount'] ?? $rfdPayee->claimAmount,
                "country" => $payee['country'] ?? $rfdPayee->country,
                "created_by" => $payee['created_by'] ?? $rfdPayee->created_by,
                "created_date" => $payee['created_date'] ?? $rfdPayee->created_date,
                "email" => $payee['email'] ?? $rfdPayee->email,
                "fax_no" => $payee['fax_no'] ?? $rfdPayee->fax_no,
                "id_no" => $payee['id_no'] ?? $rfdPayee->id_no,
                "idType" => $payee['idType'] ?? $rfdPayee->idType,
                "mobile_no" => $payee['mobile_no'] ?? $rfdPayee->mobile_no,
                "modified_by" => $payee['modified_by'] ?? $rfdPayee->modified_by,
                "modified_date" => $payee['modified_date'] ?? $rfdPayee->modified_date,
                "name" => $payee['name'] ?? $rfdPayee->name,
                "phone_no" => $payee['phone_no'] ?? $rfdPayee->phone_no,
                "postcode" => $payee['postcode'] ?? $rfdPayee->postcode,
                "validateStatus" => $payee['validateStatus'] ?? $rfdPayee->validateStatus,
                "refund_info_id" => $payee['refund_info_id'] ?? $rfdPayee->refund_info_id,
            ]);
            $updatedRfdPayee[] = $rfdPayee;
        }

        return [
            $updatedRfdInfo,
            $updatedRfdPayee,
        ];

    }

    public function createManyInfo(Request $request)
    {
        foreach ($request->info as $info) {
            $rfdInfo = AppRfdInfo::create([
                "address1" => $info['address1'] ?? null,
                "address2" => $info['address2'] ?? null,
                "address3" => $info['address3'] ?? null,
                "city" => $info['city'] ?? null,
                "claim_date" => $info['claim_date'] ?? null,
                "id_no" => $info['id_no'] ?? null,
                "claimantIdType" => $info['claimanIdType'] ?? null,
                "claimantName" => $info['claimantName'] ?? null,
                "country" => $info['country'] ?? null,
                "created_by" => $info['created_by'] ?? null,
                "created_date" => $info['created_date'] ?? null,
                "email" => $info['email'] ?? null,
                "email_status" => $info['email_status'] ?? null,
                "express" => $info['express'] ?? null,
                "fax_no" => $info['fax_no'] ?? null,
                "idd_created" => $info['idd_created'] ?? null,
                "idd_file_name" => $info['idd_file_name'] ?? null,
                "joint_account" => $info['joint_account'] ?? null,
                "mobile_no" => $info['mobile_no'] ?? null,
                "modified_by" => $info['modified_by'] ?? null,
                "modified_date" => $info['modified_date'] ?? null,
                "phone_no" => $info['phone_no'] ?? null,
                "postcode" => $info['postcode'] ?? null,
                "record_count" => $info['record_count'] ?? null,
                "ref_no" => $info['ref_no'] ?? null,
                "state" => $info['state'] ?? null,
                "status" => $info['status'] ?? null,
                "status_date" => $info['status_date'] ?? null,
                "total_claim" => $info['total_claim'] ?? null,
                "validateStatus" => $info['validateStatus'] ?? null,
                "user_id" => $info['user_id'] ?? null,
                "status_description" => $info['status_description'] ?? null,
                "verify_by" => $info['verify_by'] ?? null,
            ]);
            $createdRfdInfo[] = $rfdInfo;
        }
        return $createdRfdInfo;

    }

}
