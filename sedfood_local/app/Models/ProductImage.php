<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',
    ];


    public function productImage($slugProduct) {
        $product = Product::whereSlug($slugProduct)->firstOrFail();
        return $this->with('product')
                    ->where('product_id', $product->id)
                    ->get();
                    ;
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}