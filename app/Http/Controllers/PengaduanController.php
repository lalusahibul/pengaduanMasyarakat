<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengaduan = Pengaduan::latest()->get();
        return view('admin.pengaduan.pengaduan', ['pengaduan' => $pengaduan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masyarakat = Masyarakat::latest()->get();
        return view('admin.pengaduan.tambah', ['masyarakat' => $masyarakat]);
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
            'tgl_pengaduan' => 'required',
            'nik' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'image|file',
        ]);

        if ($request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $imageName = date('Ymd_His') . '.' . $extension;
            $request->file('foto')->move('foto/', $imageName);
            $data['foto'] = $imageName;
        }


        Pengaduan::create($data);

        return redirect('admin_pengaduan');
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
    public function edit($pengaduan)
    {
        $peng = Pengaduan::where('id_pengaduan', $pengaduan)->first();
        $masyarakat = Masyarakat::latest()->get();
        return view('admin.pengaduan.edit', ['pengaduan' => $peng, 'masyarakat' => $masyarakat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pengaduan)
    {
        //

        // dd($request);
        $peng = Pengaduan::where('id_pengaduan', $pengaduan)->first();
        $request->validate([
            'tgl_pengaduan' => 'required',
            'nik' => 'required',
            'isi_laporan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only([
            'tgl_pengaduan',
            'nik',
            'isi_laporan',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if ($peng->foto) {
                File::delete(public_path('foto') . '/' . $peng->foto);
            }

            // Simpan gambar baru
            $extension = $request->file('foto')->getClientOriginalExtension();
            $imageName = date('Ymd_His') . '.' . $extension;
            $request->file('foto')->move('foto/', $imageName);
            $data['foto'] = $imageName;
        }

        Pengaduan::where('id_pengaduan', $peng->id_pengaduan)->update($data);
        return redirect('admin_pengaduan');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($pengaduan)
    {
        //
        $peng = Pengaduan::where('id_pengaduan', $pengaduan)->first();
        Pengaduan::where('id_pengaduan', $pengaduan)->delete();
        File::delete(public_path('foto') . '/' . $peng->foto);
        return redirect('admin_pengaduan');
    }

    public function pengaduan_konfirmasi($pengaduan, $aksi)
    {
        $peng = Pengaduan::where('id_pengaduan', $pengaduan)->first();
        $data['status'] = $aksi;
        Pengaduan::where('id_pengaduan', $peng->id_pengaduan)->update($data);
        return redirect('admin_pengaduan');
    }
}
