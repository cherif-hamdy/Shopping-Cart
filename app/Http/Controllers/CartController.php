<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }

        $cart->addToCart($product);

        session()->put('cart', $cart);

        return redirect(route('products.index'))->with('success', 'Product Added To Cart');
    }

    public function showCart()
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }

        return view('cart.show', compact('cart'));
    }

    public function deleteCart()
    {
        session()->forget('cart');

        return redirect(route('products.index'))->with('success', 'You Cart Is Empty Now');
    }
}
