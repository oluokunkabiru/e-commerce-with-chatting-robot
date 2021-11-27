<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
            'name' =>'required|string',
            'category' => 'required|string',
            'oldprice' => 'required|numeric',
            'newprice' => 'required|numeric',
            'location' => 'required|string',
            'quantity' =>'required|numeric',
            'description' => 'required|string|min:10',
            'image'=>'required',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'image.mimes'=> "Inavid Image",
    //     ];
    // }
}
