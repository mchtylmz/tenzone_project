<?php

namespace App\Http\Controllers;

use App\Models\BookFree;
use App\Models\BookTime;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function free()
    {
        return view('site.book_free');
    }

    public function freePost()
    {
        if (request()->answer) {
            BookFree::create([
                'question' => request()->question,
                'answer' => request()->answer,
            ]);
        }
        return redirect()->route('select.time');
    }

    public function time()
    {
        $times = [
            '10:00',
            '11:30',
            '13:00',
            '14:30',
            '16:00',
            '18:00',
            '20:00'
        ];
        return view('site.select_time', [
            'times' => $times,
            'today' => date('d M, l', strtotime('+3 days'))
        ]);
    }

    public function confirmTime($time)
    {
        return view('site.confirm_time', [
            'bookdate' => date('d M, l', $time),
            'booktime' => date('H:i', $time),
            'time'     => $time
        ]);
    }

    public function timePost()
    {
       BookTime::create([
           'fullname' => request()->fullname,
           'email' => request()->email,
           'phone' => request()->phone,
           'date' => date('Y-m-d', request()->time),
           'time' => date('H:i', request()->time),
       ]);
       session()->put('booktime', request()->time);
        return redirect()->route('book.completed');
    }

    public function completed()
    {
        return view('site.book_completed', [
            'bookdate' => date('d M, l', session('booktime')),
            'booktime' => date('H:i', session('booktime')),
        ]);
    }
}
