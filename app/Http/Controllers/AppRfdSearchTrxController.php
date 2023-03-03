<?php

namespace App\Http\Controllers;

use App\Models\AppRfdSearchTrx;
use Illuminate\Http\Request;

class AppRfdSearchTrxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AppRfdSearchTrx::all());

    }

    public function store(Request $request)
    {
        $searchtrx = AppRfdSearchTrx::create($request->all());
        return response()->json($searchtrx);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppRfdSearchTrx  $appRfdSearchTrx
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $searchtrx = AppRfdSearchTrx::find($id);
        if ($searchtrx === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($searchtrx);

    }

    public function update(Request $request, $id)
    {
        $searchtrx = AppRfdSearchTrx::find($id);
        if ($searchtrx === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $searchtrx->update($request->all());
        return response()->json($searchtrx);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppRfdSearchTrx  $appRfdSearchTrx
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $searchtrx = AppRfdSearchTrx::find($id);
        if ($searchtrx === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $searchtrx->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
