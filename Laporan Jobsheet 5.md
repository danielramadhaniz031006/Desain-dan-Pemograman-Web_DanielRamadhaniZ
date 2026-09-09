|  | Desain dan Pemograman Web |
|--|--|
| NIM | 254107020255 |
| Nama | Daniel Ramadhani Zulkarnain |
| Kelas | TI - 2D |
| Repository | [link] () |

---

## 1. Tambah Validasi Field Baru

Menambahkan validasi pada field ISBN di form **Tambah Buku**. Field ISBN sebelumnya tidak wajib diisi. Validasi ditambahkan agar ISBN hanya dapat menerima **angka dan tanda hubung (-)**.

### Kode

<img width="687" height="196" alt="Kode Validasi ISBN" src="https://github.com/user-attachments/assets/db51c87e-14c7-457a-909e-980350c4b25f" />

### Penjelasan

<img width="1211" height="251" alt="Penjelasan Validasi ISBN" src="https://github.com/user-attachments/assets/3b2f82ea-10da-4773-9dbb-9e25626a0a50" />

### Hasil

<img width="1917" height="911" alt="Hasil Validasi ISBN" src="https://github.com/user-attachments/assets/810cbafd-fbad-435e-9dc5-9604d44809db" />

<br>
<br>

---

## 2. Tambah Animasi Sederhana pada `initNavToggle`

Menambahkan animasi sederhana pada menu navigasi dengan menggunakan class CSS `transition` pada `header nav` di `style.css`, sehingga menu dapat terbuka dan tertutup dengan efek yang lebih halus, bukan langsung muncul atau menghilang.

### Kode

**`app.js`**

<img width="700" height="311" alt="Kode app.js" src="https://github.com/user-attachments/assets/372df2a0-4e11-4212-bf6e-602cd4923377" />

**`style.css`**

<img width="580" height="105" alt="Kode style.css bagian transition" src="https://github.com/user-attachments/assets/0f89d78f-4711-4220-846d-96c75b3033ba" />

<img width="272" height="131" alt="Kode style.css bagian nav-open" src="https://github.com/user-attachments/assets/8d95aefe-5b9e-40a8-899c-74849943d6ae" />

### Penjelasan

<img width="870" height="630" alt="Penjelasan app.js" src="https://github.com/user-attachments/assets/85bfdafb-ba27-4985-a9ff-1be9eda26518" />

<img width="1005" height="442" alt="Penjelasan style.css" src="https://github.com/user-attachments/assets/2abe6ae0-bd5f-4ea6-9b70-de40516e61fd" />

### Hasil

<img width="1917" height="913" alt="Hasil Animasi Menu" src="https://github.com/user-attachments/assets/2e787bcb-cefd-4220-9f4e-70c8d83d2c93" />

<br>
<br>

---

## 3. Perluas `initTableFilter`

Memperluas fungsi `initTableFilter` agar pencarian dapat dibatasi hanya pada satu kolom, yaitu kolom **Judul**, bukan mencari pada seluruh teks dalam baris. Perubahan dilakukan dengan menggunakan `row.querySelector("td")` untuk mengambil kolom pertama pada setiap baris.

### Kode

<img width="690" height="320" alt="Kode Filter Berdasarkan Judul" src="https://github.com/user-attachments/assets/2540bb95-0ceb-4a24-869c-c1693a43e460" />

### Penjelasan

<img width="1352" height="457" alt="Penjelasan Filter Berdasarkan Judul" src="https://github.com/user-attachments/assets/86c6bd70-9cb8-4860-90b4-05e86442a203" />

### Hasil

<img width="1916" height="908" alt="Hasil Filter Judul" src="https://github.com/user-attachments/assets/be45b1f1-4903-449c-baff-1d324402973d" />

<img width="1917" height="917" alt="Hasil Filter Judul" src="https://github.com/user-attachments/assets/b333cd59-5204-448f-a848-651c9b7f7da4" />

<br>
<br>

---

## 4. Tambah Counter Jumlah Baris Tersisa

Menambahkan counter jumlah buku yang masih ditampilkan setelah proses filter atau penghapusan. Counter menampilkan informasi seperti **"Menampilkan 3 dari 5 buku"** dan diperbarui setiap kali proses filter atau hapus dilakukan.

### Kode

**Fungsi Counter**

<img width="712" height="472" alt="Fungsi Counter" src="https://github.com/user-attachments/assets/f6a0202f-2584-43dc-8c16-e4ad8c17ccbb" />

**Setelah Filter**

<img width="395" height="66" alt="Update Counter Setelah Filter" src="https://github.com/user-attachments/assets/fb938486-4fe5-4b12-b796-69a131175424" />

**Setelah Hapus**

<img width="487" height="127" alt="Update Counter Setelah Hapus" src="https://github.com/user-attachments/assets/3639cde4-a089-491a-b7cf-6a51f180fad8" />

**HTML**

<img width="537" height="37" alt="HTML Counter" src="https://github.com/user-attachments/assets/d0d2d63e-7f43-4d71-8c27-aef2e5114cc6" />

### Penjelasan

**Fungsi Counter**

<img width="702" height="685" alt="Penjelasan Fungsi Counter" src="https://github.com/user-attachments/assets/d0305590-0595-4f45-9502-a7d5c6bb023d" />

**Setelah Filter**

```javascript
updateTableCounter(table);
