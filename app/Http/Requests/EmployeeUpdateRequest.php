<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
            'emp_id' => 'required|numeric',
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'nullable|numeric',
            'birthdate' => 'nullable|date',
            'photo' => 'required|mimes:jpg,png',
        ];
    }
}
