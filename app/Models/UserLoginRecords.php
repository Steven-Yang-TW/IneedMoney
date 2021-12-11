<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLoginRecords extends Model
{
    protected $table = 'user_login_records';

    protected $guarded = ['id'];
}
