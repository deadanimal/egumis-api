<?php

namespace App\Http\Controllers;

use App\Models\AppClaimDocument;
use Illuminate\Http\Request;

class AppClaimDocumentController extends Controller
{

    public function index()
    {
        return response()->json(AppClaimDocument::all());
    }

    public function store(Request $request)
    {
        $claim_doc = AppClaimDocument::create($request->all());
        return response()->json($claim_doc);

    }

    public function show($id)
    {
        $claim_doc = AppClaimDocument::find($id);
        if ($claim_doc === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($claim_doc);

    }

    public function update(Request $request, $id)
    {
        $claim_doc = AppClaimDocument::find($id);
        if ($claim_doc === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $claim_doc->update($request->all());
        return response()->json($claim_doc);

    }

    public function destroy($id)
    {
        $claim_doc = AppClaimDocument::find($id);
        if ($claim_doc === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $claim_doc->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
