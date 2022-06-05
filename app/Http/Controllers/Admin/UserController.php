<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:superadmin|admin']);
    }

    public function index()
    {
        return view('panel.admin.user_add', [
            'roles' => Role::all(),
            'parents' => User::where('parent_id', '0')->get()
        ]);
    }

    public function store()
    {
        Validator::make(request()->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'surname'  => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email:filter', 'max:255', 'unique:users,email'],
            'dob'      => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:6'],
            'gender'   => ['required', 'in:male,female'],
            'role'     => ['required', 'string'],
            'parent_id' => ['required', 'integer'],
        ])->validate();

        $user = User::create([
            'name'      => request()->name,
            'surname'   => request()->surname,
            'email'     => request()->email,
            'dob'       => date('Y-m-d', strtotime(request()->dob)),
            'password'  => Hash::make(request()->password),
            'gender'    => request()->gender,
            'parent_id' => intval(request()->parent_id)
        ]);
        $user->syncRoles(request()->role);

        return redirect()->route('user.profile', $user->email)->withMessage('Successfully Added');
    }
}
