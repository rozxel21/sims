<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Uuid;

use App\Models\Major;
use App\Models\Course;

class MajorController extends Controller
{

    public function index(){
        $majors = Major::with('course')->get();
        return view('major.index', compact('majors'));
    }

    public function store(Request $request){
		$course = Course::where('course_abrr', $request->course_abrr)->get()->first();

		$majors = json_decode($request->majors);
            
        foreach ($majors as $name) {
            $major = new Major;
            $major->major_guid =  Uuid::uuid();
            $major->major_name = $name;
            $major->course_id = $course->id;
            $major->save();
        }
    	return "okay";
	}

    public function test(){
        
    }
}
