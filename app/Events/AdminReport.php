<?php

declare(strict_types=1);

namespace App\Events;

use App\Order;
use App\OrderLine;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

final class AdminReport
{
    public function __invoke()
    {
        $result = [];

        $collection = Order::with('orderLines.product')
            ->where('created_at', '>', Carbon::now()->addHours(-1))
            ->get()
        ;

        /** @var Order $order */
        foreach ($collection as $order) {
            /** @var OrderLine[] $lines */
            $lines = $order->orderLines()->get();

            foreach ($lines as $line) {
                $result = self::calculate($line, $result);
            }
        }

        Mail::to(env('ADMIN_EMAIL'))->send(new \App\Mail\AdminReport($result));
    }

    private static function calculate(OrderLine $line, array $result): array
    {
        if (!array_key_exists($line['product_id'], $result)) {
            $qty = $line->product()->get()->first()->qty;
            $result[$line['product_id']] = [
                'sum' => $line['price'] * $line['qty'],
                'balance' => $qty,
                'isSoldOut' => $qty < 5 ? '+' : '-',
            ];
        } else {
            $result[$line['product_id']]['sum'] += ($line['price'] * $line['qty']);
        }

        return $result;
    }
}
