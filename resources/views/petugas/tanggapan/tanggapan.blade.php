@extends('petugas.partials.main')
@section('content_petugas')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Daftar Pengaduan</h6>
            <div class="table-responsive">
                <a href="/petugas_tanggapan/create" class="btn btn-success m-2">Tambah Tanggapan</a>
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
                                    <form action="/petugas_tanggapan/{{ $row->id_tanggapan }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="/petugas_tanggapan/{{ $row->id_tanggapan }}/edit"
                                            class="btn btn-warning m-2">Edit</a>
                                        <button type="submit" class="btn btn-danger" class="btn btn-danger m-2"
                                            onclick="return confirm('Proses Pengaduan?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
