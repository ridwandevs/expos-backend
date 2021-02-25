<?php

namespace App\Repositories\Stores;

use App\Models\User;

class StoreRepository
{
    public function stores($id)
    {
        $stores = User::find($id)->store();

        return $stores;
    }

    public function saveStore($data)
    {
        $user = User::find($data['id']);

        $store = $user->store()->create([
           'store_name' => $data['name'],
           'store_email' => $data['email'],
           'store_phone' => $data['phone']
        ]);

        return $store;
    }
}
