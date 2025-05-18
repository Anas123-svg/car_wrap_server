<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{


    public function index(Request $request)
    {
        $query = Campaign::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('budget_sort')) {
            if ($request->budget_sort === 'low_to_high') {
                $query->orderBy('budget', 'asc');
            } elseif ($request->budget_sort === 'high_to_low') {
                $query->orderBy('budget', 'desc');
            }
        }

        if ($request->filled('sort')) {
            $sort = $request->sort === 'asc' ? 'asc' : 'desc';
            $query->orderBy('created_at', $sort);
        }

        $campaigns = $query->paginate(10)->appends($request->query());

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
    public function updateShow($id)
    {
        $campaign = Campaign::with(['users'])->findOrFail($id);

        return view('pages.update_campaign', compact('campaign'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'wrap_type' => 'nullable|string|max:255',
            'multiple_drivers' => 'nullable|boolean',
            'status' => 'nullable',
            'budget' => 'nullable|numeric',
            'time' => 'nullable|string',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'locations' => 'nullable|array',
        ]);

        $campaign = Campaign::findOrFail($id);

        $campaign->update([
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

        return redirect()->route('campaigns.index')->with('success', 'Campaign updated successfully!');
    }
    public function delete($id)
    {
        try {
            $campaign = Campaign::findOrFail($id);
            $campaign->delete();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


}
