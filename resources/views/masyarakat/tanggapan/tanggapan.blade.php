@extends('masyarakat.partials.main')
@section('content_masyarakat')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Daftar Tanggapan</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Isi Pengaduan</th>
                            <th scope="col">Tanggal Tanggapan</th>
                            <th scope="col">Isi Tanggapan</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tanggapan as $index => $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $pengaduan->firstWhere('id_pengaduan', $row->id_pengaduan)->isi_laporan }}

                                </td>
                                <td>{{ $row->tgl_tanggapan }}</td>
                                <td>{{ $row->tanggapan }}</td>
                                <td>
                                    {{ $petugas->firstWhere('id_petugas', $row->id_petugas)->nama_petugas }}

                                </td>

                                <td>
                                    <a href="/masyarakat_tanggapan/{{ $row->id_tanggapan }}"
                                        class="btn btn-info m-2">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
