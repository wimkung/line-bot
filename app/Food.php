<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public $timestamps = false;
	
	protected $primaryKey = 'food_id';
    protected $table = 'food';
    protected $fillable = ['food_title','food_inform'];
}
