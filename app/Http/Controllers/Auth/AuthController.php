<?php 

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}