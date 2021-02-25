<?php

namespace App\Models\Merchants\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'product_category_name'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Merchants\Store');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Merchants\Products\Product');
    }
}
