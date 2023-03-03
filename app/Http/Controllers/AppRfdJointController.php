<?php

namespace App\Http\Controllers;

use App\Models\AppRfdJoint;
use Illuminate\Http\Request;

class AppRfdJointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AppRfdJoint::all());
    }

    public function store(Request $request)
    {
        $joint = AppRfdJoint::create($request->all());
        return response()->json($joint);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppRfdJoint  $appRfdJoint
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $joint = AppRfdJoint::find($id);
        if ($joint === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($joint);

    }

    public function update(Request $request, $id)
    {
        $joint = AppRfdJoint::find($id);
        if ($joint === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $joint->update($request->all());
        return response()->json($joint);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppRfdJoint  $appRfdJoint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $joint = AppRfdJoint::find($id);
        if ($joint === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $joint->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
