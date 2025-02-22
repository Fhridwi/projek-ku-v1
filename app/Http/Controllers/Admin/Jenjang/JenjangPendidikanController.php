<?php

namespace App\Http\Controllers\Admin\Jenjang;

use App\Http\Controllers\Controller;
use App\Models\JenjangPendidikan;
use Illuminate\Http\Request;

class JenjangPendidikanController extends Controller
{
    public function index()
    {
        $jenjang = JenjangPendidikan::all();
        return view('admin.jenjang.index', compact('jenjang'));
    }

    public function create()
    {
        return view('admin.jenjang.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nama_jenjang' => 'required|unique:jenjang_pendidikan']);

        JenjangPendidikan::create($request->all());

        return redirect()->route('jenjang.index')->with('success', 'Jenjang berhasil ditambahkan!');
    }

    public function edit(JenjangPendidikan $jenjang)
    {
        
        return view('admin.jenjang.edit', compact('jenjang'));
    }

    public function update(Request $request, JenjangPendidikan $jenjang)
    {
        $request->validate(['nama_jenjang' => 'required|unique:jenjang_pendidikan,nama_jenjang,'.$jenjang->id]);

        $jenjang->update($request->all());

        return redirect()->route('jenjang.index')->with('success', 'Jenjang berhasil diperbarui!');
    }

    public function destroy(JenjangPendidikan $jenjang)
    {
        $jenjang->delete();
        return redirect()->route('jenjang.index')->with('success', 'Jenjang berhasil dihapus!');
    }
}

