@extends('petugas.partials.main')
@section('content_petugas')
    <form action="/petugas_masyarakat/{{ $masyarakat->nik }}" method="POST">
        @csrf
        @method('put')
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Form Edit Masyarakat</h6>
                <div class="form-group">
                    <label for="nik"><span class="required">NIK</span></label>
                    <input type="text" class="form-control" id="nik" placeholder="nik" name="nik"
                        value="{{ $masyarakat->nik }}">
                </div>
                <div class="form-group">
                    <label for="nama"><span class="required">Nama</span></label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama"
                        value="{{ $masyarakat->nama }}">
                </div>
                <div class="form-group">
                    <label for="username"><span class="required">username</span></label>
                    <input type="text" class="form-control" id="username" placeholder="username" name="username"
                        value="{{ $masyarakat->username }}">
                </div>
                <div class="form-group">
                    <label for="telp"><span class="required">telp</span></label>
                    <input type="text" class="form-control" id="telp" placeholder="telp" name="telp"
                        value="{{ $masyarakat->telp }}">
                </div>
                <div class="col-md-6 mb-3 mt-3">
                    <div class="m-n2">
                        <a href="/petugas_masyarakat" type="button" class="btn btn-danger m-2">Kembali</a>
                        <button type="submit" class="btn btn-success m-2">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
