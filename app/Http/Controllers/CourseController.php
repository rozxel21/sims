<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Uuid;

use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;

use App\Models\College;
use App\Models\Course;
use App\Models\Major;

class CourseController extends Controller
{
    public function index(){
		$courses = Course::with('college')->get();
		$i = 1;
		return view('course.index', compact('courses'));
	}

	public function create(){
		$colleges = College::where('college_status', true)->orderBy('college_name')->get();
		return view('course.create', compact('colleges'));
	}

	public function store(StoreCourseRequest $request){
		$course = new Course;
		$course->college_id = $request->college;
		$course->course_abrr = $request->course_abrr;
		$course->course_name = $request->course_name;
		$course->save();

		$majorsArray = json_decode($request->majors);

		foreach ($majorsArray as $major_name) {
            $major = new Major;
            $major->major_name = $major_name;
            $major->course_id = $course->id;
            $major->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Course is Successfully Added!'
        ]);
	}

	public function edit($course_abrr){
		$colleges = College::where('college_status', true)->orderBy('college_name')->get();
		$course = Course::where('course_abrr', $course_abrr)->get()->first();
		return view('course.edit', compact('colleges', 'course'));
	}

	public function update($id, UpdateCourseRequest $request){
		$course = Course::find($id);
		$course->college_id = $request->college_id;
		$course->course_name = $request->course_name;
		$course->course_status = $request->course_status;
		$course->save();

		return response()->json([
            'status' => 'success',
            'message' => 'Course is Successfully Updated!'
        ]);
	}

	public function test(){
		$course_abrr = "bsstat";
		return $course = Course::where('course_abrr', $course_abrr)->get()->first();
		//return $course->college->college_name;
	}
}
