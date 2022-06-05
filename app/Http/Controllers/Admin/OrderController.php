<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:superadmin|admin']);
    }

    public function index()
    {
        $filter_type = request()->type ? request()->type : 'store';
        $orders = Order::where('type', $filter_type)->latest()->paginate(15);

        $orders->appends([
            'type' => $filter_type,
            'q' => request()->q
        ]);

        return view('panel.admin.orders', [
            'orders' => $orders,
            'filter_type' => $filter_type
        ]);
    }
}
