<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Loginreq extends FormRequest
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
            'email' => 'required|email|max:30',
            'password' => 'required|min:5|max:20',
        ];
    }


    public function messages(){
        return [
        
         'email.required'=>trans('myauth.name.required'),
         'email.email'=>trans('myauth.email.email'),
         'email.max'=>trans('myauth.email.max'),
         'password.required'=>trans('myauth.password.required'),
         'password.min'=>trans('myauth.password.min'),
         'password.max'=>trans('myauth.password.max'),
        ];

    }   

}
