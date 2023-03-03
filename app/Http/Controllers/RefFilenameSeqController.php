<?php

namespace App\Http\Controllers;

use App\Models\RefFilenameSeq;
use Illuminate\Http\Request;

class RefFilenameSeqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefFilenameSeq::all());

    }

    public function store(Request $request)
    {
        $filename_seq = RefFilenameSeq::create($request->all());
        return response()->json($filename_seq);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefFilenameSeq  $refFilenameSeq
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filename_seq = RefFilenameSeq::find($id);
        if ($filename_seq === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($filename_seq);

    }

    public function update(Request $request, $id)
    {
        $filename_seq = RefFilenameSeq::find($id);
        if ($filename_seq === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $filename_seq->update($request->all());
        return response()->json($filename_seq);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefFilenameSeq  $refFilenameSeq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filename_seq = RefFilenameSeq::find($id);
        if ($filename_seq === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $filename_seq->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
