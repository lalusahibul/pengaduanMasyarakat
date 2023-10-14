<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasPengaduanController;
use App\Http\Controllers\PetugasTanggapanController;
use App\Http\Controllers\PetugasMasyarakatController;
use App\Http\Controllers\MasyarakatPengaduanController;
use App\Http\Controllers\MasyarakatTanggapanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
});




// Route::middleware(['auth:petugas', 'ceklevel:admin'])->group(function () {
//route admin start
Route::get('/admin_dashboard', function () {
    return view('admin.dashboard');
});
Route::resource('/admin_masyarakat', MasyarakatController::class);
Route::resource('/admin_petugas', PetugasController::class);
Route::resource('/admin_pengaduan', PengaduanController::class);
Route::resource('/admin_tanggapan', TanggapanController::class);
Route::get('/pengaduan_konfirmasi/{pengaduan:id_pengaduan}/{aksi}', [PengaduanController::class, 'pengaduan_konfirmasi']);
//end route admin
// });

// Route::middleware(['auth:masyarakat'])->group(function () {
//route masyarakat start
Route::get('/masyarakat_dashboard', function () {
    return view('masyarakat.dashboard');
});
Route::resource('/masyarakat_pengaduan', MasyarakatPengaduanController::class);
Route::resource('/masyarakat_tanggapan', MasyarakatTanggapanController::class);
//route masyarakat end
// });

// Route::middleware(['auth:petugas', 'ceklevel:petugas'])->group(function () {
//route petugas start
Route::get('/petugas_dashboard', function () {
    return view('petugas.dashboard');
});
Route::resource('/petugas_masyarakat', PetugasMasyarakatController::class);
Route::resource('/petugas_pengaduan', PetugasPengaduanController::class);
Route::resource('/petugas_tanggapan', PetugasTanggapanController::class);
Route::get('/petugaspengaduan_konfirmasi/{pengaduan:id_pengaduan}/{aksi}', [PetugasPengaduanController::class, 'petugaspengaduan_konfirmasi']);
//end route petugas
// });

//login-logout
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//endlogin-logout
