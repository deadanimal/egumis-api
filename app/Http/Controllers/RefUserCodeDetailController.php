<?php

namespace App\Http\Controllers;

use App\Models\RefUserCodeDetail;
use Illuminate\Http\Request;

class RefUserCodeDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefUserCodeDetail::all());
    }

    public function store(Request $request)
    {
        $usercodeDetail = RefUserCodeDetail::create($request->all());
        return response()->json($usercodeDetail);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefUserCodeDetail  $refUserCodeDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usercodeDetail = RefUserCodeDetail::find($id);
        if ($usercodeDetail === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($usercodeDetail);

    }

    public function update(Request $request, $id)
    {
        $usercodeDetail = RefUserCodeDetail::find($id);
        if ($usercodeDetail === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $usercodeDetail->update($request->all());
        return response()->json($usercodeDetail);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefUserCodeDetail  $refUserCodeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usercodeDetail = RefUserCodeDetail::find($id);
        if ($usercodeDetail === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $usercodeDetail->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
