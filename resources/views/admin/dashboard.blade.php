@extends('admin.partials.main')
@section('content_admin')
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-folder fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"><strong>Pengaduan Masuk</strong></p>
                    <h6 class="mb-0">{{ DB::table('pengaduan')->count() }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-folder fa-3x text-danger"></i>
                <div class="ms-3">
                    <p class="mb-2"><strong>Pengaduan Diabaikan</strong></p>
                    <h6 class="mb-0">{{ DB::table('pengaduan')->where('status', '0')->count() }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-folder fa-3x text-warning"></i>
                <div class="ms-3">
                    <p class="mb-2 fw-bold"><strong>Pengaduan Diproses</strong></p>
                    <h6 class="mb-0">{{ DB::table('pengaduan')->where('status', 'proses')->count() }}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-folder fa-3x text-success"></i>
                <div class="ms-3">
                    <p class="mb-2"><strong>Pengaduan Selesai</strong></p>
                    <h6 class="mb-0">{{ DB::table('pengaduan')->where('status', 'selesai')->count() }}</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
