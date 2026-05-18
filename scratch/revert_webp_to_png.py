import os

files_to_revert = [
    "/root/ABMALAYA/about.php",
    "/root/ABMALAYA/index.php",
    "/root/ABMALAYA/services.php",
    "/root/ABMALAYA/projects.php"
]

replacements = [
    # Wisma Rampai
    ("wisma-rampai-front.webp", "wisma-rampai-front.png"),
    
    # 3D Mountains
    ("mountBg.webp", "mountBg.png"),
    ("mountMg.webp", "mountMg.png"),
    ("mountFg.webp", "mountFg.png"),
    
    # 3D Services
    ("service3d/marine.webp", "service3d/marine.png"),
    ("service3d/logistics.webp", "service3d/logistics.png"),
    ("service3d/pohon3d.webp", "service3d/pohon3d.png"),
    ("service3d/cinstruction.webp", "service3d/cinstruction.png"),
    ("service3d/civil.webp", "service3d/civil.png"),
    ("service3d/renov.webp", "service3d/renov.png"),
    ("service3d/mekanikal.webp", "service3d/mekanikal.png"),
    ("service3d/lanscape.webp", "service3d/lanscape.png"),
    
    # Projects
    ("masjid-renove-atap.webp", "masjid-renove-atap.png"),
    ("bengkel-alatberat.webp", "bengkel-alatberat.png"),
    ("kemenpertanian.webp", "kemenpertanian.png")
]

print("--- Memulai Pengembalian Rujukan Ekstensi WebP ke PNG ---")
for file_path in files_to_revert:
    if os.path.exists(file_path):
        with open(file_path, "r", encoding="utf-8") as f:
            content = f.read()
            
        modified = False
        for old, new in replacements:
            if old in content:
                content = content.replace(old, new)
                print(f"Mengubah rujukan di {os.path.basename(file_path)}: {old} ➔ {new}")
                modified = True
                
        if modified:
            with open(file_path, "w", encoding="utf-8") as f:
                f.write(content)
            print(f"Berkas {os.path.basename(file_path)} sukses diperbarui.\n")
    else:
        print(f"Berkas tidak ditemukan: {os.path.basename(file_path)}")
print("--- Selesai ---")
