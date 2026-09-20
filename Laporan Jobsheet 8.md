# Desain dan Pemrograman Web

|  | Keterangan |
|--|--|
| **NIM** | 254107020255 |
| **Nama** | Daniel Ramadhani Zulkarnain |
| **Kelas** | TI - 2D |
| **Repository** | () |

---

1.Tangani error UNIQUE dengan rapi — bungkus $stmt->execute(...) di anggota/proses_tambah.php dengan try/catch (PDOException $e), lalu set $_SESSION['flash'] berisi pesan seperti "No. Anggota sudah dipakai, gunakan nomor lain." alih-alih membiarkan error mentah ditampilkan ke pengguna.

Kode :
```php
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


Hasil :
<img width="1272" height="580" alt="image" src="https://github.com/user-attachments/assets/1efc8ae0-5ee6-401a-b67c-f9f8689575b1" />

