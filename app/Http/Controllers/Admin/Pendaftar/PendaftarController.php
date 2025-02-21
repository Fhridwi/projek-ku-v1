<?php

namespace App\Http\Controllers\admin\Pendaftar;

use App\Http\Controllers\Controller;
use App\Models\FilePendaftaran;
use App\Models\JenjangPendidikan;
use App\Models\OrangTua;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\StatusPendaftaran;
use App\Models\TahunAjaran;
use App\Models\User;
use App\Models\Wali;
use Illuminate\Support\Facades\DB;

class PendaftarController extends Controller
{
    public function index()
{
    $pendaftar = Pendaftaran::with(['StatusPendaftaran', 'JenjangPendidikan'])->get();

    return view('admin.pendaftar.index', compact('pendaftar'));
}

public function create()
{
    $users = User::where('role', 'wali_santri')->get();
    $jenjangs = JenjangPendidikan::all();
    $tahunAjarans = TahunAjaran::all();
    $status = StatusPendaftaran::all();
    

    return view('admin.pendaftar.create', compact('users', 'jenjangs', 'tahunAjarans', 'status'));
}

    public function store(Request $request)
{

    

    $request->validate([
        'user_id' => 'required',
        'nama_santri' => 'required',
        'ttl' => 'required',
        'jenis_kelamin' => 'required',
        'anak_ke' => 'required|integer',
        'asal_sekolah' => 'nullable|string',
        'alamat' => 'required|string',
        'jenjang' => 'required',
        'Tahun_ajaran' => 'required',
        'status' => 'required',
        'nama_ayah' => 'required',
        'pekerjaan_ayah' => 'required',
        'status_ayah' => 'required',
        'nama_ibu' => 'required',
        'pekerjaan_ibu' => 'required',
        'status_ibu' => 'required',
        'no_hp' => 'required',
        'email_ortu' => 'required|email',
        'nama_wali' => 'nullable|string',
        'pekerjaan_wali' => 'nullable|string',
        'penghasilan_wali' => 'nullable|string',
        'no_hp_wali' => 'nullable|string',
        'email_wali' => 'nullable|email',
        'pas_foto' => 'required|file|mimes:jpg,jpeg,png',
        'akte_kelahiran' => 'required|file|mimes:pdf,jpg,png',
        'scan_kk' => 'required|file|mimes:pdf,jpg,png',
        'ktp_ayah' => 'nullable|file|mimes:pdf,jpg,png',
        'ktp_ibu' => 'nullable|file|mimes:pdf,jpg,png',
    ]);

    $existingPendaftar = Pendaftaran::where('user_id', $request->user_id)->first();

    if ($existingPendaftar) {
        return redirect()->back()->withErrors(['user_id' => 'Akun ini sudah memiliki data pendaftar.']);
    }

    // Simpan data santri
    $santri = Pendaftaran::create([
        'user_id' => $request->user_id,
        'nama_santri' => $request->nama_santri,
        'ttl' => $request->ttl,
        'jenis_kelamin' => $request->jenis_kelamin,
        'anak_ke' => $request->anak_ke,
        'asal_sekolah' => $request->asal_sekolah,
        'alamat' => $request->alamat,
        'jenjang_id' => $request->jenjang,
        'tahun_ajaran_id' => $request->Tahun_ajaran,
        'status_id' => $request->status,
    ]);

    // Simpan data orang tua
    $orangTua = OrangTua::create([
        'pendaftaran_id' => $santri->id,
        'nama_ayah' => $request->nama_ayah,
        'pekerjaan_ayah' => $request->pekerjaan_ayah,
        'status_ayah' => $request->status_ayah,
        'nama_ibu' => $request->nama_ibu,
        'pekerjaan_ibu' => $request->pekerjaan_ibu,
        'status_ibu' => $request->status_ibu,
        'no_hp' => $request->no_hp,
        'email_ortu' => $request->email_ortu,
        'alamat'=> $request->alamat_ortu,
    ]);

    // Simpan data wali (jika ada)
    if ($request->nama_wali) {
        Wali::create([
            'pendaftaran_id' => $santri->id,
            'nama_wali' => $request->nama_wali,
            'pekerjaan_wali' => $request->pekerjaan_wali,
            'penghasilan_wali' => $request->penghasilan_wali,
            'no_hp_wali' => $request->no_hp_wali,
            'email_wali' => $request->email_wali,
        ]);
    }

    // Simpan dokumen
    $dokumen = FilePendaftaran::create([
        'pendaftaran_id' => $santri->id,
        'pas_foto' => $request->file('pas_foto')->store('uploads/dokumen', 'public'),
        'akte_kelahiran' => $request->file('akte_kelahiran')->store('uploads/dokumen', 'public'),
        'scan_kk' => $request->file('scan_kk')->store('uploads/dokumen', 'public'),
        'ktp_ayah' => $request->file('ktp_ayah') ? $request->file('ktp_ayah')->store('uploads/dokumen', 'public') : null,
        'ktp_ibu' => $request->file('ktp_ibu') ? $request->file('ktp_ibu')->store('uploads/dokumen', 'public') : null,
    ]);

    return redirect()->route('pendaftar.index')->with('success', 'Pendaftar berhasil ditambahkan!');
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
