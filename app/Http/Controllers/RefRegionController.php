<?php

namespace App\Http\Controllers;

use App\Models\RefRegion;
use Illuminate\Http\Request;

class RefRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefRegion::all());

    }

    public function store(Request $request)
    {
        $region = RefRegion::create($request->all());
        return response()->json($region);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefRegion  $refRegion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = RefRegion::find($id);
        if ($region === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($region);

    }

    public function update(Request $request, $id)
    {
        $region = RefRegion::find($id);
        if ($region === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $region->update($request->all());
        return response()->json($region);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefRegion  $refRegion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $region = RefRegion::find($id);
        if ($region === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $region->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
