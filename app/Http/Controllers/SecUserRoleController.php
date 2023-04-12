<?php

namespace App\Http\Controllers;

use App\Models\SecUserRole;
use Illuminate\Http\Request;

class SecUserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SecUserRole::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = SecUserRole::create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecUserRole  $secUserRole
     * @return \Illuminate\Http\Response
     */
    public function show(SecUserRole $secUserRole)
    {
        return response()->json($secUserRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecUserRole  $secUserRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecUserRole $secUserRole)
    {
        $result = $secUserRole->update($request->all());
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecUserRole  $secUserRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecUserRole $secUserRole)
    {
        $result = $secUserRole->delete();
        return response()->json($result);
    }
}
