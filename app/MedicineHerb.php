<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineHerb extends Model
{
    public $timestamps = false;
	
	protected $primaryKey = 'medicine_id';
    protected $table = 'medicine_herb';
    protected $fillable = ['medicine_title','medicine_inform'];
}
