<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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
        if($this->route('company')) {
            $id = $this->route('company')->id;
        }
        return [
            'name' => 'required|max:255',
            'email' => "nullable|email|unique:companies,email,$id",
            'logo' => 'image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url'
        ];
    }
}
