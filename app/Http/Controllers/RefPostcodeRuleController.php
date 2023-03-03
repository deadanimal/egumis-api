<?php

namespace App\Http\Controllers;

use App\Models\RefPostcodeRule;
use Illuminate\Http\Request;

class RefPostcodeRuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(RefPostcodeRule::all());
    }

    public function store(Request $request)
    {
        $postcode_rule = RefPostcodeRule::create($request->all());
        return response()->json($postcode_rule);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefPostcodeRule  $refPostcodeRule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postcode_rule = RefPostcodeRule::find($id);
        if ($postcode_rule === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($postcode_rule);

    }

    public function update(Request $request, $id)
    {
        $postcode_rule = RefPostcodeRule::find($id);
        if ($postcode_rule === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $postcode_rule->update($request->all());
        return response()->json($postcode_rule);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefPostcodeRule  $refPostcodeRule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postcode_rule = RefPostcodeRule::find($id);
        if ($postcode_rule === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $postcode_rule->delete();
        return [
            'Delete' => 'Successful',
        ];

    }
}
