# Desain dan Pemrograman Web

|  | Keterangan |
|--|--|
| **NIM** | 254107020255 |
| **Nama** | Daniel Ramadhani Zulkarnain |
| **Kelas** | TI - 2D |
| **Repository** | () |

---

## 1. Validasi ISBN pada `buku/proses_tambah.php`

Menambahkan validasi ISBN di `buku/proses_tambah.php` untuk memastikan bahwa ISBN yang diisi, apabila tidak kosong, hanya mengandung **angka dan tanda hubung (`-`)** dengan menggunakan fungsi PHP `preg_match()`.

### Kode

![Validasi ISBN](https://github.com/user-attachments/assets/eb7b1d07-4021-461c-9ee3-0489e8775527)

### Penjelasan Tiap Line

#### 1. Pemeriksaan Validasi ISBN

```php
if ($isbn !== '' && !preg_match('/^[0-9-]+$/', $isbn)) {
```

Baris ini digunakan untuk memeriksa apakah ISBN yang dimasukkan tidak kosong dan tidak sesuai dengan format yang ditentukan.

- `$isbn !== ''` → memastikan ISBN telah diisi.
- `&&` → berarti kedua kondisi harus terpenuhi.
- `preg_match()` → digunakan untuk mencocokkan ISBN dengan pola tertentu.
- `/^[0-9-]+$/` → pola yang hanya memperbolehkan angka `0-9` dan tanda hubung `-`.
- `!` → membalik hasil pengecekan, sehingga kondisi terpenuhi apabila ISBN tidak sesuai dengan pola.
- `$isbn` → nilai ISBN yang akan diperiksa.

#### 2. Menyimpan Pesan Error

```php
$errors[] = "ISBN hanya boleh berisi angka dan tanda hubung (-).";
```

Baris ini menambahkan pesan kesalahan ke dalam array `$errors` apabila ISBN yang dimasukkan tidak sesuai dengan format yang diperbolehkan.

#### 3. Mengecek Apakah Terdapat Error

```php
if (!empty($errors)) {
```

Baris ini digunakan untuk mengecek apakah array `$errors` berisi pesan kesalahan.

- `empty()` → mengecek apakah suatu variabel kosong.
- `!empty()` → berarti variabel tersebut tidak kosong.
- Jika terdapat error, maka kode di dalam blok `if` akan dijalankan.

#### 4. Menyimpan Pesan ke Session

```php
$_SESSION['flash'] = [
```

Baris ini digunakan untuk menyimpan informasi pesan error ke dalam session PHP dengan nama `flash`.

```php
'type' => 'error',
```

Menentukan bahwa jenis pesan yang disimpan adalah **error**.

```php
'pesan' => implode(' ', $errors)
```

Digunakan untuk menggabungkan semua pesan yang terdapat dalam array `$errors` menjadi satu teks.

- `implode()` → menggabungkan isi array.
- `' '` → digunakan sebagai pemisah antar pesan.
- `$errors` → array yang berisi pesan kesalahan.

#### 5. Mengarahkan Kembali ke Halaman Tambah Buku

```php
header('Location: tambah.php');
```

Baris ini mengarahkan pengguna kembali ke halaman `tambah.php` setelah ditemukan kesalahan pada input.

#### 6. Menghentikan Proses

```php
exit;
```

Baris ini menghentikan eksekusi program PHP sehingga proses penyimpanan buku tidak dilanjutkan ketika terdapat error.

### Hasil

![Hasil Validasi ISBN](https://github.com/user-attachments/assets/c5d9e270-1a40-4bd8-b46a-c457236979c9)

---

## 2. Validasi Tambahan pada `anggota/proses_tambah.php`

Menambahkan **flash message** pada `anggota/proses_tambah.php` untuk menangani kasus yang sebelumnya belum ditangani.

Validasi tambahan yang diterapkan adalah:

1. Validasi **No. HP** agar hanya berisi angka.
2. Validasi **No. Anggota** agar tidak boleh sama dengan data anggota yang sudah tersimpan.

Hal ini dilakukan dengan membandingkan dengan versi `buku/proses_tambah.php` yang sudah memiliki validasi lebih lengkap, seperti validasi rentang tahun dan stok non-negatif.

### Kode Validasi No. HP

![Validasi No HP](https://github.com/user-attachments/assets/0a630b7e-77d4-4bfd-a57f-5f36764507b0)

```php
if ($noHp !== '' && !preg_match('/^[0-9]+$/', $noHp)) {
    $errors[] = "No. HP hanya boleh berisi angka.";
}
```

### Kode Cek No. Anggota Duplikat

![Cek No Anggota Duplikat](https://github.com/user-attachments/assets/80113a7c-ad02-42d0-8e4e-304cb0775287)

```php
foreach ($_SESSION['anggota'] as $anggota) {
    if (
        isset($anggota['no_anggota']) &&
        $anggota['no_anggota'] === $noAnggota
    ) {
        $errors[] = "No. Anggota sudah digunakan.";
        break;
    }
}
```

### Penjelasan Tiap Line

#### 1. Mengambil Data dari Form

```php
$nama = trim($_POST['nama'] ?? '');
```

Mengambil data nama dari form. `trim()` menghapus spasi di awal dan akhir, sedangkan `?? ''` memberi nilai kosong jika data belum dikirim.

```php
$noAnggota = trim($_POST['no_anggota'] ?? '');
```

Mengambil nomor anggota dari form dan membersihkan spasi.

```php
$alamat = trim($_POST['alamat'] ?? '');
```

Mengambil alamat anggota dan membersihkan spasi.

```php
$noHp = trim($_POST['no_hp'] ?? '');
```

Mengambil nomor HP anggota dan membersihkan spasi.

#### 2. Menyiapkan Tempat untuk Error

```php
$errors = [];
```

Membuat array kosong untuk menampung pesan kesalahan validasi.

#### 3. Validasi Nama

```php
if ($nama === '') {
    $errors[] = "Nama wajib diisi.";
}
```

Mengecek apakah nama kosong.

Jika kosong, pesan error dimasukkan ke dalam `$errors`.

#### 4. Validasi Nomor Anggota

```php
if ($noAnggota === '') {
    $errors[] = "No. Anggota wajib diisi.";
}
```

Mengecek apakah nomor anggota kosong.

Jika kosong, sistem menambahkan pesan kesalahan.

#### 5. Validasi Nomor HP

```php
if ($noHp !== '' && !preg_match('/^[0-9]+$/', $noHp)) {
    $errors[] = "No. HP hanya boleh berisi angka.";
}
```

Mengecek dua kondisi:

- Nomor HP tidak kosong.
- Nomor HP hanya boleh berisi angka `0-9`.

`preg_match()` digunakan untuk mencocokkan data dengan pola tertentu.

Jika nomor HP mengandung huruf atau karakter lain, pesan error ditambahkan.

#### 6. Menyiapkan Session Anggota

```php
if (!isset($_SESSION['anggota'])) {
    $_SESSION['anggota'] = [];
}
```

Mengecek apakah data anggota sudah tersedia di session.

Jika belum ada, dibuat array kosong untuk menyimpan data anggota.

#### 7. Mengecek Nomor Anggota Duplikat

```php
foreach ($_SESSION['anggota'] as $anggota) {
```

Melakukan perulangan untuk memeriksa semua data anggota yang sudah tersimpan.

```php
if (
    isset($anggota['no_anggota']) &&
    $anggota['no_anggota'] === $noAnggota
) {
```

Mengecek apakah nomor anggota pada data lama sama dengan nomor anggota yang sedang dimasukkan.

```php
$errors[] = "No. Anggota sudah digunakan.";
```

Jika sama, sistem memberikan pesan bahwa nomor tersebut sudah digunakan.

```php
break;
```

Menghentikan perulangan karena nomor duplikat sudah ditemukan.

#### 8. Menampilkan Flash Message Jika Ada Error

```php
if (!empty($errors)) {
```

Mengecek apakah terdapat pesan error di `$errors`.

```php
$_SESSION['flash'] = [
    'type' => 'error',
    'pesan' => implode(' ', $errors)
];
```

Menyimpan pesan error ke session agar dapat ditampilkan di halaman `tambah.php`.

- `'type' => 'error'` → menentukan bahwa jenis pesan adalah error.
- `implode(' ', $errors)` → menggabungkan semua pesan error menjadi satu kalimat.

```php
header('Location: tambah.php');
```

Mengembalikan pengguna ke halaman tambah anggota.

```php
exit;
```

Menghentikan proses PHP agar data yang salah tidak disimpan.

#### 9. Menyimpan Data Anggota

```php
$_SESSION['anggota'][] = [
    'nama' => $nama,
    'no_anggota' => $noAnggota,
    'alamat' => $alamat,
    'no_hp' => $noHp,
];
```

Menambahkan anggota baru ke dalam session.

- `'nama' => $nama` → menyimpan nama anggota.
- `'no_anggota' => $noAnggota` → menyimpan nomor anggota.
- `'alamat' => $alamat` → menyimpan alamat.
- `'no_hp' => $noHp` → menyimpan nomor HP.

#### 10. Flash Message Berhasil

```php
$_SESSION['flash'] = [
    'type' => 'success',
    'pesan' => 'Anggota berhasil ditambahkan.'
];
```

Membuat flash message untuk hasil penyimpanan berhasil.

- `'type' => 'success'` → menentukan jenis pesan sebagai success.
- `'pesan' => 'Anggota berhasil ditambahkan.'` → isi pesan yang akan ditampilkan kepada pengguna.

```php
header('Location: list.php');
```

Mengalihkan pengguna ke halaman Daftar Anggota.

```php
exit;
```

Menghentikan proses PHP setelah redirect.

---

## Bagian Kode yang Penting untuk Screenshot Laporan

### Validasi No. HP

```php
if ($noHp !== '' && !preg_match('/^[0-9]+$/', $noHp)) {
    $errors[] = "No. HP hanya boleh berisi angka.";
}
```

### Validasi No. Anggota Duplikat

```php
foreach ($_SESSION['anggota'] as $anggota) {
    if (
        isset($anggota['no_anggota']) &&
        $anggota['no_anggota'] === $noAnggota
    ) {
        $errors[] = "No. Anggota sudah digunakan.";
        break;
    }
}
```

---

## Hasil

### Hasil Validasi No. HP

![Hasil Validasi No HP](https://github.com/user-attachments/assets/e07c319b-6e19-48d5-a18d-ce26c0890807)

### Hasil No. Anggota Duplikat

![Hasil No Anggota Duplikat](https://github.com/user-attachments/assets/be8b4cbf-6f0a-4e59-8daa-29d642bb58b4)

---

## Kesimpulan

Pada tugas ini telah ditambahkan beberapa validasi tambahan pada proses input data.

Validasi yang ditambahkan meliputi:

- ISBN hanya boleh berisi angka dan tanda hubung (`-`).
- Nomor HP hanya boleh berisi angka.
- Nomor anggota tidak boleh sama dengan nomor anggota yang sudah terdaftar.
- Sistem menggunakan **flash message** untuk menampilkan pesan error maupun pesan berhasil.
- Data yang tidak valid tidak akan disimpan dan pengguna akan diarahkan kembali ke halaman form.
