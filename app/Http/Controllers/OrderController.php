<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\OrderLine;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;
use Webmozart\Assert\Assert;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $data = $request->all();

        /** @var User $user */
        $user = User::where('name', '=', $data['name'])
            ->where('email', '=', $data['email'])
            ->where('phone', '=', $data['phone'])
            ->firstOrFail()
        ;
        DB::beginTransaction();

        $order = Order::create([
            'user_id' => $user->id,
        ]);
        $price = 0;
        foreach ($data['items'] as $item) {
            $product = Product::findOrFail($item['id']);
            Assert::lessThanEq($item['qty'], $product->qty, 'Число товаров не может быть больше складского');
            OrderLine::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'qty' => $item['qty'],
                'price' => $product->price,
            ]);
            $product->qty -= $item['qty'];
            $product->save();
            $price += $item['qty'] * $product->price;
        }

        event(new OrderCreated($order, $user, $price));
        DB::commit();

        return $order;
    }
}
