<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Campaign;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
public function index(Request $request)
{
    $query = Campaign::withCount('users')->with(['users']);

    if ($request->has('filter')) {
        $filter = $request->input('filter');
        $now = Carbon::now();

        switch ($filter) {
            case 'today':
                $query->whereDate('created_at', $now->toDateString());
                break;

            case 'this_week':
                $query->whereBetween('created_at', [$now->startOfWeek(), $now->endOfWeek()]);
                break;

            case 'last_week':
                $query->whereBetween('created_at', [
                    $now->copy()->subWeek()->startOfWeek(),
                    $now->copy()->subWeek()->endOfWeek(),
                ]);
                break;

            case 'this_month':
                $query->whereMonth('created_at', $now->month)
                      ->whereYear('created_at', $now->year);
                break;
        }
    }

    $campaigns = $query->latest()->take(5)->get();
    $drivers = User::all();

    return view('pages.index', compact('drivers', 'campaigns'));
}



public function login(Request $request)
{
    if (Session::has('admin_token')) {
        return redirect()->route('index');
    }

    return view('pages.login');
}



}
