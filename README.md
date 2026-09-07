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

## Konten yang perlu dikonfirmasi

Logo resmi (marka bunga saat ini merupakan interpretasi desain), satuan ukuran dalam PDF, jenis produk “Duve”, spesifikasi Pool Towel, area layanan, ketentuan biaya pengiriman, serta jadwal pengambilan. Tidak ada klaim pengiriman gratis, testimoni, atau paket jumlah kamar yang dibuat-buat.

## Gambar

Tiga ilustrasi dibuat dengan built-in imagegen, kemudian dikonversi ke JPEG untuk web. Bukan foto inventaris aktual. Sumber prompt: `assets/images/PROMPTS.md`.

## Rental price list

17 rates grouped into four responsive tables. Double Duvet TC 200 uses the latest CBW PDF rate of IDR 12,000/day. Pool towel size and weight are left for confirmation because the source specifications are ambiguous. No replacement-fee data or source PDF is included in the page.
