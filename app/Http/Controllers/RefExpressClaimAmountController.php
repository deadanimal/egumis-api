<?php

namespace App\Http\Controllers;

use App\Models\RefExpressClaimAmount;
use Illuminate\Http\Request;

class RefExpressClaimAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefExpressClaimAmount::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = RefExpressClaimAmount::create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefExpressClaimAmount  $refExpressClaimAmount
     * @return \Illuminate\Http\Response
     */
    public function show(RefExpressClaimAmount $refExpressClaimAmount)
    {
        return response()->json($refExpressClaimAmount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefExpressClaimAmount  $refExpressClaimAmount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefExpressClaimAmount $refExpressClaimAmount)
    {
        $result = $refExpressClaimAmount->update($request->all());
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefExpressClaimAmount  $refExpressClaimAmount
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefExpressClaimAmount $refExpressClaimAmount)
    {
        $result = $refExpressClaimAmount->delete();
        return response()->json($result);
    }
}
