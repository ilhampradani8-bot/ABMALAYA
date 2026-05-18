import os
from PIL import Image

# Daftar berkas gambar asli yang akan dikompres langsung tanpa diubah ekstensinya
target_images = [
    # Projects
    "/root/ABMALAYA/assets/img/projects/bengkel-alatberat.png",
    "/root/ABMALAYA/assets/img/projects/kemenpertanian.png",
    "/root/ABMALAYA/assets/img/projects/masjid-renove-atap.png",
    
    # 3D Mountains
    "/root/ABMALAYA/assets/img/about3D/mountBg.png",
    "/root/ABMALAYA/assets/img/about3D/mountMg.png",
    "/root/ABMALAYA/assets/img/about3D/mountFg.png",
    
    # 3D Services
    "/root/ABMALAYA/assets/img/service3d/marine.png",
    "/root/ABMALAYA/assets/img/service3d/logistics.png",
    "/root/ABMALAYA/assets/img/service3d/pohon3d.png",
    "/root/ABMALAYA/assets/img/service3d/cinstruction.png",
    "/root/ABMALAYA/assets/img/service3d/civil.png",
    "/root/ABMALAYA/assets/img/service3d/renov.png",
    "/root/ABMALAYA/assets/img/service3d/mekanikal.png",
    "/root/ABMALAYA/assets/img/service3d/lanscape.png",
    
    # Wisma Rampai Banner
    "/root/ABMALAYA/assets/img/wisma-rampai-front.png"
]

print("--- Memulai Kompresi Gambar Asli Tanpa Mengubah Ekstensi ---")
for path in target_images:
    if os.path.exists(path):
        original_size = os.path.getsize(path)
        img = Image.open(path)
        
        # Kompresi lossless PNG tingkat maksimal (optimize=True, compress_level=9)
        # Menjaga kompatibilitas transparansi dan warna asli
        if path.lower().endswith('.png'):
            img.save(path, "PNG", optimize=True, compress_level=9)
        elif path.lower().endswith(('.jpg', '.jpeg')):
            img.save(path, "JPEG", optimize=True, quality=90)
            
        new_size = os.path.getsize(path)
        savings = (original_size - new_size) / original_size * 100
        print(f"Sukses Kompres: {os.path.basename(path)}")
        print(f"  Ukuran: {original_size / 1024:.1f} KB ➔ {new_size / 1024:.1f} KB (Hemat {savings:.1f}%)")
    else:
        print(f"Berkas tidak ditemukan: {os.path.basename(path)} (Silakan jalankan git checkout terlebih dahulu)")
print("--- Selesai ---")
