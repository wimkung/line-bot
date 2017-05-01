<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DhammaPic extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'dhamma_pic_id';
    protected $table = 'dhamma_pic';
    protected $fillable = ['dhamma_pic_file','dhamma_id'];
}
