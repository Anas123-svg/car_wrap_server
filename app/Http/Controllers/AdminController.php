<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $query = Admin::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }


        $admins = $query->paginate(5)->appends($request->query());

        return view('pages.admin', compact('admins'));
    }

    public function add(Request $request)
    {

        return view('pages.add_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:20',
            'role' => 'nullable|string|max:100',
            'profile_photo' => 'nullable|string',
        ]);

        $adminData = $request->only(['name', 'email', 'phone', 'role', 'profile_photo']);
        $adminData['password'] = Hash::make($request->password);

        Admin::create($adminData);

        return redirect()->route('admins.index')->with('success', 'Admin added successfully.');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            return response()->json(['success' => false, 'message' => 'Admin not found'], 404);
        }

        $admin->delete();

        return response()->json(['success' => true, 'message' => 'Admin deleted successfully']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        // Store token/session
        Session::put('admin_token', bin2hex(random_bytes(40))); // or use Laravel's built-in session ID
        Session::put('admin_id', $admin->id);

        return redirect()->route('index');
    }


public function settings(Request $request)
{
    $adminId = Session::get('admin_id');

    if (!$adminId) {
        return redirect()->route('login')->withErrors(['message' => 'Please log in first.']);
    }
    $admin = Admin::find($adminId);
    if (!$admin) {
        Session::forget(['admin_id', 'admin_token']); // Clear session
        return redirect()->route('login')->withErrors(['message' => 'Session expired or invalid.']);
    }

    return view('pages.admin_setting', compact('admin'));
}


public function update(Request $request, $id)
{
    $admin = Admin::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email,' . $admin->id,
        'phone' => 'nullable|string|max:20',
        'role' => 'nullable|string|max:100',
        'profile_photo' => 'nullable|string',
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->phone = $request->phone;
    $admin->role = $request->role;
    $admin->profile_photo = $request->profile_photo;

    if ($request->filled('password')) {
        $admin->password = Hash::make($request->password);
    }

    $admin->save();

    return redirect()->route('admins.index')->with('success', 'Admin updated successfully.');
}
public function logout(Request $request)
{
    Session::forget(['admin_token', 'admin_id']);

    $request->session()->flush();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'Logged out successfully.');
}


}
