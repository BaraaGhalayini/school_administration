<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Name_ar' => 'required|string|regex:/^[\p{Arabic} ]+/u',
            'Name_en' => 'required|string|regex:/^[A-Za-z]+$/i',

            'Email' => 'required|unique:teachers,Email,'. $this->id,
            'Password' => 'required|string|min:8|max:20',
            'Specialization_id' => 'required',
            'Gender_id' => 'required',
            'Joining_Date' => 'required|date|date_format:Y-m-d',
            'Address' => 'required',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'Email.required' => trans('validation.required'),
    //         'Email.unique' => trans('validation.unique'),
    //         'Password.required' => trans('validation.required'),
    //         'Name_ar.required' => trans('validation.required'),
    //         'Name_en.required' => trans('validation.required'),
    //         'Specialization_id.required' => trans('validation.required'),
    //         'Gender_id.required' => trans('validation.required'),
    //         'Joining_Date.required' => trans('validation.required'),
    //         'Address.required' => trans('validation.required'),
    //     ];
    // }


}
