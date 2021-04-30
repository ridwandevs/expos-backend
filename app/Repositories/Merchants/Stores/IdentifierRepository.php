<?php

namespace App\Repositories\Merchants\Stores;

use App\Models\User;

class IdentifierRepository
{
    protected $user;

    public function __construct($id)
    {
        $this->user = $id;
    }

    public function getStore()
    {
       $user = User::find($this->user);
       $store = $user->store->first();

       return $store;
    }

}
