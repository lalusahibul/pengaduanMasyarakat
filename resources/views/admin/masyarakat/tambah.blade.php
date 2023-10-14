@extends('admin.partials.main')
@section('content_admin')
    <form action="/admin_masyarakat" method="POST">
        @csrf
        @method('post')
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Form Tambah Petugas</h6>
                <div class="bg-light rounded-top p-4 mt-3">
                    <div class="form-group">
                        <label for="nik"><span class="required">NIK</span></label>
                        <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik"
                            value="{{ old('nik') }}">
                        @error('nik')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama"><span class="required">Nama Masyarakat</span></label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama"
                            value="{{ old('nama') }}">
                        @error('nama')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username"><span class="required">Username</span></label>
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username"
                            value="{{ old('username') }}">
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password"><span class="required">Pasword</span></label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="telp"><span class="required">Nomor Telepon</span></label>
                        <input type="text" class="form-control" id="telp" placeholder="Nomor Telepon" name="telp"
                            value="{{ old('telp') }}">
                        @error('telp')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <div class="m-n2">
                            <a href="/admin_masyarakat" type="button" class="btn btn-danger m-2">Kembali</a>
                            <button type="submit" class="btn btn-success m-2">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
