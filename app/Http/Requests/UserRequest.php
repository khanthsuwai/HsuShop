<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'password'=>'required',
            'role'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Name ဖြည့်ဖို့လိုအပ်ပါသည်။',
            'email.required' => 'Email ဖြည့်ဖို့လိုအပ်ပါသည်။',
            'phone.required' => 'Phone Number ဖြည့်ဖို့လိုအပ်ပါသည်။',
            'address.required' => 'Address ဖြည့်ဖို့လိုအပ်ပါသည်။',
            'password.required' => 'Password ဖြည့်ဖို့လိုအပ်ပါသည်။',
            'role.required' => 'Role ဖြည့်ဖို့လိုအပ်ပါသည်။',
        ];
    }
}
