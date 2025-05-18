<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
        public function index(Request $request)
    {
        $campaigns = Campaign::all();

        return view('pages.campaign_page', compact('campaigns'));
    }

            public function add(Request $request)
    {
        $campaigns = Campaign::all();

        return view('pages.add_campaign', compact('campaigns'));
    }

public function show($id)
{
    $campaign = Campaign::with(['users'])->findOrFail($id);

    return view('pages.view_campaign', compact('campaign'));
}

        public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'wrap_type' => 'nullable|string|max:255',
            'multiple_drivers' => 'nullable|boolean',
            'status' => 'nullable',
            'budget' => 'nullable|numeric',
            'time' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'locations' => 'nullable|array',
        ]);

        $campaign = Campaign::create([
            'title' => $validated['title'],
            'wrap_type' => $validated['wrap_type'],
            'multiple_drivers' => $validated['multiple_drivers'],
            'status' => $validated['status'],
            'budget' => $validated['budget'],
            'time' => $validated['time'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'locations' => $validated['locations'],
        ]);

        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully!');
    }

}
