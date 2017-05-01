<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HealthPic extends Model
{
	public $timestamps = false;

    protected $primaryKey = 'health_pic_id';
    protected $table = 'health_pic';
    protected $fillable = ['health_pic_file','health_id'];
}
