# 🟡 Plugin WordPress Midas – Kalkulator Emas

Plugin ini menyediakan kalkulator emas interaktif untuk menghitung harga beli dan jual (buyback) emas berdasarkan harga pasar terkini.

## 🎯 **Fitur Utama**
- Hitung harga beli emas berdasarkan gram atau Rupiah.
- Hitung hasil jual emas (buyback) dengan asumsi persentase tertentu dari harga pasar.
- Mendukung **shortcode** `[midas_kalkulator]` untuk ditampilkan di halaman atau postingan.
- Bisa ditampilkan sebagai **widget** di sidebar.
- Menampilkan harga emas terkini dan harga buyback dengan konversi otomatis ke Rupiah.
- Desain responsif dan ringan.

## 🔗 **Menggunakan API Metals.Dev**
Plugin ini menggunakan data harga emas dari [Metals.Dev](https://metals.dev) — layanan API untuk harga logam mulia.

### Langkah Mengaktifkan:
1. Kunjungi [https://metals.dev](https://metals.dev) dan **buat akun gratis**.
2. Setelah mendaftar, Anda akan mendapatkan **API key** (versi gratis tersedia hingga 100 permintaan/bulan).

Tanpa API key, plugin **tidak dapat** mengambil harga emas secara real-time.

## 🛠 **Instalasi**
1. **Download** atau clone repositori ini.
2. **Ekstrak** folder plugin dan pastikan bernama `midas`.
3. **Upload** ke direktori `wp-content/plugins/` di instalasi WordPress Anda.
4. **Aktifkan** plugin melalui menu **Plugins** di dashboard WordPress.

## 📌 **Cara Penggunaan**
### ✅ Menggunakan Shortcode
Tambahkan shortcode berikut di halaman atau postingan:
```
[midas_kalkulator]
```

### ✅ Menampilkan di Sidebar (Widget)
1. Buka menu **Appearance > Widgets**.
2. Tambahkan **"Midas – Kalkulator Emas"** ke sidebar yang diinginkan.

## ⚙️ **Konfigurasi**
- Mmasukkan API key yang Anda dapat dari [https://metals.dev](https://metals.dev).
- Kalkulasi harga menggunakan data dari API dan konversi langsung ke Rupiah.
- Harga buyback default: **92.5%** dari harga emas (`hard coded` dalam plugin).

## 📷 **Screenshot**
Tampilan konfigurasi Midas:
![Konfigurasi Midas](https://raw.githubusercontent.com/kelaskakap/Midas-Wordpress/master/ss/md1.jpg)

Midas mode `shortcode` embedded di halaman:
![Shortcode Midas](https://raw.githubusercontent.com/kelaskakap/Midas-Wordpress/master/ss/md2.jpg)

Midas mode Widget:
![Widget Midas](https://raw.githubusercontent.com/kelaskakap/Midas-Wordpress/master/ss/md3.jpg)

## 🔧 **Pengembangan Selanjutnya**
- Menambahkan opsi pengaturan persen buyback dari dashboard admin.
- Menyimpan cache harga untuk mengurangi call ke API.
- Dukungan multi-mata uang (misalnya USD, SGD, MYR).
- Styling tambahan via opsi tema plugin.

## 📜 **Lisensi**
Plugin ini dirilis dengan lisensi **MIT**. Bebas digunakan dan dimodifikasi sesuai kebutuhan Anda.

## 🤝 **Kontribusi**
Ingin berkontribusi? Fork repositori ini dan kirimkan pull request atau beri saran di issues!

## ☕ **Dukung Pengembangan**
Kalau plugin ini bermanfaat buatmu, boleh traktir saya kopi:

[![Trakteer](https://img.shields.io/badge/☕%20Dukung%20di%20Trakteer-red?style=for-the-badge)](https://trakteer.id/kiosmerdeka)

---

✨ **Dibuat dengan semangat berbagi tools finansial praktis!** ✨