<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'name'          => 'required' ,
            'age'           => 'required|required' ,
            'subject'       => 'required' ,
            'address'       => 'required' ,
            'joinimg_date'  => 'required' ,
            'gender'        => 'required' ,
            'email'         => 'required|email' ,

        ];
    }
}
