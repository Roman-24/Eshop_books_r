<?php

namespace App\Http\Controllers;

use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartList()
    {
        if (Auth::check()) {
            $cartItems = UserCart::where('user_id', Auth::user()->id)->get();
        } else {
            $cartItems = \Cart::getContent();
        }

        return view('layout.pages.shopping-cart', compact('cartItems'))->with("totalPrice", $cartItems->sum(function ($t) {
            return $t->price * $t->quantity;
        }));
    }


    public function addToCart(Request $request)
    {
        if (Auth::check()) {
            UserCart::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->cover ? $request->cover : "",
                'quantity' => $request->quantity]);
        } else
            \Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'attributes' => array(
                    'image' => $request->cover,
                )
            ]);

        session()->flash('success', 'Položka bola úspešne pridaná!');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        if (Auth::check()) {
            UserCart::where('id', $request->id)->update(
                [
                    'quantity' => $request->quantity
                ]
            );
        } else
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
        if (Auth::check()) {
            UserCart::where('id', $request->id)->delete();
        } else
            \Cart::remove($request->id);
        session()->flash('success', 'Položka bola úspešne odobraná!');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        if (Auth::check()) {
            UserCart::where('user_id', Auth::user()->id)->delete();
        } else
            \Cart::clear();

        session()->flash('success', 'Všetky položky boli úspešne odobrané!');

        return redirect()->route('cart.list');
    }

    public function payment()
    {
        if (Auth::check()) {
            $totalCArtPrice = UserCart::where('user_id', Auth::user()->id)->get();
            $totalCArtPrice = $totalCArtPrice->sum(function ($t) {
                return $t->price * $t->quantity;
            });
        } else
            $totalCArtPrice = \Cart::getTotal();
        return view('layout.pages.payment', compact('totalCArtPrice'));
    }
}
