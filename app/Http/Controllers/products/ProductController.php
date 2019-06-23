<?php

namespace App\Http\Controllers\products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\products\Product;
use Config;
use Session;
use App\Cart;

class ProductController extends Controller
{
    public function show_all_products(){
        $products = Product::all();
        $symbol = Config::get('app.curency_symbol');
        return view('products.products-list')->with([ "products" => $products, 'symbol' => $symbol ]);
    }

    public function showproduct($id){
        $product = Product::findOrFail($id);
        $symbol = Config::get('app.curency_symbol');
        //dd($product);
        return view('products.product')->with([ "product" => $product, 'symbol' => $symbol ]);
    }

    public function add_to_cart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart); //dd($request->session()->get('cart'));
        return redirect()->back();
    }

    public function cart(Request $request) {
        if(!Session::has('cart')) {
            return view('products.cart')->with(['cart'=> null, 'totalPrice' => 0]);
        }
        $cartData = Session::get('cart');
        $cart = new Cart($cartData);
        $symbol = Config::get('app.curency_symbol');
        return view('products.cart')->with(['cart'=> $cart->items, 'totalPrice' => $cart->total_price, 'symbol' => $symbol]);
    }
}
