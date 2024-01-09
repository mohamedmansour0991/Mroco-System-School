<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [
            'email' => 'required'  ,
            'password' => 'required'  ,
        ];
    }
}
