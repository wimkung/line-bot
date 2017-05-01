<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodPic extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'food_pic_id';
    protected $table = 'food_pic';
    protected $fillable = ['food_pic_file','food_id'];
}
