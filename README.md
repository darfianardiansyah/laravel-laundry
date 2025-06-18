# 🧺 Laravel Laundry App

Aplikasi manajemen laundry berbasis web menggunakan **Laravel** dan **Livewire**. Proyek ini bertujuan untuk membantu pengelolaan proses laundry seperti input transaksi, pelanggan, layanan, dan status pencucian secara realtime.

---

## 🚀 Fitur Utama

- Manajemen pelanggan
- Manajemen Kategori layanan
- Input transaksi laundry
- Pemantauan status laundry
- Komponen Livewire untuk interaksi dinamis

---

## 🛠️ Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini secara lokal:

### 1. Clone Repository
```bash
git clone https://github.com/darfianardiansyah/laravel-laundry.git
cd laravel-laundry
```

### 2. Install Dependency PHP
```bash
composer install
```

### 3. Copy File .env dan Generate Key
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
Buka file .env, sesuaikan bagian berikut dengan database lokal kamu:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_laundry
DB_USERNAME=root
DB_PASSWORD=
```
### 5. Jalankan Aplikasi

```bash
php artisan serve
npm run dev
```

Buka **http://127.0.0.1:8000** di browser.
