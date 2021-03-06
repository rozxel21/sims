<?php

namespace App\Http\Requests\College;

use App\Http\Requests\Request;

class StoreCollegeRequest extends Request
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
            'college_abrr' => 'required|unique:colleges',
            'college_name' => 'required'
        ];
    }
}
