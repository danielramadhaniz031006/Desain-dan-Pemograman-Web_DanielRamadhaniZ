<?php

$page_title = "Beranda";

include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';


/* =========================================================
   DATA RINGKASAN
   ========================================================= */

$totalBuku = $pdo
    ->query("SELECT COUNT(*) FROM buku")
    ->fetchColumn();

$totalAnggota = $pdo
    ->query("SELECT COUNT(*) FROM anggota")
    ->fetchColumn();

/*
|--------------------------------------------------------------------------
| DATA PEMINJAMAN
|--------------------------------------------------------------------------
| Saat ini database Jobsheet 8 belum memiliki tabel peminjaman.
| Jadi kedua nilai berikut masih 0.
*/

$sedangDipinjam = 0;

$bukuTerlambat = 0;

?>

<!-- =========================================================
     SELAMAT DATANG
     ========================================================= -->

<section class="welcome-section">

    <h2>
        Selamat Datang di Sistem Perpustakaan Mini
    </h2>

    <p>
        Aplikasi sederhana untuk mengelola data buku
        dan anggota perpustakaan.
    </p>

</section>


<!-- =========================================================
     RINGKASAN
     ========================================================= -->

<section class="summary-section">

    <h2>Ringkasan</h2>


    <!-- =====================================================
         TOTAL BUKU
         ===================================================== -->

    <article class="stat-card">

        <h3>
            Total Buku
        </h3>

        <p>
            <?php echo $totalBuku; ?>
        </p>

    </article>


    <!-- =====================================================
         TOTAL ANGGOTA
         ===================================================== -->

    <article class="stat-card">

        <h3>
            Total Anggota
        </h3>

        <p>
            <?php echo $totalAnggota; ?>
        </p>

    </article>


    <!-- =====================================================
         SEDANG DIPINJAM
         ===================================================== -->

    <article class="stat-card">

        <h3>
            Sedang Dipinjam
        </h3>

        <p>
            <?php echo $sedangDipinjam; ?>
        </p>

    </article>


    <!-- =====================================================
         BUKU TERLAMBAT
         ===================================================== -->

    <article class="stat-card">

        <h3>
            Buku Terlambat
        </h3>

        <p>
            <?php echo $bukuTerlambat; ?>
        </p>

    </article>

</section>


<?php

include __DIR__ . '/includes/footer.php';

?>