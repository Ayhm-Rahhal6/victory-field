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
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
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

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    public function update(Request $request)
        {
            $user = User::find(Auth::id());
            
            $request->validate([
                'name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'new_password' => 'nullable|string|min:8|confirmed',
            ]);
            
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            
            if ($request->new_password) {
                $user->password = Hash::make($request->new_password);
            }
            
            if ($user) {
                $user->save();
            } else {
                return redirect()->route('profile.show')->with('error', 'User not found.');
            }
            
            return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
        }
    /**
     * Delete the user's account.
     */
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
