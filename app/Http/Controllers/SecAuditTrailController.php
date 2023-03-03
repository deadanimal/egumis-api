<?php

namespace App\Http\Controllers;

use App\Models\SecAuditTrail;
use Illuminate\Http\Request;

class SecAuditTrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SecAuditTrail::all());
    }

    public function store(Request $request)
    {
        $auditTrail = SecAuditTrail::create($request->all());
        return response()->json($auditTrail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecAuditTrail  $secAuditTrail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auditTrail = SecAuditTrail::find($id);
        if ($auditTrail === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($auditTrail);

    }

    public function update(Request $request, $id)
    {
        $auditTrail = SecAuditTrail::find($id);
        if ($auditTrail === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $auditTrail->update($request->all());
        return response()->json($auditTrail);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecAuditTrail  $secAuditTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auditTrail = SecAuditTrail::find($id);
        if ($auditTrail === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $auditTrail->delete();
        return [
            'Delete' => 'Successful',
        ];
    }
}
