<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    public function order(){
        return $this->belongsTo(Order::class, "draft_id", "id");
    }

    public function product(){
        return $this->belongsTo(Product::class, "product_id", "id");
    }

    
    public function productUnit(){
        return $this->belongsTo(ProductUnit::class, "product_unit_id", "id");
    }

    public function brand(){
        return $this->belongsTo(Brand::class, "brand_id", "id");

    }
    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id");

    }

}
