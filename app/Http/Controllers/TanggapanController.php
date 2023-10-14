<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tanggapan = Tanggapan::latest()->get();
        $peng = Pengaduan::latest()->get();
        $pet = Petugas::latest()->get();
        return view('admin.tanggapan.tanggapan', ['tanggapan' => $tanggapan, 'pengaduan' => $peng, 'petugas' => $pet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengaduan = Pengaduan::latest()->get();
        $petugas = Petugas::latest()->get();
        $masyarakat = Masyarakat::latest()->get();
        return view('admin.tanggapan.tambah', ['masyarakat' => $masyarakat, 'petugas' => $petugas, 'pengaduan' => $pengaduan]);
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
            'id_pengaduan' => 'required',
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
            'id_petugas' => 'required',
        ]);

        Tanggapan::create($data);

        return redirect('admin_tanggapan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit($tanggapan)
    {
        $tang = Tanggapan::where('id_tanggapan', $tanggapan)->first();
        $masyarakat = Masyarakat::latest()->get();
        $pengaduan = Pengaduan::latest()->get();
        $petugas = Petugas::latest()->get();
        return view('admin.tanggapan.edit', ['tanggapan' => $tang, 'masyarakat' => $masyarakat, 'pengaduan' => $pengaduan, 'petugas' => $petugas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tanggapan)
    {
        //
        $tang = Tanggapan::where('id_tanggapan', $tanggapan)->first();
        $data = $request->validate([
            'id_pengaduan' => 'required',
            'tgl_tanggapan' => 'required',
            'tanggapan' => 'required',
            'id_petugas' => 'required',
        ]);

        Tanggapan::where('id_tanggapan', $tang->id_tanggapan)->update($data);
        return redirect('admin_tanggapan');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($tanggapan)
    {
        Tanggapan::where('id_tanggapan', $tanggapan)->delete();
        return redirect('admin_tanggapan');
    }

    public function pengaduan_konfirmasi($pengaduan, $aksi)
    {
        $peng = Pengaduan::where('id_pengaduan', $pengaduan)->first();
        $data['status'] = $aksi;
        Pengaduan::where('id_pengaduan', $peng->id_pengaduan)->update($data);
        return redirect('admin_pengaduan');
    }
}
