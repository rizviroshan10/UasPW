<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $result['token'] = $user->createToken('Be Go Gym')->plainTextToken;
            $result['name'] = $user->name;

            return $this->sendSuccess($result, 'Login berhasil');
        } else {
            return $this->sendError('Login gagal');
        }
    }

    public function register(Request $request)
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
        if($validasi) {
            $validasi['admin'] = 0;
            $validasi['password'] = Hash::make($request->password);
            $user = User::create($validasi);
            $result['token'] = $user->createToken('Be Go Gym')->plainTextToken;
            $result['name'] = $user->name;
            return $this->sendSuccess($result, 'Registrasi berhasil' ,201);
        }
        else {
            return $this->sendError('Registrasi gagal');
        }
    }
    
    public function logout(){
        Auth::user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Sukses berhasil logout',
        ],);
    }
}
