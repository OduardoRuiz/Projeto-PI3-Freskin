<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    public function product(){
        return Product::where('id', '=', $this->product_id)->first();
    }
    public static function count(){
        return Cart::where('user_id', '=', Auth()->user()->id)->count();
    }
}
