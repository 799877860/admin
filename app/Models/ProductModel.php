<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'ss_product';
    protected $primaryKey = 'p_id';
    public $timestamps = false;
}
