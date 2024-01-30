<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();

        return response()->json([
            'results' => $albums,
        ], 200);
    }

    public function show($id)
    {
        $album = Album::find($id);
        if (!$album) {
            return response()->json([
                'message' => 'Album not found'
            ], 404);
        }

        return response()->json([
            'album' => $album
        ], 200);
    }

    public function store(Request $request)
    {
        $album = Album::create([
            'NamaAlbum' => $request->NamaAlbum,
            'deskripsi' => $request->deskripsi,
            'users_id' => $request->users_id,
            // 'created_at' => now(), // Jika ingin menetapkan waktu pembuatan secara manual
        ]);

        if ($album) {
            return response()->json([
                'message' => 'Album created'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to create album'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);
        $album->update([
            'NamaAlbum' => $request->NamaAlbum,
            'deskripsi' => $request->deskripsi,
            'users_id' => $request->users_id,
            // 'created_at' => now(), // Jika ingin menetapkan waktu pembuatan secara manual
        ]);

        if ($album) {
            return response()->json([
                'message' => 'Album Updated'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Failed to update album'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();

        return response()->json([
            'message' => 'deleted',
        ]);
    }
}
