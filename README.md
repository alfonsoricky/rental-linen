# Asia Linen

Landing page PHP dengan Tailwind CSS lokal. Konten katalog mengikuti price list 2026; harga dan nominal penggantian tidak dipublikasikan.

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
