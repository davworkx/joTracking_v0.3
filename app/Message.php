<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['joid', 'from', 'to', 'message', 'is_read'];
}
