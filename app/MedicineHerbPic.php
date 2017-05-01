<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineHerbPic extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'medicine_pic_id';
    protected $table = 'medicine_pic';
    protected $fillable = ['medicine_pic_file','medicine_id'];
}
