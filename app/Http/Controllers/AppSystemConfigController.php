<?php

namespace App\Http\Controllers;

use App\Models\AppSystemConfig;
use Illuminate\Http\Request;

class AppSystemConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AppSystemConfig::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = AppSystemConfig::create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppSystemConfig  $appSystemConfig
     * @return \Illuminate\Http\Response
     */
    public function show(AppSystemConfig $appSystemConfig)
    {
        return response()->json($appSystemConfig);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppSystemConfig  $appSystemConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppSystemConfig $appSystemConfig)
    {
        $result = $appSystemConfig->update($request->all());
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppSystemConfig  $appSystemConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppSystemConfig $appSystemConfig)
    {
        $result = $appSystemConfig->delete();
        return response()->json($result);
    }
}
