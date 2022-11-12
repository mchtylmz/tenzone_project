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

    public function edit(User $user)
    {
        return view('panel.admin.user_edit', [
            'user' => $user,
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

    public function update(User $user)
    {
        Validator::make(request()->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'surname'  => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email:filter', 'max:255', 'unique:users,email,'.$user->id],
            'dob'      => ['required', 'string', 'max:10'],
            'password' => ['nullable', 'sometimes', 'string', 'min:6'],
            'gender'   => ['required', 'in:male,female'],
            'plan_status'     => ['required', 'in:yes,no'],
            'plan_credit'     => ['required', 'integer'],
            'status'     => ['required', 'in:active,passive']
        ])->validate();


        $user->name = request()->name;
        $user->surname = request()->surname;
        $user->email = request()->email;
        $user->dob = request()->dob;
        if ($password = request()->password) {
            $user->password = $password;
        }
        $user->gender = request()->gender;
        $user->plan_status = request()->plan_status;
        $user->plan_credit = request()->plan_credit;
        $user->status = request()->status;
        $user->save();

        return redirect()->back()->withMessage('Successfully Updated');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->back()->withMessage('Successfully deleted');
    }
}
