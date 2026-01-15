<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function add_order(Product $product){
         $user = Auth::user();

        // 1️⃣ پیدا کردن سبد خرید فعال
        $order = Order::firstOrCreate(
            [
                'user_id' => $user->id,
                'status'  => 'pending',
            ]
        );

        // 2️⃣ اگر محصول قبلاً در سبد هست
        if ($order->products()->where('product_id', $product->id)->exists()) {

            $order->products()->updateExistingPivot(
                $product->id,
                ['quantity' => DB::raw('quantity + 1')]
            );

        } else {
            // 3️⃣ attach جدید
            $order->products()->attach($product->id, [
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'محصول به سبد خرید اضافه شد');
    }


    public function show_order(){
        $user=Auth::user();
        $order = Order::where('user_id', $user->id)
        ->where('status')
        ->with('products');

    return view('orders.order_show', compact('order'));

    }
}

