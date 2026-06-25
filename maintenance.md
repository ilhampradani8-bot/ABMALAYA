# 🛠 Maintenance & Development Guide - AB Malaya

Panduan ini berisi instruksi teknis untuk pemeliharaan, pembaruan konten, dan pengelolaan arsitektur website **AB Malaya Sdn Bhd** di masa mendatang.

---

## 🏛 1. Arsitektur Proyek & Struktur File

Website ini menggunakan **PHP Native Premium** berstruktur modular dengan kecepatan rendering server-side yang sangat tinggi (TTFB mendekati 0ms).

*   **Pemuatan Global (`includes/`)**:
    *   [header.php](file:///root/ABMALAYA/includes/header.php): Berisi meta SEO, preconnect fonts, pemanggilan stylesheet global, navigasi atas, dan menu Makisu 3D.
    *   [footer.php](file:///root/ABMALAYA/includes/footer.php): Penutup halaman, informasi kontak, tautan cepat, dan penutup tag global.
    *   [hero_visual.php](file:///root/ABMALAYA/includes/hero_visual.php): Komponen visual hero halaman utama lengkap dengan kanvas partikel dan paralaks mesin.
*   **Logika Kustom Halaman (`assets/js/` & `assets/css/`)**:
    *   `style.css`: Pusat CSS global, definisi font lokal Aeonik, variabel CSS (*custom properties*), dan kerangka layout dasar.
    *   [navigation.js](file:///root/ABMALAYA/assets/js/navigation.js): Inisialisasi *smooth scrolling* Lenis, jembatan sinkronisasi **Lenis-GSAP Bridge**, dan logika menu Makisu 3D.
    *   `index.js` / `about.js` / `why-us.js` / `contact.js`: JavaScript modular yang hanya dimuat pada masing-masing halaman spesifik demi efisiensi performa.

---

## 🔗 2. Manajemen URL Bersih (Clean URLs)

Situs ini menggunakan routing tanpa ekstensi `.php` yang dikelola secara dinamis oleh:
*   [router.php](file:///root/ABMALAYA/router.php): Menangkap permintaan URL (seperti `/about`, `/solutions`, `/why-us`, `/projects`, `/contact`) dan memetakannya secara internal ke file `.php` yang sesuai.
*   **Aturan Pemeliharaan Tautan**:
    *   Selalu gunakan tautan bersih di HTML/PHP (misalnya `<a href="/solutions">` bukan `solutions.php`).
    *   Jika Anda membuat halaman baru bernama `kemitraan.php`, daftarkan rutenya di `router.php` agar dapat diakses via `/kemitraan`.

---

## 🔄 3. Prosedur Pembaruan Konten Utama

### A. Memperbarui Slider Solusi (*Solutions*) di Beranda
Slider beranda menggunakan **Embla Carousel UMD** yang sangat mulus dan terakselerasi GPU.
*   **File HTML**: Bagian `<section id="service">` di [index.php](file:///root/ABMALAYA/index.php).
*   **Menambah/Mengedit Layanan**:
    *   Salin blok `<div class="embla__slide">` yang sudah ada di dalam `.embla__container`.
    *   Pastikan gambar di dalam `.media img` menggunakan rasio portrait **4:5** (misal Unsplash `&w=800&h=1000`) agar rasio pemotongan seragam.
*   **Logika Slider**: Dikelola di [assets/js/index.js](file:///root/ABMALAYA/assets/js/index.js). Pengaturan durasi geser otomatis (*autoplay*) didefinisikan lewat variabel `autoplayDelay` (bawaan: 5000ms).

### B. Mengelola Dokumen Sertifikat (Why Us Page)
Halaman kredibilitas dan sertifikasi dilengkapi pengaman dokumen tingkat lanjut untuk mencegah pencurian aset visual perusahaan.
*   **Lokasi File**: [why-us.php](file:///root/ABMALAYA/why-us.php) & [assets/js/why-us.js](file:///root/ABMALAYA/assets/js/why-us.js).
*   **Pengaman yang Aktif**:
    *   Anti Klik-Kanan pada gambar modal pratinjau.
    *   Pencegahan pintasan keyboard cetak dan simpan (`Ctrl+S`, `Ctrl+P`, `Cmd+S`, `Cmd+P`).
    *   *Watermark* transparan semi-neumorphic di atas gambar dokumen.
*   **Menambah Sertifikat Baru**:
    *   Tambahkan item baru di container slide `swiper-wrapper`. Gunakan struktur data-attribute `data-pdf` atau `data-image` untuk memicu modal pratinjau dinamis.

---

## ⚡ 4. Panduan Server & Optimasi Lokal

### Menjalankan Development Server Tanpa Hambatan
Karena browser sering memuat banyak aset secara bersamaan (CSS, JS, Font `.ttf`, Gambar WebP), jalankan server bawaan PHP lokal dalam mode **multi-threaded** agar tidak mengalami error `net::ERR_INVALID_HTTP_RESPONSE`:

*   **Linux / macOS**:
    ```bash
    PHP_CLI_SERVER_WORKERS=4 php -S localhost:8000
    ```
*   **Windows (CMD)**:
    ```cmd
    set PHP_CLI_SERVER_WORKERS=4 && php -S localhost:8000
    ```

---
*Dokumen Pemeliharaan Resmi - Tim Pengembang AB Malaya Sdn Bhd*
