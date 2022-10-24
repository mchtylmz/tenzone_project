<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Connects;
use App\Models\User;
use App\Models\Help;
use App\Models\TherapyService;
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
        $connects = Connects::whereNotNull('user_id')->where('credit', '!=', 0)->orderBy('meet_date', 'DESC');
        if ($word = request('q')) {
            $connects->where(function($query) use($word) {
                $query->orWhere('meet_date', $word)
                    ->orWhere('meet_time', $word);
            });
        }

        return view('panel.admin.connects', [
            'connects' => $connects->paginate(15)
        ]);
    }

    public function helps()
    {
        $helps = Help::orderBy('category', 'ASC');
        if ($word = request('q')) {
            $helps->orWhere('title', 'LIKE','%'.$word.'%')
                  ->orWhere('content', 'LIKE','%'.$word.'%')
                  ->orWhere('category', 'LIKE','%'.$word.'%');
        }
        $helps = $helps->paginate(15);

        return view('panel.admin.helps', [
            'helps' => $helps
        ]);
    }

    public function help_add()
    {
        $help = new Help;
        $help->lang = 'en';
        $help->title = request('title');
        $help->content = request('content');
        $help->category = request('category');
        $help->save();

        return redirect()->back()->with('success', trans('Add Successfully'));
    }

    public function help_save(Help $help)
    {
        $help->title = request('title');
        $help->content = request('content');
        $help->category = request('category');
        $help->save();

        return redirect()->back()->with('success', trans('Update Successfully'));
    }

    public function help_delete(Help $help)
    {
        $help->delete();

        return redirect()->back()->with('success', trans('Delete Successfully'));
    }


    public function therapy_services()
    {
        $services = TherapyService::orderBy('category', 'ASC');
        if ($word = request('q')) {
            $services->orWhere('name', 'LIKE','%'.$word.'%')
                ->orWhere('description', 'LIKE','%'.$word.'%')
                ->orWhere('category', 'LIKE','%'.$word.'%');
        }
        $services = $services->paginate(15);

        return view('panel.admin.therapy_services', [
            'services' => $services
        ]);
    }

    public function therapy_add()
    {
        $service = new TherapyService;
        $service->name = request('name');
        $service->description = request('description');
        $service->category = request('category');
        $service->save();

        return redirect()->back()->with('success', trans('Add Successfully'));
    }

    public function therapy_save()
    {
        $service = TherapyService::findOrFail(request('id'));
        $service->name = request('name');
        $service->description = request('description');
        $service->category = request('category');
        $service->save();

        return redirect()->back()->with('success', trans('Update Successfully'));
    }

    public function therapy_delete()
    {
        $service = TherapyService::findOrFail(request('id'));
        $service->delete();

        return redirect()->back()->with('success', trans('Delete Successfully'));
    }
}
