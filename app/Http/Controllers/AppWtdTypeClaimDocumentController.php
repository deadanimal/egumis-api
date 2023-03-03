<?php

namespace App\Http\Controllers;

use App\Models\AppWtdTypeClaimDocument;
use Illuminate\Http\Request;

class AppWtdTypeClaimDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AppWtdTypeClaimDocument::all());

    }

    public function store(Request $request)
    {
        $type_claim_doc = AppWtdTypeClaimDocument::create($request->all());
        return response()->json($type_claim_doc);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppWtdTypeClaimDocument  $appWtdTypeClaimDocument
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_claim_doc = AppWtdTypeClaimDocument::find($id);
        if ($type_claim_doc === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($type_claim_doc);

    }

    public function update(Request $request, $id)
    {
        $type_claim_doc = AppWtdTypeClaimDocument::find($id);
        if ($type_claim_doc === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $type_claim_doc->update($request->all());
        return response()->json($type_claim_doc);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppWtdTypeClaimDocument  $appWtdTypeClaimDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_claim_doc = AppWtdTypeClaimDocument::find($id);
        if ($type_claim_doc === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $type_claim_doc->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
