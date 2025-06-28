<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
            return [
            'nim' => $this->nim,
            'nama' => $this->nama,
            'jk' => $this->jk,
            'tgl_lahir' => $this->tgl_lahir,
            'jurusan' => $this->jurusan,
            'alamat' => $this->alamat,
        ];

    }
    public function with($request)
    {
        return [
            'status' => true,
            'message' => 'Data mahasiswa berhasil diambil',
        ];
    }
}
