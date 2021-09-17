<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductUnit extends Model
{
    use HasFactory;
    public static $snakeAttributes = false;

    public function product(){
        return $this->belongsTo(Product::class, "product_id", "id");
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, "supplier_id", "id");
    }
}
