<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailSalesRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'product_id'=> ['required'],
            'sales_id'=> ['required'],
            'cantidad'=> ['required','integer', 'min:1'],
            'subtotal'=> ['required', 'numeric', 'min:1'],
        ];
    }
}
