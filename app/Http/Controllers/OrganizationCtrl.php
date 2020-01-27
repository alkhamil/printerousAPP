<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// declare model
use App\Organization;

class OrganizationCtrl extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('organization.index', compact('organizations'));
    }
}
