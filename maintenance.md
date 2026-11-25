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

## ⚓ 5. Pemeliharaan Requisition Desk, Mailer & PDF Engine

### A. Konfigurasi Kredensial Email di cPanel Produksi
Untuk menjaga repositori GitHub tetap publik dan aman tanpa membocorkan kata sandi email:
1. File kredensial asli berada di `config/mail_credentials.php` dan **secara ketat dilindungi oleh `.gitignore`**. File ini tidak akan pernah ter-push ke GitHub.
2. Template contoh yang aman untuk publik tersedia di `config/mail_credentials.example.php`.
3. **Langkah Penyiapan di cPanel**:
   * Buka File Manager cPanel &rarr; masuk ke folder `config/`.
   * Buat atau edit file `mail_credentials.php`.
   * Masukkan konfigurasi SMTP cPanel Anda:
     ```php
     return [
         'smtp_enabled'        => true,
         'smtp_host'           => 'mail.abmalaya.com',
         'smtp_port'           => 465,
         'smtp_secure'         => 'ssl',
         'smtp_auth'           => true,
         'smtp_username'       => 'procurement@abmalaya.com',
         'smtp_password'       => 'PASSWORD_EMAIL_CPANEL_ANDA',
         'from_email'          => 'procurement@abmalaya.com',
         'from_name'           => 'AB Malaya Marine Procurement Desk',
         'bcc_copy_to_sender'  => true,
         'fallback_mail'       => true,
         'log_delivery'        => true
     ];
     ```
   * Jika password belum diisi, sistem otomatis menggunakan fungsi native `mail()` cPanel dengan parameter envelope sender `-f procurement@abmalaya.com` sehingga email tetap terkirim secara instan.

### B. Menjalankan Engine Kompilasi PDF (PyMuPDF)
Kompilasi dokumen vektor resmi A4 HSEMS 10.1D dikelola oleh skrip Python di `scripts/pdf_engine.py`.
* **Kebutuhan Server**: Python 3 dengan pustaka `PyMuPDF` (`pip install pymupdf`).
* **Eksekusi Otomatis**: Dipanggil otomatis melalui `proc_open` oleh `download_rfq_pdf.php` saat pengguna mengunduh atau mencetak dokumen.
* **Redaksi Rahasia (Active Confidentiality Guard)**: Skrip otomatis meredaksi atau mengganti identitas sensitif pihak ketiga/kompetitor (misalnya referensi `dutamarine`) menjadi identitas netral AB Malaya.

### C. Pemeliharaan Database Master IMPA
Katalog 49,459+ item IMPA disimpan dalam tabel MySQL `impa_catalog_master` di database frontend.
* Endpoint API pencarian: `/api_tender.php?action=search_impa&q=NAMA_BARANG_ATAU_KODE`.
* Pencarian didukung oleh indeks komposit pada kolom `impa_code`, `product_name`, dan `category_name` untuk memastikan respons secepat kilat (<10ms).

---
*Dokumen Pemeliharaan Resmi - Tim Pengembang AB Malaya Sdn Bhd*
