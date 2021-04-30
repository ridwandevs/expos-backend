<?php

namespace App\Repositories\Merchants\Employees;

use App\Repositories\Merchants\Stores\IdentifierRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AttendanceRepository
{
    protected $store;
    protected $dt;

    public function __construct($store)
    {
        $id = new IdentifierRepository($store);

        $this->dt = Carbon::now()->timezone('Asia/Kuala_lumpur');

        $this->store = $id->getStore();
    }

    public function authorizeStaff($data)
    {
        $staff = $this->store->staff()->where('staff_username', $data['username'])->first();

        $message = [];

        if (!empty($staff) && $staff->staff_active)
        {
            if (Hash::check($data['password'],$staff->password))
            {
                $message = [
                    'status' => 1,
                    'message' => json_decode($staff)
                ];

            }else{

                $message = [
                    'status' => 0,
                    'message' => 'Your password is unmatch with your username.'
                ];
            }
        }else{
            $message = [
                'status' => 0,
                'message' => 'Invalid account or your account has been deactivated.'
            ];
        }

        return $message;
    }
}
