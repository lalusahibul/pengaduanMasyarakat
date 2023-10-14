@extends('admin.partials.main')
@section('content_admin')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Daftar Petugas</h6>
            <div class="table-responsive">
                <a href="/admin_petugas/create" type="button" class="btn btn-success m-2">Tambah Petugas</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Level</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($petugas as $row)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $row->nama_petugas }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->telp }}</td>
                                <td>{{ $row->level }}</td>
                                <td>
                                    <form action="/admin_petugas/{{ $row->id_petugas }}" method="post">
                                        <a href="/admin_petugas/{{ $row->id_petugas }}/edit"
                                            class="btn btn-warning m-2">Edit</a>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" class="btn btn-danger m-2"
                                            onclick="return confirm('{{ $row->nama_petugas }} Akan dihapus?');">Delete</button>
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
