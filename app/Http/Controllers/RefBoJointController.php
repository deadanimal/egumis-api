<?php

namespace App\Http\Controllers;

use App\Models\RefBoJoint;
use Illuminate\Http\Request;

class RefBoJointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefBoJoint::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = RefBoJoint::create($request->all());
        return response()->json($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefBoJoint  $refBoJoint
     * @return \Illuminate\Http\Response
     */
    public function show(RefBoJoint $refBoJoint)
    {
        return response()->json($refBoJoint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefBoJoint  $refBoJoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefBoJoint $refBoJoint)
    {
        $result = $refBoJoint->update($request->all());
        return response()->json($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefBoJoint  $refBoJoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefBoJoint $refBoJoint)
    {
        $result = $refBoJoint->delete();
        return response()->json($result);
    }
}
