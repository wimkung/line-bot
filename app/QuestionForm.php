<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionForm extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'question_id';
    protected $table = 'question_form';
    protected $fillable = ['question_text', 'form_id'];
}
