<?php

namespace App\Http\Controllers;

use App\Models\SecRole;
use Illuminate\Http\Request;

class SecRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(SecRole::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = SecRole::create($request->all());

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecRole  $secRole
     * @return \Illuminate\Http\Response
     */
    public function show(SecRole $secRole)
    {
        return response()->json($secRole);
    }

    public function update(Request $request, SecRole $secRole)
    {
        $secRole->update($request->all());
        return response()->json($secRole);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecRole  $secRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecRole $secRole)
    {
        $result = $secRole->delete();

        return response()->json($result);
    }
}
