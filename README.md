# Proyek Akhir Rekayasa Web (API Sekolah)

Repository ini berisi source code untuk Proyek Akhir Mata Kuliah Rekayasa Web. Aplikasi ini adalah layanan **RESTful API** untuk pengelolaan data akademik sekolah yang mencakup fitur autentikasi dan CRUD (Create, Read, Update, Delete).

**Data Mahasiswa:**
- **Nama:** [Bernardus Bima Satria]
- **NIM:** [G.231.23.0057]
- **Kelas:** [Teknik Informatika A2]
- **Jenis Soal:** Soal 1 (NIM Ganjil)

## 🚀 Fitur Utama
1.  **Autentikasi User:** Login & Register menggunakan **Laravel Sanctum** (Bearer Token).
2.  **CRUD Kelas:** Pengelolaan data kelas (Wajib diisi sebelum siswa).
3.  **CRUD Guru:** Pengelolaan data guru (NIP, Nama, Mapel).
4.  **CRUD Siswa:** Pengelolaan data siswa (Berelasi dengan Kelas).

## 🛠️ Teknologi yang Digunakan
- **Framework:** Laravel 10 / 11
- **Bahasa:** PHP
- **Database:** MySQL (`crud_api_a`)
- **Security:** Laravel Sanctum
- **Tools Testing:** Postman

## 📦 Daftar Endpoint API

| Method | Endpoint | Deskripsi | Auth |
| :--- | :--- | :--- | :--- |
| POST | `/api/register` | Mendaftarkan admin baru | Public |
| POST | `/api/login` | Login & mendapatkan Token | Public |
| POST | `/api/kelas/create` | Tambah data kelas | **Bearer** |
| GET | `/api/kelas/read` | Lihat semua data kelas | **Bearer** |
| POST | `/api/guru/create` | Tambah data guru | **Bearer** |
| GET | `/api/guru/read` | Lihat semua data guru | **Bearer** |
| POST | `/api/siswa/create` | Tambah data siswa | **Bearer** |
| GET | `/api/siswa/read` | Lihat semua data siswa | **Bearer** |

*(Daftar endpoint lengkap untuk Update & Delete juga tersedia sesuai ketentuan soal).*

## ⚙️ Cara Instalasi (Untuk Penguji)

1. **Clone Repository**
   ```bash
   git clone [https://github.com/USERNAME/REPO_GANJIL.git](https://github.com/USERNAME/REPO_GANJIL.git)

2. **Install Dependencies**
   ```bash
   composer install
   
3.  **Install Dependencies**
    Copy file .env.example menjadi .env

    Sesuaikan konfigurasi database:

    DB_DATABASE=crud_api_a
    DB_USERNAME=root
    DB_PASSWORD=
   
4.  **Generate Key & Migrate**
    ```bash
    php artisan key:generate
    php artisan migrate
    
5.  **Running Server**
   ```bash
    php artisan serve
