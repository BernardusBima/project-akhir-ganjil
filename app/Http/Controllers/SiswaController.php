<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // CREATE: /siswa/create
    public function create(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:siswas',
            'nama_siswa' => 'required',
            'kelas_id' => 'required|exists:kelas,id'
        ]);

        $siswa = Siswa::create($validated);

        return response()->json([
            'message' => 'Data siswa berhasil ditambahkan',
            'data' => $siswa
        ], 201);
    }

    // READ: /siswa/read
    public function read()
    {
        $siswas = Siswa::all();
        return response()->json($siswas);
    }

    // UPDATE: /siswa/update
    // Catatan: Gunakan _method: PUT di body form-data jika pakai method POST di Postman, 
    // atau langsung method PUT di route.
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $siswa->update($request->all());

        return response()->json([
            'message' => 'Data siswa berhasil diupdate',
            'data' => $siswa
        ]);
    }

    // DELETE: /siswa/delete
    public function delete($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $siswa->delete();

        return response()->json(['message' => 'Data siswa berhasil dihapus']);
    }
}