<?php

namespace App;

class Cart
{
    public $items = [];
    public $totalQty;
    public $totalPrice;


    public function __construct($cart = null)
    {
        if ($cart) {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function addToCart($product)
    {
        $item = [
            'title' => $product->title,
            'price' => $product->price,
            'image' => $product->image,
            'qty' => 0
        ];

        if (!array_key_exists($product->id, $this->items)) {
            $this->items[$product->id] = $item;
            $this->totalPrice += $product->price;
            $this->totalQty += 1;
        } else {
            $this->totalPrice += $product->price;
            $this->totalQty += 1;
        }

        $this->items[$product->id]['qty'] += 1;
    }
}
