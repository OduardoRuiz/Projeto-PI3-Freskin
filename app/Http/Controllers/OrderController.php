<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{

    public function add(Request $request) {

    $cart = Cart::where('user_id', '=', Auth()->user()->id)->get();


$order = Order::create([

        'user_id' =>Auth()->user()->id,
        'status'=> 'Processando',
     /**Necessario implementar aqui o endereço do usuario*/
        'address' => 'Rua Freskin',
        'address_number' => '130',
        'address_city' => 'São Paulo',
        'address_state' =>'SP',
        'cc_number' => substr($request->cc_card, -4),
    ]);

    foreach($cart as $item){
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'qtds' => $item->quantity,
            'price' => $item->product()->price,

        ]);
/**deleta o item no carrinho apos fechar comprar */
        $item->delete();

    }

    return redirect(route('order.show'));
}

public function show(){
    return view('order.show');
}
}
