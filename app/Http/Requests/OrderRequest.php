<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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

            'name' => 'required|string',
            'country' =>'sometimes|string',
            'city'  =>  'required|string',
            'address'   =>  'required|string',
            'state'   =>  'required|string',
            'zipcode'   =>  'required|digits_between:6,6',
            'phone'   =>  'required|digits_between:6,15',
            'email'   =>  'required|email',
            'payment_method'   =>  'required|string',
            'address1'   =>  'sometimes|string',



        ];
    }
}
