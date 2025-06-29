# 💰 Aplikasi Pencatatan Keuangan Personal

Aplikasi ini dirancang untuk membantu pengguna mencatat, memantau, dan mengelola pemasukan dan pengeluaran mereka secara sederhana, cepat, dan responsif. Dibuat menggunakan **PHP Native** dan **Tailwind CSS**, aplikasi ini sangat cocok untuk digunakan pribadi maupun sebagai latihan project CRUD dan UI.

---

## 📝 Deskripsi Aplikasi

Aplikasi ini menyediakan antarmuka web interaktif untuk mencatat semua jenis transaksi keuangan: baik pemasukan (seperti gaji, hadiah) maupun pengeluaran (seperti makan, transportasi). Dengan adanya fitur kategori, pengguna bisa mengelompokkan transaksi sesuai jenisnya. Saldo dihitung otomatis berdasarkan total pemasukan dan pengeluaran. Notifikasi akan muncul jika saldo terlalu rendah, membantu pengguna lebih waspada dalam penggunaan uang.

---

## ⚙️ Cara Kerja Singkat

1. **Pengguna membuka halaman utama (`index.php`)**
2. Pengguna dapat:
   - Menambahkan kategori terlebih dahulu
   - Menginput transaksi (pilih kategori, jenis pemasukan/pengeluaran, jumlah, dan deskripsi)
3. Aplikasi secara otomatis menghitung total pemasukan dan pengeluaran
4. Menampilkan total saldo saat ini
5. Jika saldo di bawah batas tertentu (misal Rp 50.000), sistem memberi peringatan.
6. Semua transaksi disimpan dalam database MySQL dan ditampilkan dalam tabel riwayat.

---

## 🛠️ Teknologi yang Digunakan

- PHP Native (tanpa framework)
- MySQL (database relasional)
- Tailwind CSS (untuk tampilan modern dan responsif)

---

## 🎯 Fitur Utama

- ✅ Tambah transaksi pemasukan/pengeluaran
- ✅ Pilih kategori transaksi
- ✅ Tambah kategori secara dinamis
- ✅ Tampilkan total saldo real-time
- ✅ Notifikasi saldo rendah
- ✅ Riwayat transaksi urut berdasarkan waktu

---

## 📦 Struktur Folder

```
personal-finance/
├── index.php                  # Halaman utama aplikasi
├── add_transaction.php        # Simpan transaksi baru
├── add_category.php           # Simpan kategori baru
├── options_category.php       # Isi dropdown kategori
├── balance_notification.php   # Tampilkan saldo dan warning
├── transaction_list.php       # Tampilkan semua transaksi
├── config/
│   └── db.php                 # File koneksi database
├── database.sql               # File SQL untuk membuat database
└── README.md
```

---

## 💡 Fitur Tambahan yang Bisa Dikembangkan

| Fitur                    | Deskripsi                                                                 |
|-------------------------|---------------------------------------------------------------------------|
| 🔐 Login Multi-user     | Setiap pengguna memiliki riwayat dan saldo sendiri                        |
| 📈 Grafik & Statistik   | Visualisasi keuangan: chart pemasukan vs pengeluaran                     |
| 📆 Filter Transaksi     | Menampilkan transaksi berdasarkan tanggal atau bulan tertentu            |
| 💾 Export PDF/Excel     | Ekspor laporan keuangan untuk dicetak atau dikirim                       |
| 📲 Responsif Mobile     | Tampilan optimal di berbagai ukuran layar                                |
| 🔔 Notifikasi Email     | Kirim email saat saldo rendah atau pengeluaran besar                     |

---

## 🧪 Cara Instalasi & Jalankan

### 1. Clone atau Download Project

```bash
git clone https://github.com/namaanda/personal-finance.git
```

### 2. Import Database

- Buka `phpMyAdmin` atau tools lain
- Import file `database.sql`
- Pastikan database bernama `finance_db`

### 3. Atur Koneksi Database

Edit file `config/db.php`:

```php
$host = 'localhost';
$user = 'root';
$pass = ''; // sesuaikan dengan password MySQL kamu
$db   = 'finance_db';
```

### 4. Jalankan di Browser

Gunakan XAMPP, Laragon, atau hosting lokal, lalu akses:

```
http://localhost/personal-finance/index.php
```

---



## 🤝 Kontribusi

Pull request dan kolaborasi sangat diterima! Jika kamu memiliki fitur tambahan atau perbaikan UI, silakan ajukan di GitHub repo.

---

## 👨‍💻 Dibuat Oleh

- [Nama Anda]
- Mahasiswa / Developer Web Pemula
- GitHub: [github.com/namaanda](https://github.com/namaanda)

---

## 📄 Lisensi

Project ini open-source dan bebas dikembangkan untuk penggunaan edukatif maupun pribadi. Untuk kebutuhan komersial, mohon beri atribusi atau konfirmasi terlebih dahulu.

---

> “Kelola uangmu hari ini, agar tidak menyesal besok.”
