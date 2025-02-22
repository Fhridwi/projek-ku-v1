<?php

namespace App\Http\Controllers\Admin\Akun;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Menampilkan daftar akun.
     */
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        $walis = User::where('role', 'wali_santri')->get();

        return view('admin.akun.index', compact('admins', 'walis'));
    }

    /**
     * Menampilkan form tambah akun.
     */
    public function create()
    {
        return view('admin.akun.create');
    }

    /**
     * Menyimpan akun baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,wali_santri',
            'password' => 'required|min:6',
            'passwordConfirm' => 'required|same:password',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar, gunakan email lain.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'passwordConfirm.required' => 'Konfirmasi password wajib diisi.',
            'passwordConfirm.same' => 'Konfirmasi password harus sama dengan password.',
        ]);

        // Simpan user ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit akun.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.akun.edit', compact('user'));
    }

    /**
     * Memperbarui aun di database.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Valdasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,wali_santri',
            'password' => 'nullable|min:6',
            'passwordConfirm' => 'nullable|same:password',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan oleh akun lain.',
            'role.required' => 'Role wajib dipilih.',
            'role.in' => 'Role yang dipilih tidak valid.',
            'password.min' => 'Password minimal 6 karakter.',
            'passwordConfirm.same' => 'Konfirmasi password harus sama dengan password.',
        ]);

        // Update data user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui!');
    }

    /**
     * Menghapus akun dari database.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('akun.index')->with('success', 'Akun berhasil dihapus!');
    }
}
