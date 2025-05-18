<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $drivers = User::all();

        return view('pages.index', compact('drivers'));
    }
}
