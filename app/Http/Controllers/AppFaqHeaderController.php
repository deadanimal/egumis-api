<?php

namespace App\Http\Controllers;

use App\Models\AppFaqHeader;
use Illuminate\Http\Request;

class AppFaqHeaderController extends Controller
{

    public function index()
    {
        return response()->json(AppFaqHeader::all());
    }

    public function store(Request $request)
    {
        $faqHeader = AppFaqHeader::create($request->all());
        return response()->json($faqHeader);

    }

    public function show($id)
    {
        $faqHeader = AppFaqHeader::where('faq_header_id', $id)->first();
        if ($faqHeader === null) {
            return [
                'Error' => 'Data not found',
            ];
        }

        return response()->json($faqHeader);

    }

    public function update(Request $request, $id)
    {
        $faqHeader = AppFaqHeader::where('faq_header_id', $id)->first();
        if ($faqHeader === null) {
            return [
                'Error' => 'Data not found',
            ];
        }
        $faqHeader->update($request->all());
        return response()->json($faqHeader);

    }

    public function destroy($id)
    {
        $faqHeader = AppFaqHeader::where('faq_header_id', $id)->delete();

        if ($faqHeader) {
            return [
                'Delete' => 'Successful',
            ];
        }

        return [
            'Delete' => 'Failed, No Data Found',
        ];

    }
}
