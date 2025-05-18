<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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


        $admins = $query->paginate(10)->appends($request->query());

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


}
