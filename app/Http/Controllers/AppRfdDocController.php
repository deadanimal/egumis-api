<?php

namespace App\Http\Controllers;

use App\Models\AppRfdDoc;
use Illuminate\Http\Request;

class AppRfdDocController extends Controller
{

    public function index()
    {
        return response()->json(AppRfdDoc::all());

    }

    public function store(Request $request)
    {
        $doc = AppRfdDoc::create($request->all());
        return response()->json($doc);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppRfdDoc  $appRfdDoc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doc = AppRfdDoc::find($id);
        if ($doc === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($doc);

    }

    public function update(Request $request, $id)
    {
        $doc = AppRfdDoc::find($id);
        if ($doc === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $doc->update($request->all());
        return response()->json($doc);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppRfdDoc  $appRfdDoc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = AppRfdDoc::find($id);
        if ($doc === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $doc->delete();
        return [
            'Delete' => 'Successful',
        ];

    }

    public function craeteManyDoc(Request $request)
    {
        foreach ($request->doc as $doc) {
            $rfdDoc = AppRfdDoc::create([
                "claim_doc_code" => $doc['claim_doc_code'] ?? null,
                "created_by" => $doc['created_by'] ?? null,
                "created_date" => $doc['created_date'] ?? null,
                "description" => $doc['description'] ?? null,
                "descriptionMy" => $doc['descriptionMy'] ?? null,
                "doc_category" => $doc['doc_category'] ?? null,
                // "file_name" => $doc['file_name'] ?? null,
                "mandatory" => $doc['mandatory'] ?? null,
                "modified_by" => $doc['modified_by'] ?? null,
                "modified_date" => $doc['modified_date'] ?? null,
                "name" => $doc['name'] ?? null,
                "name_my" => $doc['name_my'] ?? null,
                "recordId" => $doc['recordId'] ?? null,
                "ref_no" => $doc['ref_no'] ?? null,
                "refundId" => $doc['refundId'] ?? null,
                "reupload" => $doc['reupload'] ?? null,
                "wtd_type_code" => $doc['wtd_type_code'] ?? null,
            ]);

            if (isset($doc['file_name'])) {
                $url = $doc['file_name']->store(
                    'doc', 'public'
                );
                $rfdDoc->update([
                    'file_name' => 'storage/' . $url,
                ]);
            }

            $createdRfdDoc[] = $rfdDoc;

        }

        return $createdRfdDoc;
    }
}
