<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $leads = Lead::all();

        return view('dashboard.index', compact('leads'));
    }
}
