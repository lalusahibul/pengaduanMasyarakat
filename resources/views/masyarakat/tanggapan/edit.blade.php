@extends('masyarakat.partials.main')
@section('content_masyarakat')
    <form action="/masyarakat_tanggapan/{{ $tanggapan->id_tanggapan }}" method="POST">
        @csrf
        @method('put')
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Form Edit Komentar</h6>
                <div class="bg-light rounded-top p-4 mt-3">
                    <div class="form-group">
                        <label for="id_pengaduan"><span class="required"> Pembuat Pengaduan</span></label>
                        <select id="id_pengaduan"name="id_pengaduan" class="form-control">
                            @foreach ($pengaduan as $row)
                                <option value="{{ $row->id_pengaduan }}">{{ $row->masyarakat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl_tanggapan"><span class="required">Tanggal Tanggapan</span></label>
                        <input type="date" class="form-control" id="tgl_tanggapan" placeholder="tgl_tanggapan"
                            name="tgl_tanggapan" value="{{ old('tgl_tanggapan') }}" value="{{ $tanggapan->tgl_tanggapan }}">
                        @error('tgl_tanggapan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggapan"><span class="required">Isi Tanggapan</span></label>
                        <textarea type="text" class="form-control" id="tanggapan" placeholder="tanggapan" name="tanggapan">{{ $tanggapan->tanggapan }}</textarea>
                        @error('tanggapan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_petugas"><span class="required">Petugas Yang Menanggapi</span></label>
                        <select id="id_petugas"name="id_petugas" class="form-control">
                            @foreach ($petugas as $row)
                                <option value="{{ $row->id_petugas }}">{{ $row->nama_petugas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3 mt-3">
                        <div class="m-n2">
                            <a href="/masyarakat_tanggapan" type="button" class="btn btn-danger m-2">Kembali</a>
                            <button type="submit" class="btn btn-success m-2">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
