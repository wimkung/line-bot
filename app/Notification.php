<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'notification_id';
    protected $table = 'notification';
    protected $fillable = ['notification_mess', 'notification_time', 'notification_status', 'id'];
}
