<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:parent']);
    }

    public function index()
    {
        return view('panel.parent.welcome');
    }

    public function child_add()
    {
        return view('panel.parent.child_add');
    }

    public function child_store()
    {
        Validator::make(request()->all(), [
            'name'     => ['required', 'string', 'max:255'],
            'surname'  => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email:filter', 'max:255', 'unique:users,email'],
            'dob'      => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:6'],
            'gender'   => ['required', 'in:male,female'],
        ])->validate();

        $child = User::create([
            'name'      => request()->name,
            'surname'   => request()->surname,
            'email'     => request()->email,
            'dob'       => date('Y-m-d', strtotime(request()->dob)),
            'password'  => Hash::make(request()->password),
            'gender'    => request()->gender,
            'parent_id' => auth()->user()->id
        ]);
        $child->syncRoles('user');

        return redirect()->route('user.profile', $child->email)->withMessage('Successfully Added');
    }
}
