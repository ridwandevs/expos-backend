<?php

namespace App\Repositories\Merchants\Employees;

use App\Repositories\Merchants\Stores\IdentifierRepository;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Support\Facades\Hash;

class EmployeeRepository
{
    protected $store;

    public function __construct($user)
    {
        $identifier = new IdentifierRepository($user);

        $this->store =  $identifier->getStore();
    }

    public function createEmployee($data)
    {
        $employee = $this->store->staff()->create([
            'staff_role_id' => $data['role_id'],
            'staff_name' => $data['name'],
            'staff_username' => $data['username'],
            'password' => Hash::make($data['password']),
            'staff_email' => $data['email'],
            'staff_phone' => $data['phone']
        ]);

        return $employee;
    }

    public function employeeList()
    {
        $employees = $this->store->staff;

        return $employees;
    }

    public function employeeDetail($id)
    {
        $employee = $this->store->staff()->where('id', $id)->first();

        return $employee;
    }

    public function changeStatus($id)
    {
        $emp = $this->employeeDetail($id);

        if ($emp->staff_active)
        {

            $update = ['staff_active' => 0];

        }else{

            $update = ['staff_active' => 1];

        }

        $trigger = $emp->update($update);

        return $trigger;
    }
}
