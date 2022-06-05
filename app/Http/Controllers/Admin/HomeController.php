<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Connects;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:superadmin|admin']);
    }

    public function index()
    {
        $filter_role = request()->role ? request()->role : 'user';
        $users = User::role($filter_role)->paginate(10);
        $users->appends(['role' => $filter_role]);

        $data = [
            'filter_role' => $filter_role,
            'users'       => $users
        ];

        return view('panel.admin.welcome', $data);
    }

    public function connects()
    {
        $connects = Connects::whereNotNull('user_id')->where('credit', '!=', 0)->orderBy('meet_date', 'DESC')->paginate(15);

        return view('panel.admin.connects', [
            'connects' => $connects
        ]);
    }
}
