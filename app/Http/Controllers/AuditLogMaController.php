<?php

namespace App\Http\Controllers;

use App\Models\AuditLogMa;
use Illuminate\Http\Request;

class AuditLogMaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AuditLogMa::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['ip_address'] = $request->ip();
        $result = AuditLogMa::create($request->all());

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuditLogMa  $auditLogMa
     * @return \Illuminate\Http\Response
     */
    public function show(AuditLogMa $auditLogMa)
    {
        return response()->json($auditLogMa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuditLogMa  $auditLogMa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditLogMa $auditLogMa)
    {
        $auditLogMa->update($request->all());
        return response()->json($auditLogMa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuditLogMa  $auditLogMa
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditLogMa $auditLogMa)
    {
        $result = $auditLogMa->delete();
        return response()->json($result);
    }
}
