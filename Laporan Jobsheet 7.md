|  | Desain dan Pemograman Web |
|--|--|
| NIM | 254107020255 |
| Nama | Daniel Ramadhani Zulkarnain |
| Kelas | TI - 2D |
| Repository | () |


1. Tambah validasi ISBN di buku/proses_tambah.php — misalnya memastikan ISBN yang diisi (kalau tidak kosong) hanya berisi angka dan tanda hubung, memakai fungsi PHP preg_match().

kode :
<img width="661" height="438" alt="image" src="https://github.com/user-attachments/assets/eb7b1d07-4021-461c-9ee3-0489e8775527" />

Penjelasan Tiap Line

1.Pemeriksaan Validasi ISBN

if ($isbn !== '' && !preg_match('/^[0-9-]+$/', $isbn)) {

Baris ini digunakan untuk memeriksa apakah ISBN yang dimasukkan tidak kosong dan tidak sesuai dengan format yang ditentukan.

$isbn !== '' → memastikan ISBN telah diisi.
&& → berarti kedua kondisi harus terpenuhi.
preg_match() → digunakan untuk mencocokkan ISBN dengan pola tertentu.
/^[0-9-]+$/ → pola yang hanya memperbolehkan angka 0-9 dan tanda hubung -.
! → membalik hasil pengecekan, sehingga kondisi terpenuhi apabila ISBN tidak sesuai dengan pola.
$isbn → nilai ISBN yang akan diperiksa.

2.Menyimpan Pesan Error

$errors[] = "ISBN hanya boleh berisi angka dan tanda hubung (-).";

Baris ini menambahkan pesan kesalahan ke dalam array $errors apabila ISBN yang dimasukkan tidak sesuai dengan format yang diperbolehkan.

3.Mengecek Apakah Terdapat Error

if (!empty($errors)) {

Baris ini digunakan untuk mengecek apakah array $errors berisi pesan kesalahan.

empty() → mengecek apakah suatu variabel kosong.
!empty() → berarti variabel tersebut tidak kosong.
Jika terdapat error, maka kode di dalam blok if akan dijalankan.

4.Menyimpan Pesan ke Session

$_SESSION['flash'] = [

Baris ini digunakan untuk menyimpan informasi pesan error ke dalam session PHP dengan nama flash.

'type' => 'error',

Menentukan bahwa jenis pesan yang disimpan adalah error.

'pesan' => implode(' ', $errors)

Digunakan untuk menggabungkan semua pesan yang terdapat dalam array $errors menjadi satu teks.

implode() → menggabungkan isi array.
' ' → digunakan sebagai pemisah antar pesan.
$errors → array yang berisi pesan kesalahan.

5.Mengarahkan Kembali ke Halaman Tambah Buku

header('Location: tambah.php');

Baris ini mengarahkan pengguna kembali ke halaman tambah.php setelah ditemukan kesalahan pada input.

6.Menghentikan Proses

exit;

Baris ini menghentikan eksekusi program PHP sehingga proses penyimpanan buku tidak dilanjutkan ketika terdapat error.

Hasil
<img width="1108" height="767" alt="image" src="https://github.com/user-attachments/assets/c5d9e270-1a40-4bd8-b46a-c457236979c9" />


2. Tambah flash message di anggota/proses_tambah.php untuk kasus yang belum ditangani — bandingkan dengan versi buku/proses_tambah.php yang sudah divalidasi lebih lengkap (rentang tahun, stok non-negatif) — field apa lagi di form anggota yang mungkin perlu aturan validasi tambahan?

kode :
Validasi No. HP
<img width="645" height="227" alt="image" src="https://github.com/user-attachments/assets/0a630b7e-77d4-4bfd-a57f-5f36764507b0" />

Cek No. Anggota duplikat
<img width="647" height="312" alt="image" src="https://github.com/user-attachments/assets/80113a7c-ad02-42d0-8e4e-304cb0775287" />

Penjelasan Tiap Line :

1. Mengambil data dari form
$nama = trim($_POST['nama'] ?? '');

Mengambil data nama dari form. trim() menghapus spasi di awal/akhir, sedangkan ?? '' memberi nilai kosong jika data belum dikirim.

$noAnggota = trim($_POST['no_anggota'] ?? '');

Mengambil nomor anggota dari form dan membersihkan spasi.

$alamat = trim($_POST['alamat'] ?? '');

Mengambil alamat anggota dan membersihkan spasi.

$noHp = trim($_POST['no_hp'] ?? '');

Mengambil nomor HP anggota dan membersihkan spasi.

2. Menyiapkan tempat untuk error
$errors = [];

Membuat array kosong untuk menampung pesan kesalahan validasi.

3. Validasi nama
if ($nama === '') {

Mengecek apakah nama kosong.

    $errors[] = "Nama wajib diisi.";

Jika kosong, pesan error dimasukkan ke $errors.

}

Menutup kondisi if.

4. Validasi nomor anggota
if ($noAnggota === '') {

Mengecek apakah nomor anggota kosong.

    $errors[] = "No. Anggota wajib diisi.";

Jika kosong, sistem menambahkan pesan kesalahan.

}

Menutup kondisi.

5. Validasi nomor HP
if ($noHp !== '' && !preg_match('/^[0-9]+$/', $noHp)) {

Mengecek dua kondisi:

nomor HP tidak kosong
nomor HP hanya boleh berisi angka 0–9

preg_match() digunakan untuk mencocokkan data dengan pola tertentu.

    $errors[] = "No. HP hanya boleh berisi angka.";

Jika nomor HP mengandung huruf atau karakter lain, pesan error ditambahkan.

}

Menutup validasi nomor HP.

6. Menyiapkan session anggota
if (!isset($_SESSION['anggota'])) {

Mengecek apakah data anggota sudah tersedia di session.

    $_SESSION['anggota'] = [];

Jika belum ada, dibuat array kosong untuk menyimpan data anggota.

}

Menutup kondisi.

7. Mengecek nomor anggota duplikat
foreach ($_SESSION['anggota'] as $anggota) {

Melakukan perulangan untuk memeriksa semua data anggota yang sudah tersimpan.

if (
    isset($anggota['no_anggota']) &&
    $anggota['no_anggota'] === $noAnggota
) {

Mengecek apakah nomor anggota pada data lama sama dengan nomor anggota yang sedang dimasukkan.

    $errors[] = "No. Anggota sudah digunakan.";

Jika sama, sistem memberikan pesan bahwa nomor tersebut sudah digunakan.

    break;

Menghentikan perulangan karena nomor duplikat sudah ditemukan.

}

Menutup if.

}

Menutup foreach.

8. Menampilkan flash message jika ada error
if (!empty($errors)) {

Mengecek apakah terdapat pesan error di $errors.

$_SESSION['flash'] = [

Menyimpan pesan error ke session agar dapat ditampilkan di halaman tambah.php.

'type' => 'error',

Menentukan bahwa jenis pesan adalah error.

'pesan' => implode(' ', $errors)

Menggabungkan semua pesan error menjadi satu kalimat.

];

Menutup array flash message.

header('Location: tambah.php');

Mengembalikan pengguna ke halaman tambah anggota.

exit;

Menghentikan proses PHP agar data yang salah tidak disimpan.

9. Menyimpan data anggota
$_SESSION['anggota'][] = [

Menambahkan anggota baru ke dalam session.

'nama' => $nama,

Menyimpan nama anggota.

'no_anggota' => $noAnggota,

Menyimpan nomor anggota.

'alamat' => $alamat,

Menyimpan alamat.

'no_hp' => $noHp,

Menyimpan nomor HP.

];

Menutup data anggota yang akan disimpan.

10. Flash message berhasil
$_SESSION['flash'] = [

Membuat flash message untuk hasil penyimpanan berhasil.

'type' => 'success',

Menentukan jenis pesan sebagai success.

'pesan' => 'Anggota berhasil ditambahkan.'

Isi pesan yang akan ditampilkan kepada pengguna.

];

Menutup array.

header('Location: list.php');

Mengalihkan pengguna ke halaman Daftar Anggota.

exit;

Menghentikan proses PHP setelah redirect.

Yang paling penting untuk screenshot laprak

Kalau soal meminta validasi tambahan, screenshot bagian ini:

if ($noHp !== '' && !preg_match('/^[0-9]+$/', $noHp)) {
    $errors[] = "No. HP hanya boleh berisi angka.";
}

dan bagian nomor anggota duplikat:

foreach ($_SESSION['anggota'] as $anggota) {
    if (
        isset($anggota['no_anggota']) &&
        $anggota['no_anggota'] === $noAnggota
    ) {
        $errors[] = "No. Anggota sudah digunakan.";
        break;
    }
}

Hasil :
hasil validasi No. HP
<img width="1087" height="587" alt="image" src="https://github.com/user-attachments/assets/e07c319b-6e19-48d5-a18d-ce26c0890807" />

hasil nomor anggota duplikat
<img width="1085" height="590" alt="image" src="https://github.com/user-attachments/assets/be8b4cbf-6f0a-4e59-8daa-29d642bb58b4" />
