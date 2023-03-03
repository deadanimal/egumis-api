<?php

namespace App\Http\Controllers;

use App\Models\AppRfdBo;
use App\Models\AppRfdDoc;
use App\Models\AppRfdInfo;
use App\Models\AppRfdPayee;
use Illuminate\Http\Request;

class AppRfdPayeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AppRfdPayee::all());
    }

    public function store(Request $request)
    {
        $payee = AppRfdPayee::create($request->all());
        return response()->json($payee);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppRfdPayee  $appRfdPayee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payee = AppRfdPayee::find($id);
        if ($payee === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($payee);

    }

    public function update(Request $request, $id)
    {

        $payee = AppRfdPayee::find($id);
        if ($payee === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $payee->update($request->all());
        return response()->json($payee);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppRfdPayee  $appRfdPayee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payee = AppRfdPayee::find($id);
        if ($payee === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $payee->delete();
        return [
            'Delete' => 'Successful',
        ];
    }

    public function updateTable(Request $request)
    {
        $rfdInfo = AppRfdInfo::find($request->info['id']);
        if ($rfdInfo) {
            $rfdInfo->update([
                "address1" => $request->info['address1'] ?? $rfdInfo->address1,
                "address2" => $request->info['address2'] ?? $rfdInfo->address2,
                "address3" => $request->info['address3'] ?? $rfdInfo->address3,
                "city" => $request->info['city'] ?? $rfdInfo->city,
                "claim_date" => $request->info['claim_date'] ?? $rfdInfo->claim_date,
                "id_no" => $request->info['id_no'] ?? $rfdInfo->id_no,
                "claimantIdType" => $request->info['claimantIdType'] ?? $rfdInfo->claimantIdType,
                "claimantName" => $request->info['claimantName'] ?? $rfdInfo->claimantName,
                "country" => $request->info['country'] ?? $rfdInfo->country,
                "created_by" => $request->info['created_by'] ?? $rfdInfo->created_by,
                "created_date" => $request->info['created_date'] ?? $rfdInfo->created_date,
                "email" => $request->info['email'] ?? $rfdInfo->email,
                "email_status" => $request->info['email_status'] ?? $rfdInfo->email_status,
                "express" => $request->info['express'] ?? $rfdInfo->express,
                "fax_no" => $request->info['fax_no'] ?? $rfdInfo->fax_no,
                "idd_created" => $request->info['idd_created'] ?? $rfdInfo->idd_created,
                "idd_file_name" => $request->info['idd_file_name'] ?? $rfdInfo->idd_file_name,
                "joint_account" => $request->info['joint_account'] ?? $rfdInfo->joint_account,
                "mobile_no" => $request->info['mobile_no'] ?? $rfdInfo->mobile_no,
                "modified_by" => $request->info['modified_by'] ?? $rfdInfo->modified_by,
                "modified_date" => $request->info['modified_date'] ?? $rfdInfo->modified_date,
                "phone_no" => $request->info['phone_no'] ?? $rfdInfo->phone_no,
                "postcode" => $request->info['postcode'] ?? $rfdInfo->postcode,
                "record_count" => $request->info['record_count'] ?? $rfdInfo->record_count,
                "ref_no" => $request->info['ref_no'] ?? $rfdInfo->ref_no,
                "state" => $request->info['state'] ?? $rfdInfo->state,
                "status" => $request->info['status'] ?? $rfdInfo->status,
                "status_date" => $request->info['status_date'] ?? $rfdInfo->status_date,
                "total_claim" => $request->info['total_claim'] ?? $rfdInfo->total_claim,
                "validateStatus" => $request->info['validateStatus'] ?? $rfdInfo->validateStatus,
                "user_id" => $request->info['user_id'] ?? $rfdInfo->user_id,
                "status_description" => $request->info['status_description'] ?? $rfdInfo->status_description,
                "verify_by" => $request->info['verify_by'] ?? $rfdInfo->verify_by,
            ]);
        } else {
            $rfdInfo = [
                'AppRfdInfo' => 'Id ' . $request->info['id'] . ' not found',
            ];
        }

        if ($request->payee) {
            foreach ($request->payee as $payee) {
                $rfdPayee = AppRfdPayee::find($payee['id']);
                if ($rfdPayee) {
                    $rfdPayee->update([
                        "acc_no" => $payee['acc_no'] ?? $rfdPayee->acc_no,
                        "address" => $payee['address'] ?? $rfdPayee->address,
                        "bankCode" => $payee['bank_code'] ?? $rfdPayee->bank_,
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
                        "refund_info_id" => $rfdInfo['id'] ?? $rfdPayee->refund_info_id,
                    ]);
                } else {
                    $rfdPayee[] = [
                        'AppRfdPayee' => 'Id ' . $payee['id'] . ' not found',
                    ];
                }
                $allrfdPayee[] = $rfdPayee;
            }
        }

        if ($request->bo) {
            foreach ($request->bo as $bo) {
                $rfdBo = AppRfdBo::find($bo['id']);
                if ($rfdBo) {
                    $rfdBo->update([
                        "amount" => $bo['amount'] ?? $rfdBo->amount,
                        "boMasterId" => $bo['boMasterId'] ?? $rfdBo->boMasterId,
                        "claimAmount" => $bo['claimAmount'] ?? $rfdBo->claimAmount,
                        "created_by" => $bo['created_by'] ?? $rfdBo->created_by,
                        "created_date" => $bo['created_date'] ?? $rfdBo->created_date,
                        "description" => $bo['description'] ?? $rfdBo->description,
                        "entity_code" => $bo['entity_code'] ?? $rfdBo->entity_code,
                        "entity_name" => $bo['entity_name'] ?? $rfdBo->entity_name,
                        "file_name" => $bo['file_name'] ?? $rfdBo->file_name,
                        "file_refno" => $bo['file_refno'] ?? $rfdBo->file_refno,
                        "financial_year" => $bo['financial_year'] ?? $rfdBo->financial_year,
                        "id_uma3" => $bo['id_uma3'] ?? $rfdBo->id_uma3,
                        "id_uma4" => $bo['id_uma4'] ?? $rfdBo->id_uma4,
                        "modified_by" => $bo['modified_by'] ?? $rfdBo->modified_by,
                        "modified_date" => $bo['modified_date'] ?? $rfdBo->modified_date,
                        "name" => $bo['name'] ?? $rfdBo->name,
                        "new_ic_number" => $bo['new_ic_number'] ?? $rfdBo->new_ic_number,
                        "old_ic_number" => $bo['old_ic_number'] ?? $rfdBo->old_ic_number,
                        "other_ref_no" => $bo['other_ref_no'] ?? $rfdBo->other_ref_no,
                        "selected" => $bo['selected'] ?? $rfdBo->selected,
                        "status" => $bo['status'] ?? $rfdBo->status,
                        "status_date" => $bo['status_date'] ?? $rfdBo->status_date,
                        "unclaimed_amount" => $bo['unclaimed_amount'] ?? $rfdBo->unclaimed_amount,
                        "wtd_type" => $bo['wtd_type'] ?? $rfdBo->wtd_type,
                        "refund_info_id" => $rfdInfo['id'] ?? $rfdBo->refund_info_id,
                    ]);
                } else {
                    $rfdBo = [
                        'AppRfdBo' => 'Id ' . $bo['id'] . ' not found',
                    ];
                }
                $allrfdBo[] = $rfdBo;
            }
        }

        if ($request->doc) {
            foreach ($request->doc as $doc) {
                $rfdDoc = AppRfdDoc::find($doc['id']);
                if ($rfdDoc) {
                    $rfdDoc->update([
                        "claim_doc_code" => $doc['claim_doc_code'] ?? $rfdDoc->claim_doc_code,
                        "created_by" => $doc['created_by'] ?? $rfdDoc->created_by,
                        "created_date" => $doc['created_date'] ?? $rfdDoc->created_date,
                        "description" => $doc['description'] ?? $rfdDoc->description,
                        "descriptionMy" => $doc['descriptionMy'] ?? $rfdDoc->descriptionMy,
                        "doc_category" => $doc['doc_category'] ?? $rfdDoc->doc_category,
                        // "file_name" => $doc['file_name'] ?? $rfdDoc->file_name,
                        "mandatory" => $doc['mandatory'] ?? $rfdDoc->mandatory,
                        "modified_by" => $doc['modified_by'] ?? $rfdDoc->modified_by,
                        "modified_date" => $doc['modified_date'] ?? $rfdDoc->modified_date,
                        "name" => $doc['name'] ?? $rfdDoc->name,
                        "name_my" => $doc['name_my'] ?? $rfdDoc->name_my,
                        "recordId" => $doc['recordId'] ?? $rfdDoc->recordId,
                        "ref_no" => $doc['ref_no'] ?? $rfdDoc->ref_no,
                        "refundId" => $rfdInfo['id'] ?? $rfdDoc->refundId,
                        "reupload" => $doc['reupload'] ?? $rfdDoc->reupload,
                        "wtd_type_code" => $doc['wtd_type_code'] ?? $rfdDoc->wtd_type_code,
                    ]);

                    if (isset($doc['file_name'])) {
                        $url = $doc['file_name']->store(
                            'doc', 'public'
                        );
                        $rfdDoc->update([
                            'file_name' => 'storage/' . $url,
                        ]);
                    }

                } else {
                    $rfdDoc = [
                        'AppRfdDoc' => 'Id ' . $doc['id'] . ' not found',
                    ];
                }
                $allrfdDoc[] = $rfdDoc;
            }
        }

        return [
            'AppRfdInfo' => $rfdInfo ?? null,
            'AppRfdPayee' => $allrfdPayee ?? null,
            'AppRfdBo' => $allrfdBo ?? null,
            'AppRfdDoc' => $allrfdDoc ?? null,
        ];
    }

    public function createManyPayee(Request $request)
    {
        foreach ($request->payee as $payee) {
            $rfdPayee = AppRfdPayee::create([
                "acc_no" => $payee['acc_no'] ?? null,
                "address" => $payee['address'] ?? null,
                "bankCode" => $payee['bank_code'] ?? null,
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
            $createdRfdPayee[] = $rfdPayee;
        }

        return $createdRfdPayee;
    }
}
