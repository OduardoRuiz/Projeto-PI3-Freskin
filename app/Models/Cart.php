<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function product(){
        return Product::where('id', '=', $this->product_id)->first();
    }

    //função alterada, para contar os itens no icone do carrinho e na quantidade de produtos(tela pagamento)
    public static function count(){
        $cart = Cart::where('user_id','=', Auth()->user()->id)->get();
        $total = 0;
        foreach($cart as $item){
            $total += $item->quantity;
        }
        return $total;
    }


    //função para capturar o valor total da compra, usada na view payment
    public static function totalValue(){
        $cart = Cart::where('user_id','=', Auth()->user()->id)->get();
        $total = 0;
        foreach($cart as $item){
            $total += $item->product()->price * $item->quantity;
        }
        return $total;

    }
}
