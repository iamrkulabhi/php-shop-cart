<?php

namespace App;

class Cart{

    public $items = null;
    public $total_qty = 0;
    public $total_price = 0.00;

    public function __construct($oldCart) {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->total_qty = $oldCart->total_qty;
            $this->total_price = $oldCart->total_price;
        }
    }

    public function add($product, $product_id) {
        $tempItem = [ 'qty' => 0, 'price' => $product->amount, 'item' => $product ];
        if($this->items) {
            if(array_key_exists($product_id, $this->items)){
                $tempItem = $this->items[$product_id];
            }
        }
        $tempItem['qty']++;
        $tempItem['price'] = $product->amount * $tempItem['qty'];
        $this->items[$product_id] = $tempItem;
        $this->total_qty++;
        $this->total_price += $product->amount;
    }

}
