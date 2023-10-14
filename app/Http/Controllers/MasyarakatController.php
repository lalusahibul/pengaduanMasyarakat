<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $masyarakat = Masyarakat::latest()->get();
        return view('admin.masyarakat.masyarakat', ['masyarakat' => $masyarakat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('register');
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
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);
        if ($request->password) {
            $data['password'] = Hash::make($data['password']);
        }
        Masyarakat::create($data);

        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit($masyarakat)
    {
        $mas = Masyarakat::where('nik', $masyarakat)->first();
        return view('admin.masyarakat.edit', ['masyarakat' => $mas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $masyarakat)
    {
        //
        $mas = Masyarakat::where('nik', $masyarakat)->first();
        $data = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'telp' => 'required',
        ]);

        Masyarakat::where('nik', $mas->nik)->update($data);

        return redirect('admin_masyarakat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy($masyarakat)
    {
        //
        Masyarakat::where('nik', $masyarakat)->delete();
        return redirect('admin_masyarakat');
    }
}
