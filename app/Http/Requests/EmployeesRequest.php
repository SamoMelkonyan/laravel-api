<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
        $id = null;
        if($this->route('employee')) {
            $id = $this->route('employee')->id;
        }
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => "nullable|email|unique:employees,email,$id",
            'companies_id' => 'nullable|numeric',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ];
    }
}
