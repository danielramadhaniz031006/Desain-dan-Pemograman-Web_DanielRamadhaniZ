# Desain dan Pemrograman Web

|  | Keterangan |
|--|--|
| **NIM** | 254107020255 |
| **Nama** | Daniel Ramadhani Zulkarnain |
| **Kelas** | TI - 2D |
| **Repository** | () |

---

## 1. Menangani Error `UNIQUE` dengan Rapi

Tangani error `UNIQUE` dengan rapi — bungkus `$stmt->execute(...)` di `anggota/proses_tambah.php` dengan `try/catch (PDOException $e)`, lalu set `$_SESSION['flash']` berisi pesan seperti **"No. Anggota sudah dipakai, gunakan nomor lain."** alih-alih membiarkan error mentah ditampilkan kepada pengguna.

### Kode

    try {
        $stmt->execute([
            'nama' => $nama,
            'no_anggota' => $noAnggota,
            'alamat' => $alamat,
            'no_hp' => $noHp,
        ]);

        $_SESSION['flash'] = [
            'type' => 'success',
            'pesan' => 'Anggota berhasil ditambahkan.'
        ];

        header('Location: list.php');
        exit;

    } catch (PDOException $e) {

        if ($e->getCode() === '23505') {
            $_SESSION['flash'] = [
                'type' => 'error',
                'pesan' => 'No. Anggota sudah dipakai, gunakan nomor lain.'
            ];
        } else {
            $_SESSION['flash'] = [
                'type' => 'error',
                'pesan' => 'Data anggota gagal disimpan. Silakan coba lagi.'
            ];
        }

        header('Location: tambah.php');
        exit;
    }

### Penjelasan Tiap Baris Kode

**`try {`**

Digunakan untuk mencoba menjalankan proses penyimpanan data ke database.

**`$stmt->execute([`**

Menjalankan perintah SQL `INSERT` yang sebelumnya sudah dibuat menggunakan `prepare()`.

**`'nama' => $nama,`**

Mengisi parameter `:nama` dengan nilai dari variabel `$nama`.

**`'no_anggota' => $noAnggota,`**

Mengisi parameter `:no_anggota` dengan nomor anggota yang dimasukkan oleh pengguna.

**`'alamat' => $alamat,`**

Mengisi parameter `:alamat` dengan alamat anggota.

**`'no_hp' => $noHp,`**

Mengisi parameter `:no_hp` dengan nomor HP anggota.

**`]);`**

Menutup data parameter yang dikirimkan ke database.

**`$_SESSION['flash'] = [`**

Menyimpan pesan sementara ke dalam session agar dapat ditampilkan pada halaman berikutnya.

**`'type' => 'success',`**

Menentukan bahwa pesan yang disimpan merupakan pesan keberhasilan.

**`'pesan' => 'Anggota berhasil ditambahkan.'`**

Menentukan isi pesan ketika data anggota berhasil disimpan.

**`];`**

Menutup array pesan session.

**`header('Location: list.php');`**

Mengalihkan pengguna ke halaman daftar anggota setelah data berhasil ditambahkan.

**`exit;`**

Menghentikan proses PHP setelah melakukan pengalihan halaman.

**`} catch (PDOException $e) {`**

Menangkap error database yang terjadi pada proses `try`.

**`if ($e->getCode() === '23505') {`**

Memeriksa apakah error yang terjadi merupakan error `UNIQUE` PostgreSQL dengan kode `23505`.

**`$_SESSION['flash'] = [`**

Menyimpan pesan error ke dalam session.

**`'type' => 'error',`**

Menentukan bahwa pesan tersebut merupakan pesan error.

**`'pesan' => 'No. Anggota sudah dipakai, gunakan nomor lain.'`**

Memberikan pesan yang mudah dipahami ketika nomor anggota yang dimasukkan sudah digunakan.

**`} else {`**

Dijalankan apabila error yang terjadi bukan merupakan error `UNIQUE`.

**`'pesan' => 'Data anggota gagal disimpan. Silakan coba lagi.'`**

Menampilkan pesan umum jika terjadi error database lainnya.

**`header('Location: tambah.php');`**

Mengembalikan pengguna ke halaman tambah anggota agar dapat memperbaiki data.

**`exit;`**

Menghentikan proses PHP setelah pengguna diarahkan kembali ke halaman tambah anggota.

---

## Hasil

Jika pengguna memasukkan **No. Anggota yang sudah digunakan**, sistem tidak lagi menampilkan error PostgreSQL secara mentah.




Sistem akan menampilkan pesan:

**"No. Anggota sudah dipakai, gunakan nomor lain."**

![Hasil Penanganan Error UNIQUE](https://github.com/user-attachments/assets/1efc8ae0-5ee6-401a-b67c-f9f8689575b1)


## 2. Menambahkan Kolom `tanggal_ditambahkan`

Tambah kolom baru — misalnya tanggal_ditambahkan TIMESTAMP DEFAULT NOW() di tabel buku (cari tahu sendiri arti NOW() dan TIMESTAMP lewat dokumentasi PostgreSQL), lalu tampilkan kolom itu di buku/list.php.

### Kode SQL

    ALTER TABLE buku
    ADD COLUMN IF NOT EXISTS tanggal_ditambahkan TIMESTAMP DEFAULT NOW();

### Penjelasan Tiap Baris Kode

**`ALTER TABLE buku`**

Digunakan untuk mengubah struktur tabel `buku` yang sudah ada di database.

**`ADD COLUMN IF NOT EXISTS tanggal_ditambahkan`**

Digunakan untuk menambahkan kolom baru bernama `tanggal_ditambahkan`. Kata `IF NOT EXISTS` digunakan agar kolom tidak ditambahkan kembali jika kolom tersebut sudah tersedia.

**`TIMESTAMP`**

Digunakan sebagai tipe data untuk menyimpan tanggal dan waktu.

**`DEFAULT NOW()`**

Menentukan nilai bawaan kolom menggunakan waktu saat ini. Fungsi `NOW()` akan menghasilkan tanggal dan waktu ketika data dimasukkan ke dalam tabel.

### Perubahan pada `buku/list.php`

Sebelumnya, tabel daftar buku hanya menampilkan kolom Judul, Pengarang, Tahun, Stok, dan Aksi. Data buku diambil menggunakan query `SELECT * FROM buku ORDER BY id DESC`. 

Kemudian ditambahkan kolom **Tanggal Ditambahkan** pada bagian tabel.

Kode yang ditambahkan pada bagian `<thead>`:

    <th>Tanggal Ditambahkan</th>

Kode tersebut digunakan untuk membuat judul kolom baru pada tabel.

Kemudian ditambahkan kode pada bagian `<tbody>`:

    <td>
        <?php
        echo date(
            'd-m-Y H:i',
            strtotime($buku['tanggal_ditambahkan'])
        );
        ?>
    </td>

### Penjelasan Kode Tampilan Tanggal

**`<td>`**

Digunakan untuk membuat sel pada tabel yang berisi data tanggal ditambahkan.

**`$buku['tanggal_ditambahkan']`**

Mengambil nilai `tanggal_ditambahkan` dari data buku yang diperoleh dari database.

**`strtotime($buku['tanggal_ditambahkan'])`**

Mengubah nilai tanggal dari database menjadi format waktu yang dapat diproses oleh PHP.

**`date('d-m-Y H:i', ...)`**

Mengubah format tanggal dan waktu agar lebih mudah dibaca. Format yang digunakan adalah tanggal-bulan-tahun dan jam:menit.

### Perubahan `proses_tambah.php`

File `buku/proses_tambah.php` tidak perlu mengisi `tanggal_ditambahkan` secara manual. Proses `INSERT` tetap memasukkan data judul, pengarang, tahun, ISBN, stok, dan kategori. Karena kolom `tanggal_ditambahkan` memiliki `DEFAULT NOW()`, PostgreSQL akan mengisi tanggal dan waktu secara otomatis ketika buku ditambahkan.

### Hasil

Setelah query berhasil dijalankan, PostgreSQL menampilkan pesan **"Query returned successfully"**, sehingga kolom `tanggal_ditambahkan` berhasil ditambahkan ke tabel `buku`.

Pada halaman **Daftar Buku**, sekarang terdapat kolom baru:

**Judul | Pengarang | Tahun | Stok | Tanggal Ditambahkan | Aksi**

Setiap buku yang ditambahkan akan memiliki tanggal dan waktu penambahan secara otomatis.
