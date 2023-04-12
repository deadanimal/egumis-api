<?php

namespace App\Http\Controllers;

use App\Models\RefUsercodeHeader;
use Illuminate\Http\Request;

class RefUsercodeHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefUsercodeHeader::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = RefUsercodeHeader::create($request->all());

        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefUsercodeHeader  $refUsercodeHeader
     * @return \Illuminate\Http\Response
     */
    public function show(RefUsercodeHeader $refUsercodeHeader)
    {
        return response()->json($refUsercodeHeader);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefUsercodeHeader  $refUsercodeHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefUsercodeHeader $refUsercodeHeader)
    {
        $refUsercodeHeader->update($request->all());

        return response()->json($refUsercodeHeader);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefUsercodeHeader  $refUsercodeHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefUsercodeHeader $refUsercodeHeader)
    {
        $result = $refUsercodeHeader->delete();

        return response()->json($result);
    }
}
