@extends('petugas.partials.main')
@section('content_petugas')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Daftar Pengaduan</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pembuat</th>
                            <th scope="col">Nik</th>
                            <th scope="col">Tanggal Pengaduan</th>
                            <th scope="col">Isi</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->masyarakat->nama ?? 'tidaka ' }}</td>
                                <td>{{ $row->masyarakat->nik ?? 'tidak ada' }}</td>
                                <td>{{ $row->tgl_pengaduan }}</td>
                                <td>{{ $row->isi_laporan }}</td>
                                <td><img src="{{ asset('foto/' . $row->foto) }}" width="60" alt="Foto">
                                </td>
                                <th>
                                    @if ($row->status == '0')
                                        <span class="text-danger">Belum dikonfirmasi</span>
                                    @elseif ($row->status == 'proses')
                                        <span class="text-warning">Proses</span>
                                    @else
                                        <span class="text-success">Selesai</span>
                                    @endif
                                </th>
                                <td>
                                    @if ($row->status == '0')
                                        <a class="btn btn-warning m-2"
                                            href="/petugaspengaduan_konfirmasi/{{ $row->id_pengaduan }}/proses">Proses
                                        </a>
                                    @elseif($row->status == 'proses')
                                        <a class="btn btn-success m-2"
                                            href="/petugaspengaduan_konfirmasi/{{ $row->id_pengaduan }}/selesai">Selesai
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
