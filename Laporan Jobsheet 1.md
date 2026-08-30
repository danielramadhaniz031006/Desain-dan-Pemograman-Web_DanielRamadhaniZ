|  | Desain dan Pemograman Web |
|--|--|
| NIM | 254107020255 |
| Nama | Daniel Ramadhani Zulkarnain |
| Kelas | TI - 2D |
| Repository | [link] () |


1. Lengkapi konsistensi menu — tambahkan tautan "Daftar Anggota" dan "Tambah Anggota" ke menu <nav> di index.html, buku/list.html, dan buku/tambah.html (lihat
   catatan di dokumentasi anggota/list.html §5.4).

   Kode yang ditambah di program :
   
   - index.html
  
     
   <img width="645" height="215" alt="image" src="https://github.com/user-attachments/assets/049042a0-7cf5-4095-9270-b86bdedf68bd" />

   Penjelasan :
   <li><a href="index.html">Beranda</a></li>
   → Menu Beranda. Karena index.html berada di folder utama, langsung menggunakan index.html.

   <li><a href="buku/list.html">Daftar Buku</a></li>
   → Menu Daftar Buku. Masuk ke folder buku, lalu membuka list.html.
   
   <li><a href="buku/tambah.html">Tambah Buku</a></li>
   → Menu Tambah Buku. Masuk ke folder buku, lalu membuka tambah.html.
   
   <li><a href="anggota/list.html">Daftar Anggota</a></li>
   → Menu Daftar Anggota. Masuk ke folder anggota, lalu membuka list.html.
   
   <li><a href="anggota/tambah.html">Tambah Anggota</a></li>
   → Ini yang ditambahkan. Menu menuju halaman tambah anggota.

   - buku/list.html
  
     
   <img width="660" height="217" alt="image" src="https://github.com/user-attachments/assets/10b6aec1-e2a9-427e-a8dc-939a4e1a6cfd" />

   
   - buku/tambah.html
  
     
   <img width="677" height="216" alt="image" src="https://github.com/user-attachments/assets/373450fb-5125-49c7-b9b3-5f8d41d4b841" />


   Hasil :
   - Daftar Anggota
  
     
     <img width="691" height="411" alt="image" src="https://github.com/user-attachments/assets/1888491c-2427-4f34-b97b-25f97617ab04" />


   - Tambah Anggota
  
     
     <img width="408" height="708" alt="image" src="https://github.com/user-attachments/assets/70b70bb4-af65-4f8b-80d1-038c42ef26bc" />



3. ambah 2 baris data buku baru di buku/list.html dengan meng-copy satu blok <tr>...</tr> lalu mengganti isinya

   Kode yang ditambah di program :

   
   <img width="402" height="397" alt="image" src="https://github.com/user-attachments/assets/2362c547-eecc-4703-905d-e1287152d171" />


   Hasil :


   <img width="700" height="637" alt="image" src="https://github.com/user-attachments/assets/d6fcbad9-2024-418e-970a-b2c3a7844b4c" />


4. Tambah kolom baru di tabel anggota, misalnya "Tanggal Bergabung", lengkap dengan <th> dan <td>-nya di setiap baris.

   Kode yang ditambah di program :

   
   <img width="390" height="625" alt="image" src="https://github.com/user-attachments/assets/aeefa7cc-5aab-41a1-afa0-ff116a31a7a6" />


   Hasil :


   <img width="716" height="157" alt="image" src="https://github.com/user-attachments/assets/47025491-9560-4c19-88ce-09e86b64c42c" />


5. Tambah field baru di form tambah anggota, misalnya "Email" memakai <input type="email"> (type="email" otomatis memvalidasi format alamat email tanpa perlu
   JavaScript tambahan).

   Kode yang ditambah di program :

   
   <img width="447" height="222" alt="image" src="https://github.com/user-attachments/assets/d08ff4d7-f2df-4109-a14d-acba5c591766" />


   Hasil :


   <img width="410" height="686" alt="image" src="https://github.com/user-attachments/assets/accf055b-34a0-4c15-86a0-19ca221f80e2" />
