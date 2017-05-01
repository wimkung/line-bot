<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SharePic extends Model
{
	public $timestamps = false;
	
    protected $primaryKey = 'share_pic_id';
    protected $table = 'share_pic';
    protected $fillable = ['share_pic_file','share_id'];

    public function share() {

	    return $this->belongsTo('App\Share');
  	}
}
