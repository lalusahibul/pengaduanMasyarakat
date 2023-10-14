@extends('admin.partials.main')
@section('content_admin')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Daftar Masyarakat</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Telpon</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($masyarakat as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->nik }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->username }}</td>
                                <td>{{ $row->telp }}</td>
                                <td>
                                    <form action="/admin_masyarakat/{{ $row->nik }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="/admin_masyarakat/{{ $row->nik }}/edit" class="btn btn-warning m-2"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="submit"
                                            onclick="return confirm('masyarakat dengan nama {{ $row->nama }} akan dihapus?'); "
                                            class="btn btn-danger m-2"><i class="fa fa-trash"></i></button>
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
