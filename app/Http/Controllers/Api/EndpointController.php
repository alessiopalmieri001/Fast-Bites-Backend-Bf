<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

// Models
use App\Models\Order;


class EndpointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Verifica se la richiesta contiene dati JSON
    if ($request->isJson()) {
        // Decodifica il JSON dalla richiesta
        $data = $request->json()->all();

        // Validazione dei dati
        // Implementa la tua logica di validazione qui

        // Crea un nuovo ordine
        $order = new Order();
        $order->name = $data['name'];
        $order->email = $data['email'];
        $order->address = $data['address'];
        $order->phone_num = $data['phone'];
        //$order->payment_nonce = $data['paymentNonce'];
        $order->restaurant_id = $data['restaurantId'];
        //$order->cart_items = json_encode($data['cartItems']);
        $order->total = $data['total'];
        $order->status = 'in preparazione';

        // Salva l'ordine nel database
        $order->save();

        return response()->json([
            'success' => true,
            'payload' => $order
        ]);
    } else {
        // Se la richiesta non contiene dati JSON, restituisci un errore
        return response()->json([
            'success' => false,
            'error' => 'Invalid JSON data'
        ], 400); // Codice di stato HTTP 400 per dati non validi
    }
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
