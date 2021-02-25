<?php

namespace App\Models\Merchants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_name',
        'store_logo',
        'store_phone',
        'store_email',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Merchants\Products\Product');
    }

    public function productCategory()
    {
        return $this->hasMany('App\Models\Merchants\Products\ProductCategory');
    }

    public function staff()
    {
        return $this->hasMany('App\Models\Merchants\Staffs\Staff');
    }
}
