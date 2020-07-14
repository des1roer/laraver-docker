<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Order
     */
    private $model;

    /**
     * @var int
     */
    private $price;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $model, int $price)
    {
        $this->model = $model;
        $this->price = $price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->view('mails.mail')->with([
            'id' => $this->model->id,
            'price' => $this->price,
        ]);
    }
}
