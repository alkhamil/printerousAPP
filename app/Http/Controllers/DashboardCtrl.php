<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

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

    public function search(Request $request)
    {
        $query = DB::table('organizations')
                    ->where('name', 'like', '%'.$request->q.'%')
                    ->get();
        return view('dashboard.search', compact('query'));
    }
}
