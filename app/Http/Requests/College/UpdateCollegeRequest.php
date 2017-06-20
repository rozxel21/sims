<?php

namespace App\Http\Requests\College;

use App\Http\Requests\Request;

class UpdateCollegeRequest extends Request
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
            'college_name' => 'required',
            'college_status' => 'required'
        ];
    }
}