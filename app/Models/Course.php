<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
	protected $fillable = ['course_abrr', 'course_name', 'college'];

	public function college(){
		return $this->belongsTo('App\Models\College');
	}

	public function majors(){
		return $this->hasMany('App\Models\Major');
	}
}
