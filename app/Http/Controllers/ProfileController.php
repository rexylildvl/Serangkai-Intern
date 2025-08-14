<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
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
public function updatePassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'current_password' => ['required', 'current_password'],
        'password' => ['required', 'confirmed', Password::defaults()],
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    $request->user()->update([
        'password' => Hash::make($request->password),
    ]);

    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return response()->json([
        'success' => true,
        'message' => 'Password berhasil diupdate. Silakan login kembali.',
        'redirect' => route('login')
    ]);
}


public function update(Request $request)
{
    $user = $request->user();
    
    $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
            if (!Hash::check($value, $user->password)) {
                $fail('Password yang dimasukkan salah.');
            }
        }],
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $emailChanged = $request->email !== $user->email;
    
    $user->name = $request->name;
    $user->email = $request->email;
    
    if ($emailChanged) {
        $user->email_verified_at = null;
        $user->save();
        $user->sendEmailVerificationNotification();
    } else {
        $user->save();
    }

    return response()->json([
        'message' => 'Profil berhasil diperbarui',
        'redirect' => $emailChanged ? route('verification.notice') : route('profile.edit')
    ]);
}

public function validatePassword(Request $request)
{
    $valid = Hash::check($request->current_password, $request->user()->password);
    
    return response()->json(['valid' => $valid]);
}

}
