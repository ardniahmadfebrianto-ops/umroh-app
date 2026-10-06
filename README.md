# Safar Umroh

Aplikasi Laravel untuk melihat paket umroh, mengelola paket, dan mengatur akun jamaah.

## Menjalankan aplikasi

1. Pasang dependency PHP dan JavaScript:

       composer install
       Copy-Item .env.example .env
       php artisan key:generate
       npm install

2. Atur koneksi database di .env, lalu siapkan tabel:

       php artisan migrate

3. Jalankan server dan aset frontend:

       composer run dev

   Buka http://localhost:8000. Halaman utama akan mengarahkan ke login.

## Struktur aplikasi

- routes/: pemetaan URL dan middleware.
- app/Http/Controllers/: autentikasi, profil, dashboard, dan pengelolaan paket.
- app/Models/: model Eloquent User dan Package.
- resources/views/: halaman Blade dan layout.
- database/migrations/: skema tabel.

Request divalidasi di controller sebelum perubahan disimpan melalui model. Pendaftaran publik selalu membuat akun dengan role jamaah; hanya role admin yang dapat mengelola paket.

## Menetapkan pengelola

Buat akun dari halaman pendaftaran. Lalu ubah role akun tersebut melalui Tinker:

       php artisan tinker

Di prompt Tinker, jalankan:

       $user = \App\Models\User::where('email', 'email-pengelola@example.com')->firstOrFail();
       $user->role = 'admin';
       $user->save();

## Fitur saat ini

- Login, daftar, logout, dan pemulihan kata sandi.
- Dashboard jamaah dan daftar paket.
- Halaman admin untuk melihat dan menambahkan paket.
- Pengaturan profil dan kata sandi.

Pengiriman tautan reset kata sandi memerlukan konfigurasi mail di .env.
