<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Invalid credentials');
        }

        $passwordMatches = false;

        if ($user->password === $request->password) {
            $passwordMatches = true;
            $user->update(['password' => Hash::make($request->password)]);
        } elseif (str_starts_with($user->password, '$2y$') || str_starts_with($user->password, '$2a$') || str_starts_with($user->password, '$2b$')) {
            if (Hash::check($request->password, $user->password)) {
                $passwordMatches = true;
            }
        }

        if (!$passwordMatches) {
            return back()->with('error', 'Invalid credentials');
        }

        session([
            'user_id' => $user->id,
            'role' => $user->role,
        ]);

        return $user->role === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/employee/dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
