<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'logo'=>'sometimes|image|mimes:png,jpg,gif,PNG,JPG,GIF,JPEG,jpeg',
            'phone'=>'required|digits_between:6,15',
            'supportemail'=>'required|email',
            'shipping'=>'sometimes|string|min:10|max:60',
            'facebook'=>'sometimes|url',
            'twitter'=>'sometimes|url',
            'linkedin'=>'sometimes|url',
            'instagram'=>'sometimes|url',
            'company'=>'required|string',
            'about'=>'sometimes|string|max:3000',
            'address' =>'sometimes|string|max:2000',
            'policy' =>'sometimes|string|max:2000',
            'aboutshop' =>'sometimes|string|max:3000',
            'who-we-are'=>'sometimes|string|max:4000',


        ];
    }
}
