import os
from PIL import Image

# ===== KONFIGURASI =====
QUALITY = 90
# ======================

IMAGE_EXTENSIONS = (
    ".png", ".jpg", ".jpeg", ".bmp", ".tiff", ".tif", ".webp"
)

# Ambil folder tempat file .py berada
BASE_DIR = os.path.dirname(os.path.abspath(__file__))

def convert_image(path):
    try:
        img = Image.open(path)

        # Transparansi → background putih
        if img.mode in ("RGBA", "LA") or ("transparency" in img.info):
            bg = Image.new("RGB", img.size, (255, 255, 255))
            bg.paste(img, mask=img.split()[-1])
            final_img = bg
        else:
            final_img = img.convert("RGB")

        webp_path = os.path.splitext(path)[0] + ".webp"
        final_img.save(webp_path, "WEBP", quality=QUALITY)

        # Hapus file lama jika bukan webp
        if not path.lower().endswith(".webp"):
            os.remove(path)

        print(f"[OK] {path}")

    except Exception as e:
        print(f"[ERROR] {path} → {e}")

# Scan semua file di folder ini & subfolder
for root, dirs, files in os.walk(BASE_DIR):
    for file in files:
        if file.lower().endswith(IMAGE_EXTENSIONS):
            full_path = os.path.join(root, file)
            convert_image(full_path)

print("✅ SEMUA GAMBAR DALAM FOLDER INI SUDAH JADI WEBP!")
