<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Connects;
use App\Models\Submissions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:user']);
    }

    public function index()
    {
        //parent()->subscribed(auth()->user()->plan_id);
        $weeks = auth()->user()->weeks()->latest()->get();

        return view('panel.user.programme', [
            'weeks' => $weeks
        ]);
    }

    public function reports()
    {
        $reports = auth()->user()->reports()->latest()->get();

        return view('panel.parent.report', [
            'child' => auth()->user(),
            'reports' => $reports
        ]);
    }

    public function connect()
    {
        $connects = Connects::where('user_id', user()->id)->where('credit', '!=', 0)->orderBy('meet_date', 'DESC')->paginate(15);

        return view('panel.user.connect', [
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

        return view('panel.user.book_teachers', [
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

        return view('panel.user.book_teacher', [
            'teacher' => $teacher,
            'connects' => $connects
        ]);
    }

    // POST
    public function storeSubmission(Activities $activitie)
    {
        if (request()->hasFile('fileToUpload')) {
            $file = request()->file('fileToUpload');
            $file_name = Str::uuid() . "." . $file->getClientOriginalExtension();
            $file->storeAs('files', $file_name, 'public');

            Submissions::create([
                'activite_id' => $activitie->id,
                'description' => request()->description,
                'file'        => 'upload/files/' . $file_name
            ]);
        }
        return redirect()->back()->withMessage('Saved Submission');
    }
}
