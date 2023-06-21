<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'name' => ['required', 'string'],
            'tinggi_badan' => ['required', 'string'],
            'berat_badan' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'no_hp' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:' . User::class],
            'password' => ['required'],
        ]);
        $validasi['admin'] = 0;
        $validasi['password'] = Hash::make($request->password);
        $user = User::create($validasi);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
