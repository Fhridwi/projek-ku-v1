<?php

namespace App\Http\Controllers\Admin\Status;


use App\Http\Controllers\Controller;
use App\Models\StatusPendaftaran;
use Illuminate\Http\Request;

class StatusPendaftaranController extends Controller
{
    public function index()
    {
        $status = StatusPendaftaran::all();
        return view('admin.status.index', compact('status'));
    }

    public function create()
    {
        return view('admin.status.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:50',
        ]);

        StatusPendaftaran::create($request->all());
        return redirect()->route('status.index')->with('success', 'Status Pendaftaran berhasil ditambahkan!');
    }

    public function edit(StatusPendaftaran $status)
    {
        return view('admin.status.edit', compact('status'));
    }

    public function update(Request $request, StatusPendaftaran $status)
    {
        $request->validate([
            'status' => 'required|string|max:50',
        ]);

        $status->update($request->all());
        return redirect()->route('status.index')->with('success', 'Status Pendaftaran berhasil diupdate!');
    }

    public function destroy(StatusPendaftaran $status)
    {
        $status->delete();
        return redirect()->route('status.index')->with('success', 'Status Pendaftaran berhasil dihapus!');
    }
}
