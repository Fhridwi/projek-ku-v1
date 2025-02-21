<?php

namespace App\Http\Controllers\Admin\TahunAjaran;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Menampilkan daftar Tahun Ajaran
     */
    public function index()
    {
        $tahunAjaran = TahunAjaran::orderBy('nama_tahun', 'desc')->get();
        return view('admin.tahunAjaran.index', compact('tahunAjaran'));
    }

    /**
     * Menampilkan form tambah Tahun Ajaran
     */
    public function create()
    {
        return view('admin.tahunAjaran.create');
    }

    /**
     * Menyimpan Tahun Ajaran baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tahun' => 'required|unique:tahun_ajaran,nama_tahun',
            'status' => 'required|in:aktif,nonaktif',
            'kouta' => 'required|integer|min:1'
        ]);

        TahunAjaran::create([
            'nama_tahun' => $request->nama_tahun,
            'status' => $request->status,
            'kouta' => $request->kouta
        ]);

        return redirect()->route('admin.tahunAjaran')->with('success', 'Tahun Ajaran berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit Tahun Ajaran
     */
    public function edit(TahunAjaran $tahunAjaran)
    {
        return view('admin.tahunAjaran.edit', compact('tahunAjaran'));
    }

    /**
     * Memperbarui Tahun Ajaran di database
     */
    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        $request->validate([
            'nama_tahun' => 'required|unique:tahun_ajaran,nama_tahun,' . $tahunAjaran->id,
            'status' => 'required|in:aktif,nonaktif',
            'kouta' => 'required|integer|min:1'
        ]);

        $tahunAjaran->update([
            'nama_tahun' => $request->nama_tahun,
            'status' => $request->status,
            'kouta' => $request->kouta
        ]);

        return redirect()->route('admin.tahunAjaran')->with('success', 'Tahun Ajaran berhasil diperbarui!');
    }

    /**
     * Menghapus Tahun Ajaran
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        $tahunAjaran->delete();
        return redirect()->route('tahunajaran.index')->with('success', 'Tahun Ajaran berhasil dihapus!');
    }
}
