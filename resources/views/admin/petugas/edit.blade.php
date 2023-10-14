@extends('admin.partials.main')
@section('content_admin')
    <form action="/admin_petugas/{{ $petugas->id_petugas }}" method="POST">
        @csrf
        @method('put')
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Form Edit Petugas</h6>
                <div class="form-group">
                    <label for="nama_petugas"><span class="required">Nama Petugas</span></label>
                    <input type="text" class="form-control" id="nama_petugas" placeholder="Nama Petugas"
                        name="nama_petugas" value="{{ $petugas->nama_petugas }}">
                </div>
                <div class="form-group">
                    <label for="username"><span class="required">Username</span></label>
                    <input type="text" class="form-control" id="username" placeholder="Username Petugas" name="username"
                        value="{{ $petugas->username }}">
                </div>
                <div class="form-group">
                    <label for="telp"><span class="required">Nomor Telepon</span></label>
                    <input type="text" class="form-control" id="telp" placeholder="No Telp Petugas" name="telp"
                        value="{{ $petugas->telp }}">
                </div>
                <div class="form-group">
                    <label for="level"><span class="required"> Level Petugas</span></label>
                    <select id="level"name="level" class="form-control">
                        @if ($petugas->level == 'admin')
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        @else
                            <option value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-6 mb-3 mt-3">
                    <div class="m-n2">
                        <a href="/admin_petugas" type="button" class="btn btn-danger m-2">Kembali</a>
                        <button type="submit" class="btn btn-success m-2">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
