<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function tokenGenerate(Request $request)
    {
        try {
            $credentials = $request->header('Authorization');

            list($type, $data) = explode(' ', $credentials);
            list($email, $password) = explode(':', base64_decode($data));
            $credentials = [ "email" => $email, "password" => $password];
            if (!Auth::attempt($credentials)) {
                return response()->json([
                    'status_code' => 500,
                    'message' => 'Unauthorized'
                ]);
            }

            $user = User::where('email', $email)->first();

            if (!Hash::check($password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status_code' => 200,
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
            ]);
        } catch (\Exception $error) {
            return response()->json($error);
        }
    }
}