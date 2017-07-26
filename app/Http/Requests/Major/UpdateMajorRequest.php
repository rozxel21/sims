<?php

namespace App\Http\Requests\Major;

use App\Http\Requests\Request;

class UpdateMajorRequest extends Request
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
            'course_id' => 'required',
            'major_name' => 'required',
            'major_status' => 'required'
        ];
    }
}