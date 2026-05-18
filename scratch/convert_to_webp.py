import os
from PIL import Image

dir_path = "/root/ABMALAYA/assets/img/projects"
files = ["bengkel-alatberat.png", "kemenpertanian.png", "masjid-renove-atap.png"]

print("--- Memulai Konversi WebP Premium (90% Quality) ---")
for f in files:
    full_path = os.path.join(dir_path, f)
    if not os.path.exists(full_path):
        print(f"Berkas {f} tidak ditemukan.")
        continue
        
    original_size = os.path.getsize(full_path)
    
    # Buka gambar
    img = Image.open(full_path)
    
    # Buat nama berkas baru dengan ekstensi .webp
    new_filename = f.replace(".png", ".webp")
    new_full_path = os.path.join(dir_path, new_filename)
    
    # Simpan sebagai WebP dengan kualitas 90% (sangat tinggi)
    img.save(new_full_path, "WEBP", quality=90)
    new_size = os.path.getsize(new_full_path)
    
    savings = (original_size - new_size) / original_size * 100
    print(f"{f} -> {new_filename}: {original_size / 1024 / 1024:.2f} MB -> {new_size / 1024 / 1024:.2f} MB (Hemat {savings:.2f}%)")
print("--- Selesai ---")
