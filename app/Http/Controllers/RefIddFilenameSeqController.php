<?php

namespace App\Http\Controllers;

use App\Models\RefIddFilenameSeq;
use Illuminate\Http\Request;

class RefIddFilenameSeqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefIddFilenameSeq::all());

    }

    public function store(Request $request)
    {
        $filenameSeq = RefIddFilenameSeq::create($request->all());
        return response()->json($filenameSeq);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefIddFilenameSeq  $refIddFilenameSeq
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filenameSeq = RefIddFilenameSeq::find($id);
        if ($filenameSeq === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($filenameSeq);

    }

    public function update(Request $request, $id)
    {
        $filenameSeq = RefIddFilenameSeq::find($id);
        if ($filenameSeq === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $filenameSeq->update($request->all());
        return response()->json($filenameSeq);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefIddFilenameSeq  $refIddFilenameSeq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filenameSeq = RefIddFilenameSeq::find($id);
        if ($filenameSeq === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $filenameSeq->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
