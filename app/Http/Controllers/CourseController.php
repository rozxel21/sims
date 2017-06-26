<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Uuid;

use App\Http\Requests\Course\StoreCourseRequest;

use App\Models\College;
use App\Models\Course;

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
		$course->course_guid = Uuid::uuid();
		$course->course_abrr = $request->course_abrr;
		$course->course_name = $request->course_name;
		$course->save();

		return "okay";
	}

	public function test(){
		return $course = College::with('courses')->get();
		//return $course->college->college_name;
	}
}
