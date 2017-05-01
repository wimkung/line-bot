<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionForm extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'transaction_id';
    protected $table = 'transaction_form';
    protected $fillable = ['created_at', 'total_score', 'id', 'form_id'];
}
