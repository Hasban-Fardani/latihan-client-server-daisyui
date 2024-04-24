<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        $data = $validator->validated();
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return back()->with('errors', 'User not found');
        }

        $login = auth()->attempt($data);
        if (!$login) {
            return back()->with('errors', 'invalid password');
        }

        return back()->with('success', 'Login success');
    }

    public function register(Request $request)
    {
        // TODO: create user
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->errors());
        }

        $data = $validator->validated();
    }

    public function logout() 
    {
        auth()->logout();
        return back()->with('success', 'Logout success');
    }
}
