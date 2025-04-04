<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::where('role', 'user')
                    ->paginate(10);
        
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('admin.users.index')
                        ->with('success', 'User deleted successfully');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function reservations(User $user)
    {
        $reservations = $user->reservations()
                            ->with(['field' => function($query) {
                                $query->select('id', 'name', 'sport_type');
                            }])
                            ->select(
                                'id', 
                                'field_id', 
                                'start_time', 
                                'end_time', 
                                'total_hours', 
                                'total_price', 
                                'status'
                            )
                            ->get();
        
        return response()->json($reservations);
    }
}