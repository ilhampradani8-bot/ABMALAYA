import os

root_dir = "/root/ABMALAYA/assets/img"
heavy_images = []

print("--- Memulai Audit Gambar Berat (>200 KB) ---")
for root, dirs, files in os.walk(root_dir):
    for f in files:
        if f.lower().endswith(('.png', '.jpg', '.jpeg')):
            full_path = os.path.join(root, f)
            size_bytes = os.path.getsize(full_path)
            size_kb = size_bytes / 1024
            if size_kb > 200:
                rel_path = os.path.relpath(full_path, "/root/ABMALAYA")
                heavy_images.append((rel_path, size_kb))

# Urutkan berdasarkan ukuran berkas terbesar
heavy_images.sort(key=lambda x: x[1], reverse=True)

for path, size in heavy_images:
    print(f"[{size / 1024:.2f} MB] - {path} ({size:.2f} KB)")

if not heavy_images:
    print("Tidak ditemukan gambar di atas 200 KB. Semua gambar sudah teroptimasi dengan sangat baik!")
else:
    print(f"\nDitemukan {len(heavy_images)} berkas gambar yang perlu dioptimalkan.")
print("--- Selesai ---")
