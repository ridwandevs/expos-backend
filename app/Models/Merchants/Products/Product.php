<?php

namespace App\Models\Merchants\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'product_category_id',
        'inventory_item_id',
        'product_name',
        'product_photo',
        'product_description',
        'product_sku',
        'product_price',
        'stock'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Merchants\Store');
    }

    public function productCategory()
    {
        return $this->belongsTo('App\Models\Merchants\Products\ProductCategory');
    }
}
