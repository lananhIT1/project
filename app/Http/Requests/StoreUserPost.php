<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
            'username'=>'required|min:4',
            'password'=>'required|min:8|max:50',
            'email'=>'required',
            'role'=>'required',
            'status'=>'checked',
            'avatar'=>'required'
        ];
    }
    public function messages(){
        return[
            'username.required'=>':attribute không được bỏ trống',
            
            'username.min'=>':attribute phai nhap lon hon 4 ki tu',

            'password.required'=>':attribute không được bỏ trống',
            'password.min'=>':attribute phai nhap lon hon 8 ki tu',
            'password.min'=>':attribute phai nhap it hon 50 ki tu',

            'email.required'=>':attribute không được bỏ trống',
            'role.required'=>':attribute không được bỏ trống',
            'status.checked'=>':attribute không được bỏ trống',
            'avatar.required'=>':attribute không được bỏ trống',

        ];
    }
}
