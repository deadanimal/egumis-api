<?php

namespace App\Http\Controllers;

use App\Models\RefExpressWtdType;
use Illuminate\Http\Request;

class RefExpressWtdTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefExpressWtdType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = RefExpressWtdType::create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefExpressWtdType  $refExpressWtdType
     * @return \Illuminate\Http\Response
     */
    public function show(RefExpressWtdType $refExpressWtdType)
    {
        return response()->json($refExpressWtdType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefExpressWtdType  $refExpressWtdType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefExpressWtdType $refExpressWtdType)
    {
        $refExpressWtdType->update($request->all());
        return response()->json($refExpressWtdType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefExpressWtdType  $refExpressWtdType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefExpressWtdType $refExpressWtdType)
    {
        $result = $refExpressWtdType->delete();
        return response()->json($result);
    }
}
