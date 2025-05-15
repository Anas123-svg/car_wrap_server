<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{

    public function index()
    {
        $drivers = User::with('vehicles')->get();
    
        return view('pages.driver_page', compact('drivers'));
    }

    public function update(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id' => 'required|exists:users,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'status' => 'required|in:active,inactive',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $user = User::find($request->id);
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'status' => $request->status,
    ]);

    return response()->json(['success' => true, 'message' => 'User updated successfully.']);
}

}
