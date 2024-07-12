<?php

namespace App\Http\Controllers\v1\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\v1\Auth\AuthRequest;
use Exception;

class AuthController extends Controller
{
    public function login(AuthRequest $request) {
        $data = $request->only('email', 'password');

        $user = User::where('email', $data['email'])->first();

        if(!$user || Hash::check('password', $data['password'])){
            return response()->json([
                'message' => 'Wrong Email or Password'
            ], 401);
        }

        $user->createToken('user-token')->plainTextToken;

        return response()->json([
            'message' => 'Login Successfully'
        ], 200);
    }

    public function logout(){
        try{
            $user = Auth::user();
            $user->tokens()->delete();
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }

    }
}
