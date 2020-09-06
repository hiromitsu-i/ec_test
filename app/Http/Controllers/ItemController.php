<?php

namespace App\Http\Controllers;

use App\Item;
use \Cart;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function itemDetail(Request $request,$id)
    {
        $item = Item::find($id);
        return view('itemdetail')->with('item',$item);
    }

    public function cart()
    {
        $carts = Cart::content();
        return view('cart')->with(compact('carts'));
    }

    public static function itemAddCart($id)
    {
        $item = Item::find($id);

        Cart::add([
            [
                'id' => $item->id,
                'name' => $item->item_name,
                'qty' => '1',
                'price' => $item->item_price,
                'weight' => '1',
                'options' => ['photo_path'=> $item->item_url??asset('/img/no_image_250.png')]
            ]
        ]);

        $carts = Cart::content();
        return view('cart')->with(compact('carts'));
    }

    public static function reset() {
        Cart::destroy();
        return redirect('/home');
    }

    public static function remove($rowId) {
        Cart::remove($rowId);
        return redirect('/cart');
    }
}
