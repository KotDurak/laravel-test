<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class MainPage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $events = Event::orderBy('id', 'desc')
            ->limit(10)->get();

        return view('home', [
            'events'    => $events
        ]);
    }
}
