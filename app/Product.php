<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 */
class Product extends Model
{
    public $timestamps = false;

    protected $table = 'product';
}
