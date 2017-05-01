<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    public $timestamps = false;
	
	protected $primaryKey = 'health_id';
    protected $table = 'health_article';
    protected $fillable = ['health_title','health_inform'];
}
