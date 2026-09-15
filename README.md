# Asia Linen

Landing page PHP dengan Tailwind CSS lokal. Konten katalog mengikuti price list 2026; harga sewa harian mengikuti PRICE LIST RENTAL LINEN CBW 2026.docx.pdf; nominal penggantian tidak dipublikasikan.

## Menjalankan

Buka direktori proyek melalui MAMP, atau jalankan `php -S localhost:8090` dan buka http://localhost:8090.

CSS siap pakai ada di `assets/css/style.css`. Untuk mengubah styling:

```sh
npm ci
npm run dev
```

Untuk build produksi: `npm run build`.

## Perilaku

- Navigasi seluler, detail kategori, dan FAQ dapat dibuka/tutup.
- Tombol Quote dan Enquire membuka WhatsApp +62 822-3796-3375 dengan pesan awal; tombol koleksi menyertakan nama koleksi.
- Formulir membuka WhatsApp dengan detail permintaan yang sudah diisi; pengunjung menekan Send di WhatsApp untuk mengirimnya.
- Nomor kontak tetap dapat ditelepon; tombol penawaran menggunakan WhatsApp yang telah dikonfirmasi.

## Preferensi cookie

- Banner dan dialog tersedia dalam EN/ID. Pilihan disimpan di `localStorage` dengan key `asialinen-cookie-consent`, versi 1, berlaku 180 hari untuk kedua bahasa. Jika penyimpanan diblokir browser, pilihan hanya berlaku di halaman tersebut dan pengunjung diberi tahu.
- Google Analytics `G-27RV0808TM` menggunakan basic consent mode: tag Google baru dimuat setelah analitik diterima. Penolakan, pilihan kedaluwarsa/rusak, atau JavaScript nonaktif tidak memuat Analytics. Tidak ada pengaktifan cookie iklan.
- Pengaturan dapat dibuka kembali dari footer. Mencabut izin mengaktifkan flag opt-out Google, menghapus cookie Analytics yang dapat diakses, dan menghentikan pelacakan kontak; perubahan disinkronkan ke tab lain. Data yang sebelumnya sudah dikirim tidak dihapus dari Google.
- WhatsApp dan formulir tetap berfungsi tanpa persetujuan analitik. Peristiwa sebelum persetujuan tidak disimpan untuk dikirim belakangan; isi formulir dan URL WhatsApp tidak dimasukkan dalam event kontak.
- Dasar implementasi: [Google basic consent mode](https://developers.google.com/tag-platform/security/concepts/consent-mode) dan [Google Analytics opt-out](https://developers.google.com/tag-platform/security/guides/privacy).

Uji alur cookie dengan server PHP lokal aktif dan Playwright tersedia:

```sh
node tests/check_cookie_consent.cjs http://127.0.0.1:8090
```

Jika Playwright/Chrome berada di lokasi lain, tentukan `PLAYWRIGHT_MODULE` dan `CHROME_EXECUTABLE_PATH`. Tes mencegat seluruh permintaan Google sehingga tidak mengirim data uji ke Analytics produksi.

## Konten yang perlu dikonfirmasi

Logo resmi (marka bunga saat ini merupakan interpretasi desain), satuan ukuran dalam PDF, jenis produk “Duve”, spesifikasi Pool Towel, area layanan, ketentuan biaya pengiriman, serta jadwal pengambilan. Tidak ada klaim pengiriman gratis, testimoni, atau paket jumlah kamar yang dibuat-buat.

## Gambar

Tiga ilustrasi dibuat dengan built-in imagegen, kemudian dikonversi ke JPEG untuk web. Bukan foto inventaris aktual. Sumber prompt: `assets/images/PROMPTS.md`.

## Rental price list

17 rates grouped into four responsive tables. Double Duvet TC 200 uses the latest CBW PDF rate of IDR 12,000/day. Pool towel size and weight are left for confirmation because the source specifications are ambiguous. No replacement-fee data or source PDF is included in the page.

## Bahasa dan SEO

- `/en/` menampilkan konten Inggris; `/id/` menampilkan terjemahan Indonesia. Keduanya dirender oleh PHP sehingga konten dan schema dapat dibaca tanpa JavaScript.
- `/` dan `/index.php` mengalihkan dengan HTTP 301 ke `/en/`. Tombol EN / ID tersedia pada desktop dan seluler; bagian halaman yang sedang dibuka dipertahankan ketika JavaScript aktif.
- `en/index.php` dan `id/index.php` memakai template bersama `index.php`. Teks Inggris berada di pemanggilan `t(...)`; terjemahan Indonesia ada di `includes/id.json`. FAQ HTML dan `FAQPage` tetap berasal dari array yang sama.
- Setiap bahasa memiliki canonical sendiri, hreflang EN / ID / x-default, judul, deskripsi, metadata Open Graph dan Twitter, serta structured data sesuai bahasa. `sitemap.xml` memuat kedua URL canonical.
- Harga dan spesifikasi mengikuti konten yang sudah ada. Pemisah ribuan harga dan pesan WhatsApp menyesuaikan bahasa.
- Saat deploy, unggah **seluruh perubahan**, termasuk folder `en`, `id`, `includes`, CSS hasil build, dan sitemap; jangan hanya unggah `index.php`. Tidak memerlukan rewrite khusus untuk URL folder bahasa pada hosting PHP dengan DirectoryIndex `index.php`.
- Setelah deploy, kirim ulang `https://asialinen.com/sitemap.xml` di Search Console dan periksa kedua URL bahasa.

## Favicon

Kedua bahasa menggunakan satu `<link rel="icon">` ke `/favicon.ico` tanpa query versi. File ICO berisi ukuran 16, 32, 48, dan 64 piksel. SVG disimpan sebagai aset sumber, tetapi tidak ditawarkan sebagai favicon alternatif karena SVG tidak tercantum dalam daftar format Google Search saat ini.

Setelah mengunggah perubahan, periksa source `/en/` dan `/id/` serta akses langsung `/favicon.ico`. Gunakan URL Inspection di Search Console untuk meminta pengindeksan ulang homepage (URL utama mengarah ke `/en/`). Perubahan hasil pencarian menunggu crawl dan pemrosesan Google, bisa beberapa hari hingga beberapa minggu; tidak dijamin langsung tampil. Pertahankan URL ikon yang sama pada pembaruan berikutnya.

## Pratinjau gambar di pencarian

- Gambar pilihan untuk kedua bahasa adalah `assets/images/gallery/bedroom-teak.jpg` (1280 × 960), foto galeri yang memperlihatkan linen putih dan handuk terlipat.
- `primaryImageOfPage`, `og:image`, dan `twitter:image` memakai data foto galeri yang sama, termasuk ukuran serta deskripsi sesuai bahasa. Bila mengganti gambar pilihan, ubah `$preferredImageUrl` ke foto yang juga tampil di halaman.
- `max-image-preview:large` mengizinkan pratinjau besar. Google tetap menentukan apakah dan gambar mana yang tampil.
- `sitemap.xml` memuat 16 URL gambar pada masing-masing halaman bahasa: 13 foto galeri dan 3 ilustrasi yang tampil pada halaman. Sesuaikan daftar ketika aset halaman berubah.
- Setelah deploy, kirim ulang sitemap di Search Console dan minta pengindeksan `/en/` serta `/id/` melalui URL Inspection. Langkah ini memerlukan akses properti Search Console; push Git tidak mengirim permintaan pengindeksan.

## Identitas bisnis terstruktur

Schema `LocalBusiness` memakai identitas yang juga tampil di halaman: Asia Linen, nomor telepon internasional, alamat Jalan Gunung Patas 1 No. 81B di Padang Sambian Kelod, Denpasar Barat, serta kontak WhatsApp. Logo schema memakai `assets/images/logo.svg` berukuran 512 × 512. Publisher situs dan penyedia layanan merujuk ke satu identitas bisnis yang sama.

Kode pos, jam operasional, koordinat, email, dan profil media sosial belum dicantumkan karena datanya belum tersedia. Tambahkan hanya setelah informasi tersebut dikonfirmasi dan ditampilkan secara konsisten di situs.

Pemeriksaan konten dan SEO lokal:

```sh
python3 tests/check_languages.py /path/to/php
```
