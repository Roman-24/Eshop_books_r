<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('layout.pages.shopping-cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'cover' => $request->cover,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        session()->flash('success', 'Položka bola úspešne pridaná!');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Položka bola úspešne upravená!');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Položka bola úspešne odobraná!');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'Všetky položky boli úspešne odobrané!');

        return redirect()->route('cart.list');
    }

    public function payment()
    {
        $totalCArtPrice = \Cart::getTotal();
        return view('layout.pages.payment', compact('totalCArtPrice'));
    }
}
