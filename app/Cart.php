<?php

namespace  App;

class Cart
{
    public $items = null;
    public $total_qty = 0;
    public $total_price = 0;

    public function __constructor($old_cart)
    {
        if ($old_cart){
            $this->items = $old_cart->items;
            $this->total_qty = $old_cart->total_qty;
            $this->total_price = $old_cart->total_price;
        }
    }

    public function add($item, $id){
        $stored_item = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $stored_item = $this->items[$id];
            }
        }
        $stored_item['qty']++;
        $stored_item['price'] = $item->price * $stored_item['qty'];
        $this->items[$id] = $stored_item;
        $this->total_qty++;
        $this->total_price += $item->price;
    }
}
