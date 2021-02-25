<?php

namespace App\Models\Merchants\Staffs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'role_name',
        'permission'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Merchants\Store');
    }

    public function staff()
    {
        return $this->hasMany('App\Models\Merchants\Staffs\Staff');
    }
}
