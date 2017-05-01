<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
	public $timestamps = false;
    protected $primaryKey = 'share_id';
    protected $table = 'share_experience';
    protected $fillable = ['share_title', 'share_inform', 'id'];

    public function user(){
    	return $this->belongsTo('App\User');
  	}

  	public function sharepic()
    {
        return $this->hasMany('App\SharePic');
    }
}
