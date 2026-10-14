# MVC PHP Native - Data Film
Aplikasi CRUD sederhana untuk mempelajari pola Model-View-Controller pada PHP Native.

## Kebutuhan 
- PHP 8.0 
- MySQL/MariaDB
- Web server lokal seperti XAMPP atau Laragon
- Git

## Instalansi
- Jalankan Apache dan MySQL melalui XAMPP
- Buka phpMyAdmin melalui `http://localhost/phpmyadmin`
- Import `database/film.sql`
- Sesuaikan koneksi pada `config/database.php`
- Buka aplikasi melalui `http://localhost/mvc-film/public/index.php`

## Struktur MVC
-  `app/models/` : akses dan operasi data.
- `app/controllers/` : alur request dan pemanggilan Model/View.
- `app/views/` : tampilan HTML.
- `config/` : konfigurasi koneksi database.
- `database/` : skema dan data awal SQL.
- `public/` : entry point aplikasi.

## Fitur
- Menampilkan data film
- Menambah data film
- Mengubah data film
- Menghapus data film

## Histori Git
Gunakan `git log --oneline --graph --decorate` untuk melihat tahapan pengembangan.
