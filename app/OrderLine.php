<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin Eloquent
 */
class OrderLine extends Model
{
    public $timestamps = false;

    protected $table = 'order_line';

    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
    ];

    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
