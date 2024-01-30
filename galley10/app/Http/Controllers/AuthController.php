<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($credentials)) {
            $status = auth()->user()->status;
                return response()->json([
                    'status' => $status
                ],200);
        }

        return response()->json([
            'result' => 'gagal'
        ],404);
    }

    public function logout(Request $request) {
        auth()->logout();
        return response()->json([
            'status' => '0',
            'message' => 'telah logout'
        ],200);
    }
}
