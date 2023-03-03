<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppRfdInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sec_user_id' => 'required|integer',
            'total_claim' => 'integer',
            'claim_date' => 'date',
            'express' => 'integer',
            'idd_created' => 'integer',
            'joint_account' => 'integer',
            'status_date' => 'date',
        ];
    }
}
