# Digitallibrary

Aplikasi Digitallibrary adalah platform digital yang dirancang untuk memudahkan pengelolaan perpustakaan dan akses informasi bagi pengguna. Dengan menggunakan aplikasi ini, pengguna dapat melakukan berbagai hal, termasuk mencari, meminjam, memberikan ulasan dan mengembalikan buku secara online.

## fitur yang ada  di projek ini

- https://startbootstrap.com/theme/sb-admin-2
    - Dashboard UI
- Halaman Awal (Landing Page)
    - Halaman Beranda
    - Fitur
    - Layanan
    - Ulasan
    - Buku
    - Genre Buku (Kategori)
- Authentication
    - Pendaftaran (register)
    - Login
- Multi User
    - Admin
        - Buku yang dapat dikelola
        - Mengkonfirmasi Pengembalian buku
        - Generate Laporan (EXCEL)
    - Petugas
        - Buku yang dapat dikelola
        - Mengkonfirmasi Pengembalian buku
        - Generate Laporan (EXCEL)
    - Peminjam
        - Melihat dan Meminjam Buku 
        - Member Rating dan Ulasan buku
        - Register (membuat akun sebagai peminjam)
    - Semua 
        - Login
        - Logout

## ERD & Relasi antar tabel
![baru drawio](https://github.com/fadil-syam/ukk/assets/140788604/78854bb0-40c5-4b1a-90c5-f8bf06ce5086)

![Screenshot (19)](https://github.com/fadil-syam/ukk/assets/140788604/0ff8940b-07bc-4b93-a4d2-e6ecc4dc6c1c)

## UML Diagram Use Case
![Diagram Tanpa Judul drawio (1)](https://github.com/fadil-syam/ukk/assets/140788604/64428e84-f84c-4ce7-8732-1c00a8254586)

## Prasyarat
Syarat yang di perlukan untuk menginstal dan menjalankan aplikasi
- PHP 8.2.8 & Web Server (Apache, Lighttpd, atau Nginx)
- Database (MariaDB dengan v11.0.3 atau PostgreSQL)
- Web Browser (Chrome, Firefox, Opera, dll)

## Instalasi
1.Klona repository
```sh
git clone https://github.com/fadil-syam/ukk.git
composer install
composer remove maatwebsite/excel
composer require psr/simple-cache:^1.0 maatwebsite/excel --ignore-platform-reqs --with-all-dependencies
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider
```

2.Klona repository  .env
```sh
DB_DATABASE=digitallibrary
FILESYSTEM_DISK=public
```

3.Migrasi dan symlink
```sh
php artisan storage:link
php artisan migrate --seed
```

4.Mulai situs web
```sh
php artisan serve
```

## Pembuat
digitallibrary dibuat oleh [fadil-syam](https://github.com/fadil-syam/ukk.git)
