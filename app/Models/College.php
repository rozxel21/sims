<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model{
    protected $table = 'colleges';
	protected $fillable = ['college_abrr', 'college_name'];

	public function courses(){
		return $this->hasMany('App\Models\Course');
	}
}
