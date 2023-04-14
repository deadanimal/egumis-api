<?php

namespace App\Http\Controllers;

use App\Models\SecAuditLog;
use Illuminate\Http\Request;

class WebSecAuditLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('audit_trail.laporan_audit_trail', [
            'audit_trail' => SecAuditLog::orderBy('id', 'desc')->get(),
        ]);
    }

    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecAuditLog  $secAuditLog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecAuditLog  $secAuditLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
