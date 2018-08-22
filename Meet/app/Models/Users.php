<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table      = 'user_table';
    protected $primaryKey = 'userid';

    public $timestamps    = false;
}
