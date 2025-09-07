<?php 

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Admin\AdminResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return ApiResponse::success([
                'token' => Auth::user()->createToken('auth_token')->plainTextToken,
                'user' => new AdminResource(Auth::guard('sanctum')->user()),
            ] , 'Logged in successfully' , 200);
        } else {
            return ApiResponse::error( 'Credentials do not match' , 401);
        }
    }

    public function logout(){
        request()->user()->currentAccessToken()->delete();
        return ApiResponse::success([] , 'Logged out successfully' , 200);;
    }
}