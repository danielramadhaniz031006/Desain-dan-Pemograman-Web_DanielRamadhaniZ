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
