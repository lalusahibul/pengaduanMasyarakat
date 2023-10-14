<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Console\ViewCacheCommand;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Petugas::latest()->get();
        return view('admin.petugas.petugas', ['petugas' => $petugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.petugas.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
            'telp' => 'required',
        ]);
        if ($request->password) {
            $data['password'] = Hash::make($data['password']);
        }
        Petugas::create($data);

        return redirect('admin_petugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($petugas)
    {
        $pet = Petugas::where('id_petugas', $petugas)->first();
        return view('admin.petugas.edit', ['petugas' => $pet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $petugas)
    {
        //
        $pet = Petugas::where('id_petugas', $petugas)->first();
        $data = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            // 'password' => 'required',
            'telp' => 'required',
        ]);
        // if ($request->password) {
        //     $data['password'] = Hash::make($data['password']);
        // }
        Petugas::where('id_petugas', $pet->id_petugas)->update($data);

        return redirect('admin_petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($petugas)
    {
        Petugas::where('id_petugas', $petugas)->delete();
        return redirect('admin_petugas');
    }
}
