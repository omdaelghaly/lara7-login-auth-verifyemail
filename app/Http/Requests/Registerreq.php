<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Registerreq extends FormRequest
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
     'name' => 'required|min:5|max:40',
     'email' => 'required|email|max:30|unique:users,email',
     'password' => 'required|min:5|max:20|same:confirmpwd',
     'confirmpwd'=> 'required|min:5|same:password'
      
        ];
    }

  public function messages(){
    return [
     'name.required'=>trans('myauth.name.required'),
     'name.min'=>trans('myauth.name.min'),
     'name.max'=>trans('myauth.name.max'),
     'email.required'=>trans('myauth.email.required'),
     'email.email'=>trans('myauth.email.email'),
     'email.unique'=>trans('myauth.email.unique'),
     'email.max'=>trans('myauth.email.max'),
     'password.required'=>trans('myauth.password.required'),
     'password.min'=>trans('myauth.password.min'),
     'password.max'=>trans('myauth.password.max'),
     'password.same'=>trans('myauth.password.same'),
     'confirmpwd.same'=>trans('myauth.confirmpwd.same'),
     'confirmpwd.required'=>trans('myauth.confirmpwd.required'),
     'confirmpwd.min'=>trans('myauth.confirmpwd.min'),


    ];

     }

     
    };