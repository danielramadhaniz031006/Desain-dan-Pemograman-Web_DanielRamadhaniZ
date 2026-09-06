|  | Desain dan Pemograman Web |
|--|--|
| NIM | 254107020255 |
| Nama | Daniel Ramadhani Zulkarnain |
| Kelas | TI - 2D |
| Repository | [link] () |


1. Tambah breakpoint baru — misalnya @media (min-width: 1400px) untuk layar monitor sangat lebar, ubah main { max-width: 1000px; } (dari dokumentasi jobsheet-02)
   menjadi lebih lebar khusus di breakpoint ini.

- Kode :
<img width="342" height="297" alt="Screenshot 2026-09-06 121342" src="https://github.com/user-attachments/assets/67e04785-7cf3-4893-bb22-31188e0fdd5d" />

/* Layar sangat lebar */ = Komentar untuk memberi keterangan bahwa kode berikut digunakan pada layar yang sangat lebar. Komentar tidak memengaruhi tampilan website.
@media (min-width: 1400px) { = Membuat media query yang hanya aktif ketika lebar layar minimal 1400px.
main { = Menargetkan elemen HTML <main>, yaitu bagian utama yang berisi konten website.
max-width: 1200px; = Menentukan lebar maksimum <main> menjadi 1200px ketika kondisi media query terpenuhi.

- Hasil :
<img width="1917" height="1078" alt="image" src="https://github.com/user-attachments/assets/3c872e53-508c-4d51-831b-03aa3e40779d" />


