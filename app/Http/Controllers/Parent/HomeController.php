<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:parent']);
    }

    public function index()
    {
        auth()->user()->subscribed(auth()->user()->plan_id);
        return view('panel.parent.welcome');
    }
}
