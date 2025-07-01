# 💰 FinanKu — Aplikasi Pencatatan Keuangan Personal

**FinanKu** adalah aplikasi web sederhana berbasis **PHP Native + MySQL + Tailwind CSS** untuk mencatat dan memantau keuangan pribadi. Cocok untuk belajar proyek CRUD, pengelolaan database, autentikasi pengguna, dan desain UI responsif.

---

## 🧭 Fitur Utama

- ✅ **Login & Register** multi-user
- ✅ Tambah pemasukan dan pengeluaran
- ✅ Kategori transaksi dinamis
- ✅ Saldo otomatis & notifikasi ketika saldo rendah
- ✅ Filter transaksi berdasarkan bulan
- ✅ Ekspor laporan keuangan ke PDF & Excel
- ✅ Antarmuka sidebar responsif

---

## 🖼️ Preview Tampilan

📌 Sidebar navigasi, form transaksi, ringkasan saldo, dan tabel transaksi (dengan filter dan ekspor)

---

## 🛠️ Teknologi yang Digunakan

- PHP Native
- MySQL
- Tailwind CSS
- DomPDF (ekspor PDF)
- PhpSpreadsheet (ekspor Excel)

---

## 🗂️ Struktur Folder

```
FinanKu/
├── index.php
├── /auth/                 # Login, register, logout
│   ├── login.php
│   ├── logout.php
│   └── register.php
├── /config/
│   └── db.php
├── /includes/             # Komponen modular
│   ├── header.php
│   ├── footer.php
│   └── sidebar.php
├── /assets/
│   └── style.css
├── /vendor/               # Dompdf & PhpSpreadsheet
├── add_transaction.php
├── add_category.php
├── export_pdf.php
├── export_excel.php
├── options_category.php
├── transaction_list.php
├── balance_notification.php
├── finance_db.sql         # File SQL untuk setup awal
└── README.md
```

---

## 🚀 Cara Install & Jalankan

### 1. Clone atau Download Repo

```bash
git clone https://github.com/username/FinanKu.git
```

### 2. Import Database

- Buka `phpMyAdmin`
- Import file `finance_db.sql`
- Pastikan nama database: `FinanKu`

### 3. Konfigurasi Koneksi DB

Edit file `/config/db.php`:

```php
$host = 'localhost';
$user = 'root';
$pass = ''; // sesuaikan
$db   = 'FinanKu';
```

### 4. Jalankan Aplikasi

Gunakan XAMPP, Laragon, atau Live Server:

```
http://localhost/FinanKu/
```

> Daftar akun terlebih dahulu, lalu login untuk mulai mencatat transaksi.

---

## 🔒 Sistem Login & Multi-user

- Setiap pengguna memiliki data transaksi sendiri
- Otentikasi disimpan dalam session
- Validasi login & register disertakan

---

## 🧠 Fitur Lanjutan (Bisa Dikembangkan)

| Fitur                      | Keterangan                                     |
|---------------------------|------------------------------------------------|
| 📊 Statistik & Grafik     | Pie chart atau bar chart pemasukan/pengeluaran |
| 🔔 Email Reminder         | Notifikasi email saat saldo < Rp 50.000        |
| 🌐 API Endpoints          | Untuk konsumsi oleh mobile apps                |
| ☁️ Hosting Online         | Deploy ke Vercel, Netlify, atau shared hosting |

---

## 🤝 Kontribusi

Pull request terbuka! Perbaikan bug, refactor kode, atau UI improvement sangat disambut.

---

## 👨‍💻 Dibuat oleh

- Nama: [Nama Anda]
- Mahasiswa / Web Developer Pemula
- GitHub: [https://github.com/namaanda](https://github.com/namaanda)

---

## 📄 Lisensi

Open-source dan bebas digunakan untuk keperluan pribadi, edukasi, maupun modifikasi. Untuk komersial, silakan beri atribusi.

---

> _“Catat hari ini, nikmati besok. Uangmu punya masa depan!”_
