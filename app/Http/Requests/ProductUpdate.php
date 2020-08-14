<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use validator;
class ProductUpdate extends FormRequest
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
            //
            'name' => 'sometimes|required|string',
            'category' => 'sometimes|required|string',
            'oldprice' => 'sometimes|required|numeric',
            'newprice' => 'sometimes|required|numeric',
            'location' => 'sometimes|required|string',
            'quantity' => 'sometimes|required|numeric',
            'description' => 'sometimes|required|string|min:10',
            'image' => 'sometimes',
        ];
    }
}
