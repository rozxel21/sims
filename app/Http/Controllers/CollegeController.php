<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Provider\Uuid;

use App\Http\Requests\College\StoreCollegeRequest;
use App\Http\Requests\College\UpdateCollegeRequest;
use App\Models\College;

class CollegeController extends Controller{

	public function index(){
		$colleges = College::paginate(20);
		return view('college.index', compact('colleges'));
	}

	public function create(){
		return view('college.create');
	}

	public function store(StoreCollegeRequest $request){
		$college = new College;
		$college->college_abrr = $request->college_abrr;
		$college->college_name = $request->college_name; 
		$college->save();

		return response()->json([
            'status' => 'success',
            'message' => 'College is Successfully Added!'
        ]);
	}

	public function edit($college_abrr){
		$college = College::where('college_abrr', $college_abrr)->get()->first();
		return view('college.edit', compact('college'));
	}

	public function update($id, UpdateCollegeRequest $request){
		$college = College::find($id);
		$college->college_name = $request->college_name; 
		$college->college_status = $request->college_status; 
		$college->save();

		return response()->json([
            'status' => 'success',
            'message' => 'College is Successfully Updated!'
        ]);
	}

	public function test(){
		return College::All();
	}
}
