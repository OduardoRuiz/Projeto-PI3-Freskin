<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{

    use HasFactory;

    protected $fillable = ['user_id', 'status', 'address', 'address_number', 'address_city', 'address_state', 'cc_number']; 

    public function items() {

        //return OrderItem::where( 'order_id', '=', $this->id)->get();
        return OrderItem::where('order_id','=',$this->id)->get();
    }

}
