<?php

namespace App\Models\Merchants\Staffs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'staff_role_id',
        'staff_name',
        'staff_username',
        'password',
        'staff_email',
        'staff_phone',
        'staff_active'
    ];

    public function store()
    {
        return $this->belongsTo('App\Models\Merchants\Store');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Merchants\Staffs\StaffRole');
    }
}
