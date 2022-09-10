<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Connects;
use App\Models\User;
use App\Models\Weeks;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:parent']);
    }

    public function index()
    {
        return view('panel.parent.welcome', [
            'childs' => auth()->user()->childs()->get()
        ]);
    }

    public function child_programme(User $child)
    {
        $weeks = $child->weeks()->latest()->get();

        return view('panel.parent.programme', [
            'child' => $child,
            'weeks' => $weeks
        ]);
    }

    public function reports()
    {
        return view('panel.parent.reports', [
            'childs' => auth()->user()->childs()->get()
        ]);
    }

    public function child_report(User $child)
    {
        $reports = $child->reports()->latest()->get();

        return view('panel.parent.report', [
            'child' => $child,
            'reports' => $reports
        ]);
    }

    public function mysubscription()
    {
        $plans = Plan::all();
        return view('panel.parent.subscription', ['plans' => $plans]);
    }

    public function mysubscription_save(Plan $plan)
    {
        $user = auth()->user();

        if (!$user->subscription($plan->id)->canceled()) {
            auth()->user()->subscription($plan->id)->cancelNow();
        }

        $user->plan_status = 'no';
        $user->plan_id = 0;
        $user->plan_credit = 0;
        $user->save();

        return redirect('/');
    }

    public function connect()
    {
        $user_ids = collect(user()->childs()->pluck('id'));
        $user_ids->push(user()->id);

        $connects = Connects::whereIn('user_id', $user_ids)->where('credit', '!=', 0)->orderBy('meet_date', 'DESC')->paginate(15);

        return view('panel.parent.connect', [
            'connects' => $connects
        ]);
    }

    public function book_teachers()
    {
        $teacher_ids = Connects::where('credit', '0')
                            ->where('meet_date', '>=', date('Y-m-d'))
                            ->whereNull('user_id')
                            ->groupBy('teacher_id')
                            ->pluck('teacher_id');

        return view('panel.parent.book_teachers', [
            'teachers' => User::whereIn('id', $teacher_ids)->paginate(12)
        ]);
    }

    public function book_teacher(User $teacher)
    {
        $connects = Connects::where('credit', '0')
            ->where('meet_date', '>', date('Y-m-d'))
            ->where('teacher_id', $teacher->id)
            ->whereNull('user_id')
            ->orderBy('meet_date', 'DESC')
            ->orderBy('meet_time', 'DESC')
            ->paginate(12);

        return view('panel.parent.book_teacher', [
            'teacher' => $teacher,
            'connects' => $connects
        ]);
    }


    // POST
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
