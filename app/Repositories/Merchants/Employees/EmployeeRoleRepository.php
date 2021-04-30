<?php

namespace App\Repositories\Merchants\Employees;

use App\Repositories\Merchants\Stores\IdentifierRepository;
use App\Repositories\Stores\StoreRepository;

class EmployeeRoleRepository
{
    protected $store;

    public function __construct($user)
    {
        $store = new IdentifierRepository($user);

        $this->store = $store->getStore();
    }

    public function createRole($data)
    {
        $role = $this->store->staffRole()->create($data);

        return $role;
    }

    public function roles()
    {
        $roles = $this->store->staffRole;

        return $roles;
    }

    public function updateRole($data)
    {
        $role = $this->store->staffRole()->where('id', $data['id'])->get();

        $update = $role->update([
            'role_name' => $data['role_name'],
            'permission' => $data['permission']
        ]);

        return $update;
    }
}
