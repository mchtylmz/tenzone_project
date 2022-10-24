<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Connects;
use App\Models\Submissions;
use App\Models\TherapyService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $filter_role = in_array(request()->role, ['teacher', 'therapy']) ? request()->role : 'teacher';

        $connects = Connects::where('user_id', user()->id)
            ->where('credit', '!=', 0)
            ->orderBy('meet_date', 'DESC')->paginate(15);

        return view('panel.user.connect', [
            'connects' => $connects,
            'filter_role' => $filter_role
        ]);
    }

    public function book_teachers()
    {
        $in_teachers = User::role(['teacher'])->pluck('id');
        $teacher_ids = Connects::where('credit', '0')
            ->where('meet_date', '>=', date('Y-m-d'))
            ->whereNull('user_id')
            ->whereIn('teacher_id', $in_teachers)
            ->groupBy('teacher_id')
            ->pluck('teacher_id');

        return view('panel.user.book_teachers', [
            'teachers' => User::whereIn('id', $teacher_ids)->paginate(12)
        ]);
    }

    public function book_therapy_services()
    {
        return view('panel.user.book_therapy_services', [
            'services' => TherapyService::orderBy('category')->paginate(12)
        ]);
    }

    public function book_therapist(TherapyService $service)
    {
        // bu servisi verebilen kullanıcılar listelenecek
        // kullanıcı ve sağladığı servis listesi olacak
        // TherapyService in kullanıcıları şeklinde gelecek
        return view('panel.user.book_therapist', [
            'therapist' => User::role(['therapy'])->paginate(12),
            'service' => $service
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
