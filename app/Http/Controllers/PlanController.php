<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function all()
    {
        return view('site.plans', [
            'plans' => Plan::all()
        ]);
    }
}
