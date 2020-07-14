<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 */
class User extends Model
{
    protected $table = 'user';

    protected $fillable = [
        'name', 'email', 'phone',
    ];
}
