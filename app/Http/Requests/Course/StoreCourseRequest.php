<?php

namespace App\Http\Requests\Course;

use App\Http\Requests\Request;

class StoreCourseRequest extends Request
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
            'course_abrr' => 'required|unique:course_abrr',
            'course_name' => 'required'
        ];
    }
}
