<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Plan;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Store::limit(6)->get();
        $blogs = Blog::limit(3)->get();

        return view('site.welcome', [
            'products' => $products,
            'blogs'    => $blogs,
        ]);
    }

    public function myaccount()
    {
        if (auth()->user()->hasRole(['parent', 'user']) && auth()->user()->plan_status == 'no' && auth()->user()->plan_id){
            return redirect()->route('plan.subscribe');
        }

        if (auth()->user()->hasRole(['parent', 'user', 'superadmin', 'admin', 'teacher', 'theraphy'])) {
            $roleName = auth()->user()->getRoleNames()[0];
            return redirect()->route(sprintf('%s.index', $roleName));
        }

        return redirect()->route('index');
    }

    public function myprofile()
    {
        return view('panel.profile');
    }

    public function myprofile_save()
    {
        return $this->extracted(auth()->user());
    }

    public function profile(User $user)
    {
        return view('panel.user.profile', [
            'user' => $user,
            'parent' => $user->parent()->first()
        ]);
    }

    public function profile_save(User $user)
    {
        return $this->extracted($user);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function extracted(User $user)
    {
        $user->name = request()->name;
        $user->surname = request()->surname;
        $user->email = request()->email;
        $user->gender = request()->gender;
        $user->dob = date('Y-m-d', strtotime(request()->dob));
        $user->save();

        return redirect()->back()->withMessage('Successfuly Updated');
    }

}
