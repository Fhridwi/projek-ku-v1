<?php

namespace App\Http\Controllers\Admin\Akun;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $admins = User::where('role', 'admin')->get();
        $walis = User::where('role', 'wali_santri')->get();

        return view('admin.akun.index', compact('admins', 'walis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'role'=> 'required',
            'password'=> 'required',
            'passwordConfrim'=> 'required|same:password',
            
        ]);

        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
        ]);


        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
