<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'name'      => 'required' ,
            'teacher_id'=> 'required' ,
            'price'     => 'required|numeric' ,
            'rate'      => 'required|numeric' ,
            'students'  => 'required|numeric' ,
            'img'       => $this->method() == "POST" ? 'required|mimes:png,jpg,jpeg' : 'nullable|mimes:png,jpg,jpeg'

        ];
    }
}
