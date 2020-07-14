<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use App\OrderLine;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin Eloquent
 */
class Order extends Model
{
    public const UPDATED_AT = null;

    protected $table = 'order';

    protected $fillable = [
        'user_id',
    ];

    public function orderLines(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }
}
