<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Activities;
use App\Models\Connects;
use App\Models\Reports;
use App\Models\User;
use App\Models\Weeks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:teacher']);
    }

    public function index()
    {
        return view('panel.teacher.welcome', [
            'childs' =>  User::role('user')->latest()->get()
        ]);
    }

    public function child_programme(User $child)
    {
        $weeks = $child->weeks()->latest()->get();

        return view('panel.teacher.programme', [
            'child' => $child,
            'weeks' => $weeks
        ]);
    }

    public function reports()
    {
        return view('panel.teacher.reports', [
            'childs' =>  User::role('user')->latest()->get()
        ]);
    }

    public function child_report(User $child)
    {
        $reports = $child->reports()->latest()->get();

        return view('panel.teacher.report', [
            'child' => $child,
            'reports' => $reports
        ]);
    }

    public function connect()
    {
        $connects = Connects::where('teacher_id', user()->id)->whereNotNull('user_id')->orderBy('meet_date', 'DESC')->paginate(15);

        return view('panel.teacher.connect', [
            'connects' => $connects
        ]);
    }


    // POST
    public function store_week()
    {
        Validator::make(request()->all(), [
            'user_id'     => ['required', 'integer'],
            'title'       => ['required', 'string', 'max:255'],
            'start_date'  => ['required', 'string', 'max:10'],
            'end_date'    => ['required', 'string', 'max:10']
        ])->validate();

        Weeks::create([
            'user_id'    => request()->user_id,
            'title'      => request()->title,
            'start_date' => date('Y-m-d', strtotime(request()->start_date)),
            'end_date'   => date('Y-m-d', strtotime(request()->end_date)),
        ]);

        return redirect()->back()->withMessage('Successfully Added');
    }

    public function connect_availability()
    {
        Validator::make(request()->all(), [
            'date'  => ['required', 'string', 'max:10']
        ])->validate();

        foreach (request()->time as $time) {
            Connects::create([
                'teacher_id'    => user()->id,
                'meet_date'     => date('Y-m-d', strtotime(request()->date)),
                'meet_time'     => date('H:i:00', strtotime($time))
            ]);
        }

        return redirect()->back()->withMessage('Successfully Availability Added');
    }

    public function update_conect(Connects $meet)
    {
        Validator::make(request()->all(), [
            'date'  => ['required', 'string', 'max:10'],
            'time'  => ['required', 'string', 'max:5'],
            'link'  => ['required', 'string']
        ])->validate();

        if (request()->date != $meet->meet_date) {
            $meet->meet_date =  date('Y-m-d', strtotime(request()->date));
        }

        if (request()->time != $meet->meet_time) {
            $meet->meet_time =  date('H:i:s', strtotime(request()->time));
        }

        $meet->meet_link = request()->link;
        $meet->save();

        $del_connect = Connects::where('credit', 0)
            ->where('teacher_id', user()->id)
            ->where('meet_date', $meet->meet_date)
            ->where('meet_time', $meet->meet_time)
            ->first();
        if ($del_connect) {
            $del_connect->delete();
        }

        return redirect()->back()->withMessage('Successfully Connect Updated');
    }

    public function store_report(User $child)
    {
        Validator::make(request()->all(), [
            'title'       => ['required', 'string', 'max:255']
        ])->validate();

        if (request()->hasFile('report_watch')) {
            $watch = request()->file('report_watch');
            $watch_name = Str::uuid() . "." . $watch->getClientOriginalExtension();
            $watch->storeAs('files', $watch_name, 'public');
        }
        if (request()->hasFile('report_document')) {
            $document = request()->file('report_document');
            $doc_name = Str::uuid() . "." . $document->getClientOriginalExtension();
            $document->storeAs('files', $doc_name, 'public');
        }

        Reports::create([
            'user_id'     => $child->id,
            'teacher_id'  => auth()->user()->id,
            'title'       => request()->title,
            'description' => request()->description,
            'watch'      => isset($watch_name) ? 'upload/files/'.$watch_name : null,
            'download'   => isset($doc_name)   ? 'upload/files/'.$doc_name : null
        ]);

        return redirect()->back()->withMessage('Successfully Added');
    }

    public function store_activity(Weeks $week)
    {
        Validator::make(request()->all(), [
            'title'  => ['required', 'string', 'max:255'],
            'type'   => ['required', 'string', 'max:255']
        ])->validate();

        if (request()->hasFile('watch')) {
            $watch = request()->file('watch');
            $watch_name = Str::uuid() . "." . $watch->getClientOriginalExtension();
            $watch->storeAs('files', $watch_name, 'public');
        }
        if (request()->hasFile('document')) {
            $document = request()->file('document');
            $doc_name = Str::uuid() . "." . $document->getClientOriginalExtension();
            $document->storeAs('files', $doc_name, 'public');
        }

        Activities::create([
            'week_id'    => $week->id,
            'teacher_id' => auth()->user()->id,
            'title'      => request()->title,
            'type'       => request()->type,
            'watch'      => isset($watch_name) ? 'upload/files/'.$watch_name : null,
            'download'   => isset($doc_name)   ? 'upload/files/'.$doc_name : null
        ]);

        return redirect()->back()->withMessage('Successfully Added');
    }


    // DELETE
    public function delete_activite(Activities $activite)
    {
        Activities::destroy($activite->id);

        return redirect()->back()->withMessage('Successfully Delete');
    }
}
