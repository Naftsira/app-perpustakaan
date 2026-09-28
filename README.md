# Perpustakaan Digital Kampus

Aplikasi web manajemen perpustakaan kampus PENS berbasis Laravel 12. Tujuannya mencatat data buku, kategori buku, dan anggota perpustakaan, serta menjadi dasar untuk fitur peminjaman (loans).

## Fitur
- CRUD Buku, Kategori, dan Anggota
- Validasi input dengan Form Request
- Pencarian nama anggota (`/members?search=`) dengan pagination
- Layout Blade terpusat (`layouts.app`)

## Teknologi
- PHP 8.2+
- Laravel 12
- PostgreSQL
- Composer

## Cara Menjalankan Secara Lokal

1. Clone repository:
```
   git clone https://github.com/Naftsira/app-perpustakaan.git
   cd app-perpustakaan
```
2. Install dependency:
```
   composer install
```
3. Salin file environment dan generate app key:
```
   copy .env.example .env
   php artisan key:generate
```
(Linux/Mac: `cp .env.example .env`)
4. Buat database PostgreSQL bernama `app_perpustakaan`, lalu atur `.env`:
```
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=app_perpustakaan
   DB_USERNAME=postgres
   DB_PASSWORD=isi_password_kamu
```
Pastikan extension PHP `pdo_pgsql` dan `pgsql` aktif.
5. Jalankan migration:
```
   php artisan migrate
```
6. Jalankan server:
```
   php artisan serve
```
7. Buka `http://127.0.0.1:8000/books`

## Pemahaman MVC

Model itu bagian yang berurusan dengan data, misalnya `Member` yang terhubung ke tabel `members` di database. View adalah tampilan yang dilihat pengguna, yaitu file Blade seperti `members/index.blade.php`. Controller jadi perantara: menerima request dari route, mengambil atau menyimpan data lewat Model, lalu mengirim hasilnya ke View untuk ditampilkan.

