<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        return view('site.help', [
            'categories' => Help::orderBy('id', 'ASC')->groupBy('category')->pluck('category'),
            'faqs'       => Help::orderBy('id', 'ASC')->get()
        ]);
    }
}
