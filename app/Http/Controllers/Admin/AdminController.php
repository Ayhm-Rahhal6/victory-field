<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('super_admin')->except(['index', 'edit', 'update']);
    }

    public function index()
    {
        $admins = User::whereIn('role', ['super_admin', 'admin'])
                     ->orderBy('role')
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);
        
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    // echo "You are not allowed to create a new admin from here, please contact the super admin.";
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.admins.index')
                        ->with('success', 'Admin created successfully');
    }

    public function edit(User $admin)
    {
        // يمكن للمشرف العادي تعديل بياناته فقط
        if(Auth::user()->role === 'admin' && Auth::id() !== $admin->id) {
            abort(403);
        }

        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        // يمكن للمشرف العادي تعديل بياناته فقط
        if(Auth::user()->role === 'admin' && Auth::id() !== $admin->id) {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$admin->id,
            'phone_number' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ];

        if($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $admin->update($data);

        return redirect()->route('admin.admins.index')
                        ->with('success', 'Admin updated successfully');
    }

    public function destroy(User $admin)
    {
        $admin->delete();
        
        return redirect()->route('admin.admins.index')
                        ->with('success', 'Admin deleted successfully');
    }


}