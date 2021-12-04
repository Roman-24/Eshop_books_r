<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\UserCart;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreOrderRequest $request
     * @return string
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'psc' => 'required|min:5|max:6',
            'email' => 'required|email',
            'paytment_type' => 'required',
            'shipment_method' => 'required',
            'price' => 'required',
        ]);

        \Cart::clear();

        if (Auth::check()) {
            UserCart::where('user_id', Auth::user()->id)->delete();
        }

        Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'psc' => $request->psc,
            'email' => $request->email,
            'paytment_type' => $request->paytment_type,
            'shipment_method' => $request->shipment_method,
            'price' => $request->price,
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateOrderRequest $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
