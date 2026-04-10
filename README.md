# 🔐 ArgonAuth — Sistem Login & Registrasi PHP

Proyek ini merupakan sistem autentikasi berbasis web menggunakan **PHP** dan **MySQL**, dikembangkan sebagai bagian dari tugas mata kuliah **Keamanan Sistem — Telkom University**.

---

## ✨ Fitur

- **Registrasi** pengguna baru dengan validasi input
- **Login** dengan verifikasi email dan password
- **Enkripsi password** menggunakan algoritma **Argon2ID** (via `password_hash()`)
- **Proteksi SQL Injection** menggunakan *Prepared Statements*
- **Manajemen sesi** dengan PHP Session
- **Logout** yang aman

---

## 🛠️ Teknologi yang Digunakan

| Teknologi        | Keterangan                          |
|-----------------|--------------------------------------|
| PHP             | Backend / logika server              |
| MySQL           | Database penyimpanan user            |
| Bootstrap 5.3   | Styling tampilan (via CDN)           |
| Font Awesome 6  | Ikon antarmuka (via CDN)             |
| XAMPP           | Web server lokal (Apache + MySQL)    |

---

## 📁 Struktur File

```
login-register/
├── index.php              # Halaman dashboard (hanya bisa diakses setelah login)
├── login.php              # Halaman form login
├── registrasi.php         # Halaman form registrasi
├── logout.php             # Script untuk logout dan destroy session
├── database.php           # Konfigurasi koneksi database (⚠️ tidak di-push)
├── database.example.php   # Template konfigurasi database (untuk referensi)
├── style.css              # Custom CSS tambahan
└── README.md              # Dokumentasi proyek ini
```

> ⚠️ File `database.php` **tidak disertakan** di repository karena berisi kredensial sensitif. Gunakan `database.example.php` sebagai panduan.

---

## ⚙️ Cara Menjalankan (Lokal dengan XAMPP)

### 1. Persyaratan
- [XAMPP](https://www.apachefriends.org/) sudah terinstall
- PHP versi **7.4 ke atas** (Argon2ID membutuhkan PHP 7.2+)

### 2. Clone / Copy Project

Clone repository ini ke dalam folder `htdocs` XAMPP:

```bash
git clone https://github.com/USERNAME/login-register.git "C:/xampp/htdocs/login-register"
```

Atau copy manual folder project ke:
```
C:\xampp\htdocs\login-register\
```

### 3. Buat Database

Buka **phpMyAdmin** (`http://localhost/phpmyadmin`) lalu jalankan SQL berikut:

```sql
CREATE DATABASE `login-register`;

USE `login-register`;

CREATE TABLE `users` (
  `id`        INT(11) NOT NULL AUTO_INCREMENT,
  `full_name` VARCHAR(100) NOT NULL,
  `email`     VARCHAR(100) NOT NULL UNIQUE,
  `password`  VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);
```

### 4. Konfigurasi Database

Duplikat file `database.example.php` dan rename menjadi `database.php`:

```bash
cp database.example.php database.php
```

Lalu edit `database.php` sesuai konfigurasi lokal kamu:

```php
$hostName   = "localhost";
$dbUser     = "root";        // username MySQL kamu
$dbPassword = "";            // password MySQL kamu (default XAMPP: kosong)
$dbName     = "login-register";
```

### 5. Jalankan Aplikasi

Pastikan **Apache** dan **MySQL** sudah aktif di XAMPP, lalu buka browser:

```
http://localhost/login-register/login.php
```

---

## 🔄 Alur Penggunaan

```
Buka Aplikasi
     │
     ▼
[login.php] ──── Belum punya akun? ──▶ [registrasi.php]
     │                                        │
     │ Login berhasil                  Isi: Nama, Email,
     │                                 Password, Konfirmasi
     ▼                                        │
[index.php]  ◀─────────────────────── Registrasi berhasil
(Dashboard)
     │
     │ Klik Logout
     ▼
[logout.php] ──▶ Session dihapus ──▶ Redirect ke login.php
```

---

## 🔒 Fitur Keamanan

| Ancaman            | Mitigasi yang Diterapkan                              |
|--------------------|-------------------------------------------------------|
| SQL Injection       | Prepared Statements (`mysqli_stmt_*`)                |
| Brute Force / weak hash | Password di-hash dengan **Argon2ID**           |
| Akses tidak sah     | Cek `$_SESSION["user"]` di setiap halaman terproteksi |
| Registrasi duplikat | Validasi email unik sebelum INSERT                   |

---

## 👤 Author

- **Nama**: Muhammad Habibie R  
- **Kampus**: Telkom University  
- **Mata Kuliah**: Keamanan Sistem
