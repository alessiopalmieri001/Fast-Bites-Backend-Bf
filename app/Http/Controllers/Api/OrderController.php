<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreOrderRequest;

// Models
use App\Models\Order;
use App\Models\Food;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['restaurant', 'foods'])->paginate(2);

        return response()->json([
            'success' => true,
            'payload' => $orders
        ]);
    }

    public function show(string $id)
    {
        $order = Order::with(['restaurant', 'foods'])->find($id);

        return response()->json([
            'success' => true,
            'payload' => $order
        ]);
    }

    public function store(StoreOrderRequest $request)
    {
        // Crea un nuovo ordine
        $order = new Order();
        $order->name = $request->name;
        $order->surname = $request->surname;
        $order->email = $request->email;
        $order->phone_num = $request->phone;
        $order->address = $request->address;
        $order->restaurant_id = $request->restaurant_id;
        $order->total = $request->total;
        $order->status = $request->status;
        $order->save();

        // Aggiungi i piatti dell'ordine
        foreach ($request->foods as $food) {
            $order->foods()->attach($food['id'], ['quantity' => $food['quantity']]);
        }

        return response()->json([
            'success' => true,
            'payload' => $order
        ]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();

        return response()->json([
            'success' => true,
            'payload' => $order
        ]);
    }
}
