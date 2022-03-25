<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // parent
            'name'     => ['required', 'string', 'max:255'],
            'surname'  => ['required', 'string', 'max:255'],
            'phone'    => ['required', 'string', 'max:20'],
            'email'    => ['required', 'string', 'email:filter', 'max:255', 'unique:users', 'different:child_email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'terms'    => ['required'],

            // child
            'child_name'     => ['required', 'string', 'max:255'],
            'child_surname'  => ['required', 'string', 'max:255'],
            'child_email'    => ['required', 'string', 'email:filter', 'max:255', 'unique:users,email'],
            'child_dob'      => ['required', 'string', 'max:10'],
            'child_password' => ['required', 'string', 'min:6'],
            'child_gender'   => ['required', 'in:male,female'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $parent = $this->parent($data);
        $parent->assignRole('parent');

        $child = $this->child($data, $parent);
        $child->assignRole('user');

        return $parent;
    }


    /**
     * @param array $data
     * @param User $parent
     * @return mixed
     */
    public function child(array $data, User $parent)
    {
        return User::create([
            'name'      => $data['child_name'],
            'surname'   => $data['child_surname'],
            'email'     => $data['child_email'],
            'gender'    => collect(['male','female'])->contains($data['child_gender']) ? $data['child_gender']:'unknown',
            'dob'       => carbon($data['child_dob'])->format('Y-m-d'),
            'password'  => Hash::make($data['child_password']),
            'parent_id' => $parent->id
        ]);
    }

    /**
     * @param array $data
     * @return \App\Models\User
     */
    public function parent(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'surname'  => $data['surname'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        debug($request, $user);
    }
}
