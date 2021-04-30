<?php

namespace App\Models\Merchants\Staffs;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAttandance extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'date',
        'clock_in',
        'clock_out',
        'break_out',
        'break_in',
        'working_hours',
        'late_hours',
        'ot_hours'
    ];

    public function staff()
    {
        return $this->belongsTo('App\Models\Merchants\Staffs\Staff');
    }
}
