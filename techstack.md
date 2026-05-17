# 🚀 Tech Stack Specifications - AB Malaya Website

Dokumen ini menjabarkan seluruh spesifikasi tumpukan teknologi (*tech stack*) yang digunakan pada proyek website **AB Malaya Sdn Bhd**, peran masing-masing teknologi dalam arsitektur sistem, serta manfaat performa yang diberikannya.

---

## 🏛 1. Core Platform & Backend

### 🐘 PHP 8.3 Native
*   **Peran**: Berperan sebagai fondasi pemrograman sisi server (*server-side scripting*). Mengelola pembagian modul dinamis seperti `header.php`, `footer.php`, komponen visual, dan sistem routing internal.
*   **Manfaat**: 
    *   **Kecepatan Ekstrem (TTFB ~0ms)**: Tidak menggunakan framework berat (seperti Laravel/CodeIgniter) sehingga memangkas beban pemrosesan server. Halaman dimuat secara instan sejak klik pertama.
    *   **Penyusunan Kode Bersih**: Menggunakan template modular terstruktur untuk memudahkan pemeliharaan kode oleh pengembang lain.

### 🌐 HTML5 (Semantic Markup)
*   **Peran**: Menyediakan kerangka halaman yang logis dan terstruktur dengan menggunakan tag semantik HTML5 (`<section>`, `<article>`, `<header>`, `<nav>`, `<footer >`).
*   **Manfaat**: 
    *   **Optimasi SEO Utama**: Membantu robot mesin pencari Google memahami hierarki konten situs secara akurat.
    *   **Aksesibilitas**: Mempermudah pembaca layar (*screen readers*) untuk mengenali bagian-bagian penting di dalam situs.

### 🎨 Vanilla CSS3 (Custom Properties & Utilities)
*   **Peran**: Mengelola seluruh presentasi visual, tata letak responsif, skema warna gelap korporat (*corporate dark theme*), serta transisi mikro.
*   **Manfaat**: 
    *   **Zero Overhead**: Tidak bergantung pada framework CSS eksternal (seperti Bootstrap/Tailwind) yang menambah ukuran unduhan aset.
    *   **Variabel CSS Kompatibel**: Memudahkan pemeliharaan warna utama (`--primary: #005EE9`), transisi global, dan font hanya dari satu pusat kendali.

---

## 🎬 2. Animation & Interaction Engines

### 🌀 Lenis (Smooth Scroll)
*   **Peran**: Menyediakan efek gulir halus (*smooth scrolling*) yang elegan di seluruh halaman situs saat pengguna memutar roda mouse atau menggeser layar sentuh.
*   **Manfaat**: Menghilangkan efek patah-patah bawaan browser, memberikan kenyamanan visual premium yang setara dengan situs web korporat internasional.

### ⚡ GSAP 3.12.2 (GreenSock Animation Platform)
*   **Peran**: Pustaka animasi JavaScript berkinerja tinggi yang digunakan untuk merancang urutan animasi mikro yang kompleks dan sangat halus pada halaman *About* dan *Contact*.
*   **Manfaat**: Animasi terakselerasi perangkat keras secara native, memastikan transisi berjalan pada frame rate stabil 60fps+ tanpa membebani prosesor utama.

### 📍 ScrollTrigger & ScrollToPlugin (GSAP Add-ons)
*   **Peran**: 
    *   **ScrollTrigger**: Mengikat jalannya animasi GSAP dengan posisi gulir layar pengguna (efek paralaks dinamis).
    *   **ScrollToPlugin**: Mengelola perpindahan posisi jangkar (*anchor navigation*) secara sangat halus antar bagian halaman.
*   **Manfaat**: Menciptakan pengalaman bercerita (*visual storytelling*) yang dinamis seiring pengguna menjelajahi situs.

### 🎭 Lenis-GSAP Bridge (Sync Connector)
*   **Peran**: Mengikat jalannya siklus rendering Lenis ke dalam `gsap.ticker` global.
*   **Manfaat**: Mencegah terjadinya bentrokan loop animasi (*dual loop conflict*) yang biasanya menjadi penyebab utama layar tersendat (*lag/stuttering*) saat menggulir halaman beranimasi paralaks.

---

## 🎠 3. Advanced Carousel Systems

### 📐 Embla Carousel UMD
*   **Peran**: Menggerakkan slider *Solutions* di halaman utama (*Beranda*).
*   **Manfaat**: 
    *   **Physics-Driven Snapping**: Sangat peka terhadap sentuhan jari (*drag/swipe* responsif).
    *   **Zero Jitter**: Menghilangkan getaran snapping saat kartu berpindah posisi karena menggunakan penghitungan transformasi matriks CSS teroptimasi.

### 🎡 Swiper.js
*   **Peran**: Menggerakkan slider sertifikasi interaktif berbentuk blog pada halaman sertifikat (*Certified*) dan slider portofolio proyek sinematik pada halaman proyek (*Projects*).
*   **Manfaat**: Memungkinkan navigasi *slide-by-slide* yang kokoh dengan efek sentuh mobile yang intuitif dan transisi horizontal yang presisi. Di halaman proyek, disesuaikan dengan petunjuk visual mobile ("SLIDE >") dan layout modular responsif.

---

## 🛠 4. Specialized UI Components

### 📜 Makisu 3D Menu (jQuery Plugin)
*   **Peran**: Membuat efek lipatan kertas 3D (*folding paper 3D transition*) saat menu navigasi mobile dibuka.
*   **Manfaat**: Memberikan efek visual *wow* yang tidak biasa bagi pengguna ponsel, memperkuat identitas AB Malaya sebagai perusahaan teknik modern yang kreatif.

### 💎 VanillaTilt.js (Neumorphism 3D Parallax)
*   **Peran**: Menghasilkan efek kemiringan 3D interaktif yang mengikuti arah kursor mouse pengguna pada logo klien dan kartu paralaks.
*   **Manfaat**: Memberikan dimensi kedalaman (*depth perception*) yang premium pada elemen antarmuka neumorfik.

---

## 🔍 5. Advanced Search & Navigation Systems

### 🎤 Spotify-Style Voice Search & Live Match Engine
*   **Peran**: Menggerakkan overlay pencarian premium dan canggih ala Spotify yang dilengkapi fitur penangkapan suara (*Voice Search*) serta mesin pencarian langsung tanpa reload halaman (*Live Search*).
*   **Manfaat**:
    *   **Voice Search Web Speech API**: Memungkinkan pengguna mencari informasi dengan suara secara hands-free. Menampilkan indikator mikrofon merah berpulsasi secara interaktif sebelum auto-submit.
    *   **Real-Time Data Match**: Menyaring kamus konten data lokal (`siteContent`) saat pengguna mengetik dan menyajikan kartu hasil langsung di bawah kolom input teks secara instan.

### 💎 Staggered Glassmorphic Dropdown Navigation
*   **Peran**: Menyajikan menu dropdown dengan latar belakang kaca buram (*glassmorphic*) pada tautan navigasi utama di header desktop.
*   **Manfaat**: Menghasilkan kepuasan navigasi visual terbaik berkat transisi panah indikator SVG (`arrow-svg`) yang berputar halus serta peluncuran staggered sub-menu menggunakan kurva pegas Apple.

### 📂 Auto-Expanding Hover Search (Header & Footer)
*   **Peran**: Menyediakan kolom pencarian dinamis yang hemat ruang pada header dan footer.
*   **Manfaat**: Kolom input pencarian melebar lembut otomatis ketika di-hover (`mouseenter`) selama 0,8 detik dan langsung menyusut rapi saat kursor pergi (`mouseleave`), menjaga antarmuka tetap bersih.

---

## 🔒 6. Custom Visual & Security Systems

### 🌌 Interactive GPU Canvas Particle Engine
*   **Peran**: Mengelola jutaan partikel interaktif pada latar belakang hero beranda menggunakan kanvas HTML5.
*   **Manfaat**: 
    *   **Hemat Baterai (IntersectionObserver)**: Mesin partikel otomatis berhenti berputar (*pause*) saat pengguna menggulir ke bawah dan elemen tidak terlihat di layar. Ini sangat menghemat daya prosesor dan baterai perangkat seluler.
    *   **Akselerasi GPU**: Pembaruan posisi visual memanfaatkan `translate3d` yang memindahkan beban render dari CPU ke kartu grafis.

### 🛡️ PDF/Image Anti-Theft Protective System
*   **Peran**: Mengamankan visual dokumen berharga perusahaan (seperti sertifikat ISO/Lisensi) di halaman *Certified*.
*   **Manfaat**: 
    *   Mematikan fungsi klik kanan (*anti right-click*).
    *   Memblokir jalan pintas keyboard untuk menyimpan atau mencetak halaman (`Ctrl+S`, `Ctrl+P`, `Cmd+S`, `Cmd+P`).
    *   Menambahkan lapisan transparan pelindung (*watermark overlay*) neumorfik di atas aset agar gambar asli tidak dapat disalin dengan mudah.

---
*Dokumen Teknologi Resmi - Tim Rekayasa Web AB Malaya Sdn Bhd*
