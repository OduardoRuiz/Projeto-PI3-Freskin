<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = "address";

    protected $fillable = ['user_id', 'contact', 'address', 'address_number', 'address_city', 'address_state','neighborhood','cep','complement']; 
}
