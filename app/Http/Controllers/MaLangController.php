<?php

namespace App\Http\Controllers;

use App\Models\MaLang;
use Illuminate\Http\Request;

class MaLangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(MaLang::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = MaLang::create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaLang  $maLang
     * @return \Illuminate\Http\Response
     */
    public function show(MaLang $maLang)
    {
        return response()->json($maLang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaLang  $maLang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaLang $maLang)
    {
        $maLang->update($request->all());
        return response()->json($maLang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaLang  $maLang
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaLang $maLang)
    {
        $result = $maLang->delete();
        return response()->json($result);
    }
}
