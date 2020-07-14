<?php

declare(strict_types=1);

namespace App\Events;

use App\Order;
use App\User;

final class OrderCreated
{
    /**
     * @var Order
     */
    public $order;

    /**
     * @var User
     */
    public $user;

    /**
     * @var int
     */
    public $price;

    public function __construct(Order $order, User $user, int $price)
    {
        $this->order = $order;
        $this->user = $user;
        $this->price = $price;
    }
}
