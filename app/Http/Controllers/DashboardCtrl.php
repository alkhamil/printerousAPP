<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCtrl extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function landing_page()
    {
        return view('dashboard.landing_page');
    }

    public function user_guide()
    {
        return view('dashboard.user_guide');
    }
}
