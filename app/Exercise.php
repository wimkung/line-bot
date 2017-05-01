<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public $timestamps = false;
	
	protected $primaryKey = 'exercise_id';
    protected $table = 'exercise';
    protected $fillable = ['exercise_title','exercise_inform'];
}
