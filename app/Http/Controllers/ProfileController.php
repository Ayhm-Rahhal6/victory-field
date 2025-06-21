<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function index(){
        $user= User::where('id',Auth::id())->first();
        $history=Reservation::where('user_id',$user->id)->orderBy('created_at','desc')->paginate(10);
        return view('public.pages.profile' , compact('user','history'));
    }

 

   
public function update(Request $request)
{
    $user = User::find(Auth::id());

    $request->validate([
        'name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:20',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'new_password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $request->name;
    $user->phone_number = $request->phone_number;

    if ($request->hasFile('profile_picture')) {

        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $user->profile_picture = $imagePath;
    }

    if ($request->new_password) {
        $user->password = Hash::make($request->new_password);
    }

    $user->save();

    return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
}
    
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}