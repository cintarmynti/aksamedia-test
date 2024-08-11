<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Tugas 1
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid input',
                'data' => null
            ], 422);
        }

        $admin = Admins::where('name', $request->name)->first();

        if(!$admin || !Hash::check($request->password, $admin->password)){
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
                'data' => null
            ], 401);
        }

        $token = $admin->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'data' => [
                'token' => $token,
                'admin' => [
                    'id' => $admin->id,
                    'name' => $admin->name,
                    'username' => $admin->username,
                    'phone' => $admin->phone,
                    'email' => $admin->email,
                ],
            ]
        ], 200);
    }
}
