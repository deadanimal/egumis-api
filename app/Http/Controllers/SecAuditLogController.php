<?php

namespace App\Http\Controllers;

use App\Models\SecAuditLog;
use Illuminate\Http\Request;

class SecAuditLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SecAuditLog::all());
    }

    public function store(Request $request)
    {
        $auditLog = SecAuditLog::create($request->all());
        return response()->json($auditLog);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecAuditLog  $secAuditLog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auditLog = SecAuditLog::find($id);
        if ($auditLog === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($auditLog);
    }

    public function update(Request $request, $id)
    {
        $auditLog = SecAuditLog::find($id);
        if ($auditLog === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        $auditLog->update($request->except('sec_user_id'));
        return response()->json($auditLog);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecAuditLog  $secAuditLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auditLog = SecAuditLog::find($id);
        if ($auditLog === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $auditLog->delete();

        return [
            'Delete' => 'Successful',
        ];

    }
}
