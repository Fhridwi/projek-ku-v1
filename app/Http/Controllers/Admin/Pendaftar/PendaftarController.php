<?php

namespace App\Http\Controllers\admin\Pendaftar;

use App\Http\Controllers\Controller;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftarController extends Controller
{
    public function index()
{
    $pendaftar = Pendaftaran::with(['User', 'tahunAjaran', 'jenjangPendidikan'])->get();

    dd($pendaftar);
    return view('admin.pendaftar.index', compact('pendaftar'));
}

    public function create()
    {
        return view('admin.pendaftar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_santri' => 'required|string|max:100',
            'ttl' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'anak_ke' => 'required|integer',
            'asal_sekolah' => 'required|string|max:150',
            'alamat' => 'required|string',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
            'jenjang_id' => 'required|exists:jenjang,id',
            'status_id' => 'required|exists:status,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Pendaftaran::create($request->all());
        return redirect()->route('pendaftar.index')->with('success', 'Data Pendaftar berhasil ditambahkan!');
    }

    public function show(Pendaftaran $pendaftar)
    {
        // Menyertakan relasi untuk orang tua, wali, dan file pendaftaran
        $pendaftar->load('orangTua', 'wali', 'filePendaftaran', 'statusPendaftaran');
    
        return view('pendaftar.show', compact('pendaftar'));
    }


    public function edit(Pendaftaran $pendaftar)
    {
        return view('admin.pendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, Pendaftaran $pendaftar)
    {
        $request->validate([
            'nama_santri' => 'required|string|max:100',
            'ttl' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'anak_ke' => 'required|integer',
            'asal_sekolah' => 'required|string|max:150',
            'alamat' => 'required|string',
            'tahun_ajaran_id' => 'required|exists:tahun_ajaran,id',
            'jenjang_id' => 'required|exists:jenjang,id',
            'status_id' => 'required|exists:status,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $pendaftar->update($request->all());
        return redirect()->route('pendaftar.index')->with('success', 'Data Pendaftar berhasil diupdate!');
    }

    public function destroy(Pendaftaran $pendaftar)
    {
        $pendaftar->delete();
        return redirect()->route('pendaftar.index')->with('success', 'Data Pendaftar berhasil dihapus!');
    }
}
