<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Uuid;

use App\Http\Requests\Major\StoreMajorRequest;
use App\Http\Requests\Major\UpdateMajorRequest;

use App\Models\Major;
use App\Models\Course;

class MajorController extends Controller
{

    public function index(){
        $majors = Major::with('course')->get();
        return view('major.index', compact('majors'));
    }

    public function create(){
        $courses = Course::where('course_status', true)->orderBy('course_name')->get();
        return view('major.create', compact('courses'));
    }

    public function store(StoreMajorRequest $request){
        $major = new Major;
        $major->course_id = $request->course_id;
        $major->major_name = $request->major_name;
        $major->save();
		
        return response()->json([
            'status' => 'success',
            'message' => 'Major is Successfully Added!'
        ]);
	}

    public function edit($id){
        $courses = Course::where('course_status', true)->orderBy('course_name')->get();
        $major = Major::find($id);
        return view('major.edit', compact('courses', 'major'));
    }

    public function update($id, UpdateMajorRequest $request){
        $major = Major::find($id);
        $major->course_id = $request->course_id;
        $major->major_name = $request->major_name;
        $major->major_status = $request->major_status;
        $major->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Major is Successfully Updated!'
        ]);
    }

    public function test(){
        
    }
}
