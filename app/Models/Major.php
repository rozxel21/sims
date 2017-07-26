<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $table = 'majors';
	protected $fillable = ['major_guid','major_name'];

	public function course(){
		return $this->belongsTo('App\Models\Course');
	}
}
