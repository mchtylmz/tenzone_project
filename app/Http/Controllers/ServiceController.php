<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function detail(Service $service)
    {
        // 'site.service.' . $service->slug
        return view('site.service.educational', [
            'service' => $service,
            'plans'   => Plan::all()
        ]);
    }
}
