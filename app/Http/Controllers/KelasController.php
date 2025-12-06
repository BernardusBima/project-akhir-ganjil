<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // CREATE: /kelas/create
    public function create(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);

        // Simpan data
        $kelas = Kelas::create($validated);

        return response()->json([
            'message' => 'Data kelas berhasil ditambahkan',
            'data' => $kelas
        ], 201);
    }

    // READ: /kelas/read
    public function read()
    {
        $kelas = Kelas::all();
        return response()->json($kelas);
    }

    // UPDATE: /kelas/update/{id}
    public function update(Request $request, $id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json(['message' => 'Data kelas tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);

        $kelas->update($validated);

        return response()->json([
            'message' => 'Data kelas berhasil diupdate',
            'data' => $kelas
        ]);
    }

    // DELETE: /kelas/delete/{id}
    public function delete($id)
    {
        $kelas = Kelas::find($id);

        if (!$kelas) {
            return response()->json(['message' => 'Data kelas tidak ditemukan'], 404);
        }

        $kelas->delete();

        return response()->json(['message' => 'Data kelas berhasil dihapus']);
    }
}