<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Vehicle;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
                'phone' => 'nullable|string',
                'profile_photo' => 'nullable|string',
                'licence_photo' => 'nullable|string',
                'vehicle.name' => 'required|string',
                'vehicle.vehicle_no' => 'nullable|string',
                'vehicle.vehicle_type' => 'nullable|string',
                'vehicle.vehicle_images' => 'nullable|array',
            ]);

            \DB::beginTransaction();

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'profile_photo' => $validated['profile_photo'] ?? null,
                'password' => Hash::make($validated['password']),
                'phone' => $validated['phone'] ?? null,
                'licence_photo' => $validated['licence_photo'] ?? null,
            ]);

            $vehicleData = $validated['vehicle'];
            $vehicleData['user_id'] = $user->id;

            Vehicle::create($vehicleData);

            \DB::commit();

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user->load('vehicles'),
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'message' => 'Registration failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    // User Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user->load('vehicles'),
        ]);
    }

    // Update User Profile
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string',
            'licence_photo' => 'nullable|string',
            'profile_photo' => 'nullable|string',
            'password' => 'nullable|min:6|confirmed',
        ]);

        if ($request->filled('name'))
            $user->name = $request->name;
        if ($request->filled('phone'))
            $user->phone = $request->phone;
        if ($request->filled('licence_photo'))
            $user->licence_photo = $request->licence_photo;
        if ($request->filled('password'))
            $user->password = Hash::make($request->password);
        if ($request->filled('profile_photo'))
            $user->profile_photo = $request->profile_photo;

        $user->save();

        return response()->json(['user' => $user->load('vehicles')]);
    }

    // Delete User
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        return response()->json(['message' => 'User deleted successfully.']);
    }

    // Logout
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully.']);
    }

    // Get User Details by token
    public function getUser(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        return response()->json([
            'user' => $user->load('vehicles'),
        ]);
    }

}
