<?php

namespace App\Http\Controllers;

use App\Models\AppEmailTemplate;
use Illuminate\Http\Request;

class AppEmailTemplateController extends Controller
{

    public function index()
    {
        return response()->json(AppEmailTemplate::all());
    }

    public function store(Request $request)
    {
        $result = AppEmailTemplate::create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppEmailTemplate  $appEmailTemplate
     * @return \Illuminate\Http\Response
     */
    public function show(AppEmailTemplate $appEmailTemplate)
    {
        return response()->json($appEmailTemplate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppEmailTemplate  $appEmailTemplate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppEmailTemplate $appEmailTemplate)
    {
        $result = $appEmailTemplate->update($request->all());
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppEmailTemplate  $appEmailTemplate
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppEmailTemplate $appEmailTemplate)
    {
        $result = $appEmailTemplate->delete();
        return response()->json($result);
    }
}
