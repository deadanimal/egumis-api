<?php

namespace App\Http\Controllers;

use App\Models\AppFaqDetail;
use Illuminate\Http\Request;

class AppFaqDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(AppFaqDetail::all());
    }

    public function store(Request $request)
    {
        $faqDetail = AppFaqDetail::create($request->all());
        return response()->json($faqDetail);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AppFaqDetail  $appFaqDetail
     * @return \Illuminate\Http\Response
     */
    public function show($app_faq_detail)
    {
        $faqDetail = AppFaqDetail::where('faq_detail_id', $app_faq_detail)->first();
        if ($faqDetail === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($faqDetail);

    }

    public function update(Request $request, $app_faq_detail)
    {
        $faqDetail = AppFaqDetail::where('faq_detail_id', $app_faq_detail)->first();
        if ($faqDetail === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $faqDetail->update($request->all());
        return response()->json($faqDetail);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppFaqDetail  $appFaqDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($app_faq_detail)
    {
        $faqDetail = AppFaqDetail::where('faq_detail_id', $app_faq_detail)->delete();
        if ($faqDetail) {
            return [
                'Delete' => 'Successful',
            ];
        }
        return [
            'Delete' => 'Not Found',
        ];

    }
}
