<?php

namespace App\Http\Controllers;

use App\Mail\welcomEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate(['name' => 'required|min:5|max:20', 'email' => 'required|email|unique:users,email', 'password' => 'required|confirmed|min:5']);

        $user= User::create(['name' => $validated['name'], 'email' => $validated['email'], 'password' => Hash::make($validated['password'])]);


        Mail::to($user->email)->send(new welcomEmail($user));

        return redirect()
            ->route('dashboard')
            ->with('success', 'account created !');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function LoginAuth()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {
            request()
                ->session()
                ->regenerate();


            return redirect()
                ->route('dashboard')
                ->with('success', 'loged in');
        }

        return redirect()
            ->route('login')
            ->withErrors(['email' => 'unvalid email', 'password' => 'invalid password']);
    }

    public function logout()
    {
        auth()->logout();
        request()
            ->session()
            ->invalidate();
        request()
            ->session()
            ->regenerateToken();
        return redirect()
            ->route('dashboard')
            ->with('success', 'loged out !');
    }
}
