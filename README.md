## About
Ini adalah web pengaduan masyarakat menggunakan framework Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Instalasi
1. instal php 8.2 dan composer di perangkat
2. clone repository ini
3. install composer di dalam folder hasil clone dengan perintah "composer install" melalui terminal
4. copy file .env.example di dalam folder kemudian paste, akan terdapat file baru dengan nama .env.example.copy
5. ubah nama file copy tadi menjadi .env saja
6. buka file .env ubah nama database sesuai dengan nama database anda di mysql pada baris DB_DATABSE = nama_database_anda
7. buka terminal, jalankan perintah "php artiasan migrate:fresh -- seed" untuk melakukan migrasi database sekaligus data seeder untuk memasukan data admin
8. jalankan perintah "php artisan serve" untuk menjalankan server laravel
9. buka browser dan buka 127.0.0.1:8000 atau localhost:8000 untuk mengakses route
## Keterangan User
1. username = admin
2. user password = admin
## Keterangan Route
1. 127.0.0.1:8000/
2. 127.0.0.1:8000/login
3. 127.0.0.1:8000/register
4. 127.0.0.1:8000/admin_dashboard
5. 127.0.0.1:8000/petugas_dashboard
6. 127.0.0.1:8000/masyarakat_dashboard

## catatan
Ada sedikit setting untuk database setelah melakukan migration, yakni pada table petugas, tanggapan dan pengaduan, centang auto increment(A_I) secara manual di database pada phpMyadmin.
Untuk instalasai lebih jelas silahkan kontak saya di instagram <p><a href="https://instagram.com/lalusahibul_" target="_blank">lalusahibul_</a></p>