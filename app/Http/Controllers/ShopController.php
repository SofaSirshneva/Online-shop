<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function  catalog_view($id){
        $products= Product::where('catalog', '=', $id)->get();
        return view('shop.products', ['products' =>$products]);
    }

    public function cart_add($id){
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['count']++;
        }
        else{
            $cart[$id]=[
                "name"=>$product->name,
                "count"=> $product->count+1,
                "price"=> $product->price,
                "image"=> $product->image,
            ];
        }
        
        session()->put('cart', $cart);
        return "Товар добавлен в корзину";
    }

    public function cart_inc($id){
        return $this->cart_update($id, 1);
    }

    public function cart_dec($id){
        return $this->cart_update($id, -1);
    }

    public function cart_update($id, $count){
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['count']+=$count;
            session()->put('cart', $cart);
        }
        else{
            return response()->noContent(404);
        }

        return "Корзина обновлена";
    }

    public function cart_remove($id){
        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        else{
            return response()->noContent(404);
        }
        redirect()->back();
        return "Корзина обновлена";
    }

    public function total_price(){
        $total = 0;
        $cart = session()->get('cart', []);
        foreach($cart as $item)
            $total+=$item['count'] * $item['price'];
        return $total;
    }

    public function cart_view(){
        $cart = session()->get('cart', []);
        return view('shop.cart', ['cart'=> $cart]);
    }

    public function item_view($id){
        $product = Product::where('id', '=', $id)->first();
        return view('shop.good', ['item'=>$product]);
    }
}
