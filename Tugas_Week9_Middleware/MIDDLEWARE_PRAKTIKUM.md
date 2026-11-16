# Implementasi Middleware CeLOE LMS (Laravel 12)

## Role dan akun uji
- Admin: admin@celoe.ac.id / password
- Dosen: dosen@celoe.ac.id / password
- Mahasiswa: mahasiswa@celoe.ac.id / password

Akun uji dibuat/ diperbarui melalui `DatabaseSeeder`. Registrasi publik selalu menetapkan role `mahasiswa` dari backend.

## Middleware
- `app/Http/Middleware/RoleMiddleware.php` memeriksa autentikasi dan role.
- Alias `role` didaftarkan pada `bootstrap/app.php` (Laravel 11/12).
- Route baca katalog/detail dan dashboard memerlukan `auth`.
- `/admin/users` hanya `role:admin`.
- Route pengelolaan mata kuliah dan persetujuan enrollment menggunakan `role:dosen`; pengelolaan materi, tugas, dan daftar pengumpulan (penilaian) menggunakan `role:admin,dosen`.
- Pengajuan kelas dan pengumpulan tugas menggunakan `role:mahasiswa`.

## Menjalankan aplikasi
1. Salin `.env.example` menjadi `.env`, sesuaikan koneksi database.
2. `php artisan key:generate`
3. Untuk database praktikum kosong: `php artisan migrate:fresh --seed`
4. `php artisan serve`

## Skenario uji
| Pengguna | URL/Aksi | Hasil |
|---|---|---|
| Admin | `/admin/users` | Diizinkan |
| Dosen | `/admin/users` | 403 |
| Mahasiswa | `/admin/users` | 403 |
| Admin/Dosen | route kelola materi dan daftar pengumpulan | Diizinkan (Dosen hanya kelas yang diampu) |
| Mahasiswa | route kelola materi/tugas | 403 |
| Mahasiswa | route pengajuan kelas/pengumpulan tugas | Diizinkan sesuai status enrollment/deadline |
| Belum login | `/dashboard` | Dialihkan ke login |

Catatan: akses detail data tetap memeriksa kepemilikan kelas dan status enrollment di controller; middleware role tidak menggantikan validasi kepemilikan data.
