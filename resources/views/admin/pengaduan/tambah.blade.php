@extends('admin.partials.main')
@section('content_admin')
    <form action="/admin_pengaduan" method="POST" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Form Tambah Pengaduan</h6>
                <div class="bg-light rounded-top p-4 mt-3">
                    <div class="form-group">
                        <label for="tgl_pengaduan"><span class="required">Tanggal Pengaduan</span></label>
                        <input type="date" class="form-control" id="tgl_pengaduan" placeholder="tgl_pengaduan"
                            name="tgl_pengaduan">
                    </div>
                    <div class="form-group">
                        <label for="nik"><span class="required"> Pembuat Pengaduan</span></label>
                        <select id="nik"name="nik" class="form-control">
                            @foreach ($masyarakat as $row)
                                <option value="{{ $row->nik }}">{{ $row->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="isi_laporan"><span class="required">isi_laporan</span></label>
                        <textarea type="text" class="form-control" id="isi_laporan" placeholder="isi_laporan" name="isi_laporan">{{ old('isi_laporan') }}</textarea>
                        @error('isi_laporan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto"><span class="required">Foto</span></label>
                        <input type="file" class="form-control" id="foto" placeholder="foto" name="foto">
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <div class="m-n2">
                            <a href="/admin_pengaduan" type="button" class="btn btn-danger m-2">Kembali</a>
                            <button type="submit" class="btn btn-success m-2">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
