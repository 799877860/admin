<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'ss_user';
    protected $primaryKey = 'u_id';
    public $timestamps = false;
}
