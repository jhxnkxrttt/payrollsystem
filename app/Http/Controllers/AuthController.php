<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = DB::table('users')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();

        if (!$user) {
            return back()->with('error', 'Invalid login');
        }

        session([
            'user_id' => $user->id,
            'role' => $user->role
        ]);

        if ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/employee/dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}