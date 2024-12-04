# POS Sistem
Aplikasi **POS (Point of Sale)** untuk mempermudah proses transaksi penjualan di toko atau usaha Anda. Aplikasi ini dibangun menggunakan **PHP Native** dan **Database MySQL** serta **Stisla Admin** untuk antarmuka pengguna.

## Teknologi yang Digunakan
- **PHP Native**
- **Stisla Admin**: Tema admin berbasis bootstap 4.

## Fitur
- **Manajemen Produk**: Menambah, mengedit, dan menghapus produk.
- **Manajemen Kategori Produk**: Menambah, mengedit, dan menghapus kategori produk.
- **Manajemen Transaksi**: Menyediakan sistem kasir untuk mencatat penjualan, menghitung total harga, kembalian, dan memproses pembayaran serta mencetak struk pembayaran.
- **Laporan Penjualan**: Menampilkan laporan penjualan harian, dan bulanan.

## Instalasi
Ikuti langkah-langkah berikut untuk menginstal aplikasi ini di server lokal Anda:

### 1 Pindahkan data ke Localhost
1. Salin repository ini ke komputer Anda dengan mengklik tombol Code, lalu pilih Download ZIP untuk mengunduh file sebagai ZIP, atau clone menggunakan Git `git clone https://github.com/rizkizulfihadi/pos-sistem.git`
2. Pastikan Anda sudah memiliki **MySQL** terinstal di komputer Anda.
2. **Letakkan folder aplikasi ini di dalam folder `htdocs`** di direktori instalasi XAMPP Anda. Misalnya: `C:/xampp/htdocs/pos-sistem` 

### 2 Siapkan Database
Sebelum menjalankan aplikasi, Anda harus mengimpor database terlebih dahulu. Ikuti langkah-langkah berikut untuk mengimpor database:

1. Pastikan Anda sudah memiliki **MySQL** terinstal di komputer Anda.
2. Buat database baru di MySQL dengan nama `db_toko`.
3. Setelah database dibuat, import file SQL yang ada di folder `database/db_toko.sql` ke dalam database `db_toko`. 

### 3. Jalankan Aplikasi
1. Pastikan server apache dan mySQL sudah berjalan.
2. Buka browser dan akses aplikasi melalui `http://localhost/pos-sistem`
3. Saat masuk menampilkan halaman login, masukkan username dan password berikut:
   - **Username**: `admin`
   - **Password**: `123`
