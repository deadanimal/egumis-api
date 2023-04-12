<?php

namespace App\Http\Controllers;

use App\Models\SecAuditTrx;
use Illuminate\Http\Request;

class SecAuditTrxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SecAuditTrx::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = SecAuditTrx::create($request->all());

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecAuditTrx  $secAuditTrx
     * @return \Illuminate\Http\Response
     */
    public function show(SecAuditTrx $secAuditTrx)
    {
        return response()->json($secAuditTrx);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecAuditTrx  $secAuditTrx
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecAuditTrx $secAuditTrx)
    {
        $result = $secAuditTrx->update($request->all());

        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecAuditTrx  $secAuditTrx
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecAuditTrx $secAuditTrx)
    {
        $result = $secAuditTrx->delete();

        return response()->json($result);
    }
}
