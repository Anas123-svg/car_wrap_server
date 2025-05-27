<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Support\Facades\Auth;
class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('users')->get();
        return response()->json($campaigns);
    }

public function applyCampaignWithUserId(Request $request)
{
    $request->validate([
        'campaign_id' => 'required|exists:campaigns,id',
        'user_id' => 'required|exists:users,id',
    ]);

    $campaignId = $request->input('campaign_id');
    $userId = $request->input('user_id');

    $campaign = Campaign::findOrFail($campaignId);

    $alreadyAssigned = $campaign->users()->where('user_id', $userId)->exists();
    if ($alreadyAssigned) {
        return response()->json(['message' => 'User is already assigned to this campaign.'], 400);
    }

    $campaign->users()->attach($userId, ['status' => 'pending']);

    return response()->json(['message' => 'User assigned to campaign successfully.']);
}
public function applyCampaignWithtoken(Request $request)
{
    $request->validate([
        'campaign_id' => 'required|exists:campaigns,id',
    ]);

    $campaignId = $request->input('campaign_id');
    $userId = Auth::id(); 

    $campaign = Campaign::findOrFail($campaignId);

    $alreadyAssigned = $campaign->users()->where('user_id', $userId)->exists();
    if ($alreadyAssigned) {
        return response()->json(['message' => 'User is already assigned to this campaign.'], 400);
    }

    $campaign->users()->attach($userId, ['status' => 'pending']);

    return response()->json(['message' => 'User assigned to campaign successfully.']);
}

public function getCampaignsByUserId(Request $request)
{

    $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);
    $userId = $request->input('user_id');
    $campaigns = Campaign::whereHas('users', function ($query) use ($userId) {
        $query->where('user_id', $userId);
    })->get();

    return response()->json($campaigns);
}
public function getCampaignsByToken(Request $request)
{
    $userId = Auth::id(); 

    $campaigns = Campaign::whereHas('users', function ($query) use ($userId) {
        $query->where('user_id', $userId);
    })->get();

    return response()->json($campaigns);
}
}