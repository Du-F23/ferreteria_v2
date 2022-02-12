<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsRequest extends FormRequest
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
            'name'=> ['required', 'min:3', 'max:255'],
            'cantidad'=> ['required', 'min:3', 'max:255'],
            'precio'=> ['required', 'min:3', 'max:255'],
            'category_id'=> ['required', 'min:3', 'max:255'],
        ];
    }
}
