import os
from PIL import Image

dir_path = "/root/ABMALAYA/assets/img/projects"
files = ["bengkel-alatberat.png", "kemenpertanian.png", "masjid-renove-atap.png"]

print("--- Memulai Kompresi Lossless PNG ---")
for f in files:
    full_path = os.path.join(dir_path, f)
    if not os.path.exists(full_path):
        print(f"Berkas {f} tidak ditemukan.")
        continue
        
    original_size = os.path.getsize(full_path)
    
    # Buka gambar
    img = Image.open(full_path)
    
    # Simpan kembali dengan optimasi PNG level 9 (maksimal)
    img.save(full_path, "PNG", optimize=True, compress_level=9)
    new_size = os.path.getsize(full_path)
    
    savings = (original_size - new_size) / original_size * 100
    print(f"{f}: {original_size / 1024 / 1024:.2f} MB -> {new_size / 1024 / 1024:.2f} MB (Hemat {savings:.2f}%)")
print("--- Selesai ---")
