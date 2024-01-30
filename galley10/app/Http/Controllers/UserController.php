<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json([
            'results' => $users,
        ],200);
    }

    public function show($id)
    {
        $users =User::find($id);
        if(!$users){
            return response()->json([
                'message' => 'user not found'    
            ], 404);
        }

        return response()->json([
                'users' => $users    
            ], 200);
    }

    public function store(Request $request){
        // $validasi = $request->validate([
        //     'username' => 'required|string|max:255',
        //     'password' => 'required|string|min:6',
        //     'email' => 'required|email|unique:users|max:255',
        //     'nama_lengkap' => 'required|string|max:255',
        //     'alamat' => 'required|string|max:255',
        // ]);
    
        $user = User::create([
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
    
        if($user){
            return response()->json([
                'message' => 'User created'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Failed to create user'
            ], 500);
        }
    }

    public function update(Request $request, $id){
        // $this->validate($request, [
        //     'user' => 'required|string|max:255',
        //     'password' => 'required|string|min:6',
        //     'email' => 'required|email|unique:users|max:255',
        //     'nama_lengkap' => 'required|string|max:255',
        //     'alamat' => 'required|string|max:255',
        // ]);
    
        $user = User::find($id);
        $user->update([
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'status' => $request->status
        ]);
    
        if($user){
            return response()->json([
                'message' => 'User Updated'
            ], 200);
        }else{
            return response()->json([
                'message' => 'Failed to update user'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'message' => 'deleted',
        ]);
    }
    
}
