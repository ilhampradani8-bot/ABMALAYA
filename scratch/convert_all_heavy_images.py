import os
from PIL import Image

# 1. Konfigurasi Target Konversi
conversion_tasks = [
    # Wisma Rampai
    ("/root/ABMALAYA/assets/img/wisma-rampai-front.png", "/root/ABMALAYA/assets/img/wisma-rampai-front.webp"),
    
    # 3D Mountains (about3D)
    ("/root/ABMALAYA/assets/img/about3D/mountBg.png", "/root/ABMALAYA/assets/img/about3D/mountBg.webp"),
    ("/root/ABMALAYA/assets/img/about3D/mountMg.png", "/root/ABMALAYA/assets/img/about3D/mountMg.webp"),
    ("/root/ABMALAYA/assets/img/about3D/mountFg.png", "/root/ABMALAYA/assets/img/about3D/mountFg.webp"),
    
    # 3D Services (service3d)
    ("/root/ABMALAYA/assets/img/service3d/marine.png", "/root/ABMALAYA/assets/img/service3d/marine.webp"),
    ("/root/ABMALAYA/assets/img/service3d/logistics.png", "/root/ABMALAYA/assets/img/service3d/logistics.webp"),
    ("/root/ABMALAYA/assets/img/service3d/pohon3d.png", "/root/ABMALAYA/assets/img/service3d/pohon3d.webp"),
    ("/root/ABMALAYA/assets/img/service3d/cinstruction.png", "/root/ABMALAYA/assets/img/service3d/cinstruction.webp"),
    ("/root/ABMALAYA/assets/img/service3d/civil.png", "/root/ABMALAYA/assets/img/service3d/civil.webp"),
    ("/root/ABMALAYA/assets/img/service3d/renov.png", "/root/ABMALAYA/assets/img/service3d/renov.webp"),
    ("/root/ABMALAYA/assets/img/service3d/mekanikal.png", "/root/ABMALAYA/assets/img/service3d/mekanikal.webp"),
    ("/root/ABMALAYA/assets/img/service3d/lanscape.png", "/root/ABMALAYA/assets/img/service3d/lanscape.webp")
]

# 2. Berkas Unused/Sampah untuk Dihapus Permanen
cleanup_files = [
    "/root/ABMALAYA/assets/img/about3D/sky.png",
    "/root/ABMALAYA/assets/img/head/greeen.png",
    "/root/ABMALAYA/assets/img/head/logistik3.png",
    "/root/ABMALAYA/assets/img/AB Malaya Logo.jpg"
]

print("--- Memulai Pemrosesan & Kompresi WebP Massal ---")

# Eksekusi Konversi
for src, dest in conversion_tasks:
    if os.path.exists(src):
        original_size = os.path.getsize(src)
        img = Image.open(src)
        
        # Simpan sebagai WebP kualitas 90 (menjaga transparansi RGBA)
        img.save(dest, "WEBP", quality=90)
        new_size = os.path.getsize(dest)
        
        # Hapus PNG lama setelah sukses
        os.remove(src)
        
        savings = (original_size - new_size) / original_size * 100
        print(f"Sukses Konversi: {os.path.basename(src)} ➔ {os.path.basename(dest)}")
        print(f"  Ukuran: {original_size / 1024:.1f} KB ➔ {new_size / 1024:.1f} KB (Hemat {savings:.1f}%)")
    else:
        print(f"Berkas tidak ditemukan: {os.path.basename(src)}")

# Eksekusi Pembersihan Sampah
print("\n--- Memulai Pembersihan Berkas Unused/Sampah ---")
for f in cleanup_files:
    if os.path.exists(f):
        os.remove(f)
        print(f"Sukses Hapus Sampah: {os.path.basename(f)}")
    else:
        print(f"Berkas sampah sudah bersih/tidak ada: {os.path.basename(f)}")

print("\n--- Semua Proses Kompresi Selesai ---")
