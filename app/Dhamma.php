<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dhamma extends Model
{
	public $timestamps = false;
	
	protected $primaryKey = 'dhamma_id';
    protected $table = 'dhamma_article';
    protected $fillable = ['dhamma_title','dhamma_inform'];
}
