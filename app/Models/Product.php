<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'type', 'price', 'qtds','unidadeMedida', 'description', 'image', 'spotlight'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public static function destaques()
    {
        return Product::where('spotlight','sim')->paginate(4);
    }
}
