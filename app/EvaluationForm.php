<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationForm extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'form_id';
    protected $table = 'evalution_form';
    protected $fillable = ['form_title'];
}
