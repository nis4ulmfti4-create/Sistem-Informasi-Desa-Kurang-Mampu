<!-- Aplikasi CRUD dengan PHP 8, MySQL 8, Bootstrap 5, dan Vanilla JS
**********************************************************************
* Developer   : Indra Styawantoro
* Company     : Pustaka Koding
* Release     : Maret 2023
* Update      : -
* Website     : pustakakoding.com
* E-mail      : pustaka.koding@gmail.com
* WhatsApp    : +62-813-7778-3334
-->

<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/database.php";
// panggil file "fungsi_tanggal_indo.php" untuk membuat format tanggal indonesia
require_once "helper/fungsi_tanggal_indo.php";
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi CRUD dengan PHP 8, MySQL 8, Bootstrap 5, dan Vanilla JS">
    <meta name="author" content="Indra Styawantoro">

    <!-- Title -->
    <title>SIDKM</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.css" integrity="sha256-RXPAyxHVyMLxb0TYCM2OW5R4GWkcDe02jdYgyZp41OU=" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
    <!-- Header -->
    <header>
        <!-- Navbar -->
         
        <nav class="navbar navbar-expand-lg fixed-top bg-success shadow">
            <div class="container d-flex align-items-center justify-content-between">
                <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="?halaman=data">
                    <i class="fa-solid fa-user me-2 fs-4"></i>
                    <span class="fs-5">SIDKM</span>
                    <span class="ms-2 d-none d-md-inline fw-normal" style="font-size: 1rem;">Sistem Informasi Desa Kurang Mampu</span>
                </a>
                <a href="?halaman=data" class="btn btn-outline-light rounded-circle ms-3" title="Beranda">
                    <i class="fa-solid fa-house fs-5"></i>
                </a>
            </div>
            </div>
            </div>
        </nav>
    </header>
    <!-- Hero Section -->
    <section class="hero-section py-5 mt-5 bg-success bg-gradient text-white rounded-4 shadow-sm">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="mb-4 mb-md-0">
                <h1 class="display-5 fw-bold mb-3">Selamat Datang di <span class="text-warning">SIDKM</span></h1>
                <p class="lead mb-4">Sistem Informasi Desa Kurang Mampu<br>Kelola data penduduk dengan mudah, cepat, dan aman.</p>
             
            </div>
        </div>
    </section>

    <!-- Info Cards -->
    <section class="container my-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center bg-light">
                    <div class="card-body">
                        <i class="fa-solid fa-users fa-2x text-success mb-3"></i>
                        <h5 class="card-title fw-bold">Data Penduduk</h5>
                        <p class="card-text">Mencatat dan mengelola data penduduk desa kurang mampu secara terpusat dan terstruktur.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center bg-light">
                    <div class="card-body">
                        <i class="fa-solid fa-shield-halved fa-2x text-success mb-3"></i>
                        <h5 class="card-title fw-bold">Keamanan Data</h5>
                        <p class="card-text">Data tersimpan aman dengan sistem validasi dan backup otomatis setiap saat.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow h-100 text-center bg-light">
                    <div class="card-body">
                        <i class="fa-solid fa-bolt fa-2x text-success mb-3"></i>
                        <h5 class="card-title fw-bold">Akses Cepat</h5>
                        <p class="card-text">Pencarian dan pengelolaan data penduduk menjadi lebih cepat dan efisien.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="container my-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="bg-image rounded-4 shadow-sm h-100" style="background-image: src="warga.jpg; background-size: cover; background-position: center; min-height: 320px; position: relative;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4" style="background: rgba(34, 197, 94, 0.35);"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100 d-flex flex-column justify-content-center">
                    <h2 class="fw-bold text-warning mb-3">Mengelola Data Penduduk Lebih Mudah</h2>
                    <p class="mb-4 text-secondary">SIDKM hadir untuk membantu desa dalam mengelola data penduduk kurang mampu secara digital, aman, dan efisien. Dilengkapi fitur pencarian cepat, entri data mudah, serta tampilan yang ramah pengguna.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="?halaman=entri" class="btn btn-success btn-lg rounded-pill shadow">
                            <i class="fa fa-plus me-2"></i>Tambah Data
                        </a>
                        <a href="?halaman=data" class="btn btn-outline-success btn-lg rounded-pill shadow">
                            <i class="fa fa-database me-2"></i>Lihat Data
                        </a>
                        <form action="?halaman=pencarian" method="post" class="d-flex align-items-center ms-3" style="max-width: 350px; width: 100%;">
                    <input type="text" name="kata_kunci" class="form-control rounded-pill me-2" placeholder="Cari Data Penduduk..." autocomplete="off" required style="min-width: 180px;">
                    <button class="btn btn-light rounded-pill px-3" type="submit" title="Cari">
                        <i class="fa fa-search text-success"></i>
                    </button>
                    <div class="invalid-feedback ms-2">Masukan ID atau Nama Data Penduduk yang ingin Anda cari.</div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="flex-shrink-0">
        <div class="container pt-5">
            <?php
            // pemanggilan file konten sesuai "halaman" yang dipilih
            // jika tidak ada halaman yang dipilih atau halaman yang dipilih "data"
            if (empty($_GET["halaman"]) || $_GET['halaman'] == 'data') {
                // panggil file tampil data
                include "tampil_data.php";
            }
            // jika halaman yang dipilih "entri"
            elseif ($_GET['halaman'] == 'entri') {
                // panggil file form entri
                include "form_entri.php";
            }
            // jika halaman yang dipilih "hapus"
            elseif ($_GET['halaman'] == 'hapus') {
                // panggil file hapus data
                include "hapus_data.php";
            }
            elseif ($_GET['halaman'] == 'ubah') {
                // panggil file form ubah
                include "form_ubah.php";
            }
            // jika halaman yang dipilih "detail"
            elseif ($_GET['halaman'] == 'detail') {
                // panggil file tampil detail
                include "tampil_detail.php";
            }
            // jika halaman yang dipilih "pencarian"
            elseif ($_GET['halaman'] == 'pencarian') {
                // panggil file tampil pencarian
                include "tampil_pencarian.php";
            }
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto bg-white shadow py-4">
        <div class="container">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">
                &copy; 2025 - <a href="https://pustakakoding.com/" target="_blank" class="text-brand text-decoration-none">Website</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/flatpickr.min.js" integrity="sha256-AkQap91tDcS4YyQaZY2VV34UhSCxu2bDEIgXXXuf5Hg=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.9/dist/l10n/id.js" integrity="sha256-cvHCpHmt9EqKfsBeDHOujIlR5wZ8Wy3s90da1L3sGkc=" crossorigin="anonymous"></script>

    <!-- Custom Scripts -->
    <script src="assets/js/flatpickr.js"></script>
    <script src="assets/js/form-validation.js"></script>
</body>

</html>