import os

dir_path = "/root/ABMALAYA/assets/img/projects"
files_to_delete = ["bengkel-alatberat.png", "kemenpertanian.png", "masjid-renove-atap.png"]

print("--- Memulai Pembersihan Berkas PNG Lama ---")
for f in files_to_delete:
    full_path = os.path.join(dir_path, f)
    if os.path.exists(full_path):
        os.remove(full_path)
        print(f"Sukses menghapus berkas PNG lama: {f}")
    else:
        print(f"Berkas {f} sudah tidak ada.")
print("--- Selesai ---")
