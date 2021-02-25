<?php

namespace App\Http\Controllers\Dashboard\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Stores\StoreRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $store;

    public function __construct()
    {
        $this->store = new StoreRepository();
    }

    public function index()
    {
        $stores = User::find(Auth::id())->store();

        return view('dashboard', compact('stores'));
    }

    public function createStore(Request $request)
    {
        $data = [
          'id' => Auth::id(),
          'name' => $request->store_name,
          'phone' => $request->store_phone,
          'email' => $request->store_email
        ];

        $store = $this->store->saveStore($data);

        return $store;
    }
}
