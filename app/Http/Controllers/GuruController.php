<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // CREATE: /guru/create
    public function create(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|unique:gurus|numeric',
            'nama_guru' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
        ]);

        $guru = Guru::create($validated);

        return response()->json([
            'message' => 'Data guru berhasil ditambahkan',
            'data' => $guru
        ], 201);
    }

    // READ: /guru/read
    public function read()
    {
        $guru = Guru::all();
        return response()->json($guru);
    }

    // UPDATE: /guru/update/{id}
    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Data guru tidak ditemukan'], 404);
        }

        // Validasi, NIP dicek unique kecuali punya diri sendiri
        $validated = $request->validate([
            'nip' => 'numeric|unique:gurus,nip,' . $id,
            'nama_guru' => 'string|max:255',
            'mapel' => 'string|max:255',
        ]);

        $guru->update($request->all());

        return response()->json([
            'message' => 'Data guru berhasil diupdate',
            'data' => $guru
        ]);
    }

    // DELETE: /guru/delete/{id}
    public function delete($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Data guru tidak ditemukan'], 404);
        }

        $guru->delete();

        return response()->json(['message' => 'Data guru berhasil dihapus']);
    }
}