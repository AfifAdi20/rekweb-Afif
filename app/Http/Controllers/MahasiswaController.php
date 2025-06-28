<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Resources\MahasiswaResources;

class MahasiswaController extends Controller
{
    // 
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return MahasiswaResources::collection($mahasiswa);
    }
    public function show($nim)
    {
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }
        return new MahasiswaResources($mahasiswa);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:20|unique:mahasiswa',
            'nama' => 'required|string|max:255',
            'jk' => 'required|string|max:10',
            'tgl_lahir' => 'required|date',
            'jurusan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());
        return new MahasiswaResources($mahasiswa);
    }
    public function update(Request $request, $nim)
    {
        
        $mahasiswa = Mahasiswa::findOrFail($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }
        $mahasiswa->update($request->all());
        return new MahasiswaResources($mahasiswa);
    }
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }
        $mahasiswa->delete();
        return response()->json(['message' => 'Mahasiswa berhasil dihapus'], 200);
    }
}
