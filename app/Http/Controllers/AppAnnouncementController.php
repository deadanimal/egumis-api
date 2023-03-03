<?php

namespace App\Http\Controllers;

use App\Models\AppAnnouncement;
use Illuminate\Http\Request;

class AppAnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AppAnnouncement::all());
    }

    public function store(Request $request)
    {
        $anouncement = AppAnnouncement::create($request->all());
        return response()->json($anouncement);

    }

    public function show($id)
    {
        $anouncement = AppAnnouncement::find($id);
        if ($anouncement === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($anouncement);

    }

    public function update(Request $request, $id)
    {
        $anouncement = AppAnnouncement::find($id);
        if ($anouncement === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $anouncement->update($request->all());
        return response()->json($anouncement);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppAnnouncement  $appAnnouncement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anouncement = AppAnnouncement::find($id);
        if ($anouncement === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $anouncement->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
