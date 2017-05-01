<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExercisePic extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'exercise_pic_id';
    protected $table = 'exercise_pic';
    protected $fillable = ['exercise_pic_file','exercise_id'];
}
