<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('dashboard', [
            'links'=> auth()->user()->links()->orderBy('order')->get(),
        ]);
    }
}
