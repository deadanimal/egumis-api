<?php

namespace App\Http\Controllers;

use App\Models\AppRfdStatus;
use Illuminate\Http\Request;

class AppRfdStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AppRfdStatus::all());
    }

    public function store(Request $request)
    {
        $status = AppRfdStatus::create($request->all());
        return response()->json($status);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppRfdStatus  $appRfdStatus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $status = AppRfdStatus::find($id);
        if ($status === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($status);

    }

    public function update(Request $request, $id)
    {
        $status = AppRfdStatus::find($id);
        if ($status === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $status->update($request->all());
        return response()->json($status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppRfdStatus  $appRfdStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = AppRfdStatus::find($id);
        if ($status === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $status->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
