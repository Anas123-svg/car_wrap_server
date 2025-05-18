<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\User;
use App\Models\CampaignsAssignedToUser;

class CampaignAssignedToUser extends Controller
{
        public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,pending,inactive',
        ]);

        $assignment = CampaignsAssignedToUser::findOrFail($id);
        $assignment->status = $request->status;
        $assignment->save();

        return back()->with('success', 'Campaign status updated successfully.');
    }

public function destroy($id)
{
    $assignment = CampaignsAssignedToUser::findOrFail($id);

    $assignment->delete();

    return response()->json(['success' => true, 'message' => 'Campaign assignment deleted successfully.']);
}

}
