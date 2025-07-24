<div class="d-flex flex-column flex-lg-row mt-5 mb-4">
    <!-- judul halaman -->
    <div class="flex-grow-1 d-flex align-items-center">
        <i class="fa-regular fa-user icon-title"></i>
        <h3>Data Penduduk</h3>
    </div>
    <!-- breadcrumbs -->
    <div class="ms-5 ms-lg-0 pt-lg-2">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="https://pustakakoding.com/" class="text-dark text-decoration-none"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="?halaman=data" class="text-dark text-decoration-none">Data Penduduk</a></li>
                <li class="breadcrumb-item" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>

<?php
// mengecek data GET "nomor_urutan"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol detail
    $nomor_urutan = $_GET['id'];

    // sql statement untuk menampilkan data dari tabel "tbl_siswa" berdasarkan "nomor_urutan"
    $query = $mysqli->query("SELECT * FROM tbl_siswa WHERE nomor_urutan='$nomor_urutan'")
                             or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
    // ambil data hasil query
    $data = $query->fetch_assoc();
}
?>

<div class="bg-white rounded-4 shadow-sm p-4 mb-5">
    <!-- judul form -->
    <div class="alert alert-primary rounded-4 mb-5" role="alert">
        <i class="fa-solid fa-list-ul me-2"></i> Detail Data Data Penduduk
    </div>
    <!-- tampilkan data -->
    <div class="d-flex flex-column flex-xl-row">
        <div class="flex-shrink-0 text-center mb-5 mb-xl-0">
            <div class="foto-profil-detail">
                <img src="images/<?php echo $data['dokumen_foto']; ?>" class="border border-2 img-fluid rounded-4 shadow" alt="dokumen_foto" width="240" height="240">
            </div>
        </div>
        <div class="flex-grow-1 text-muted fw-light ms-xl-5">
            <div class="table-responsive">
                <table class="table table-striped lh-lg">
                    <tr>
                        <td width="200">ID Data Penduduk</td>
                        <td width="10">:</td>
                        <td><?php echo $data['nomor_urutan']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Terdaftar</td>
                        <td>:</td>
                        <td><?php echo tanggal_indo($data['tanggal_terdaftar']); ?></td>
                    </tr>
                    <tr>
                        <td>Penghasilan Perbulan</td>
                        <td>:</td>
                        <td><?php echo $data['penghasilan_perbulan']; ?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                    </tr>
                    <tr>
                        <td>Status Bantuan</td>
                        <td>:</td>
                        <td><?php echo $data['status_bantuan']; ?></td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>:</td>
                        <td><?php echo $data['alamat_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td><?php echo $data['nik']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="pt-4 pb-2 mt-5 border-top">
        <div class="d-grid gap-3 d-sm-flex justify-content-md-start pt-1">
            <!-- button kembali ke halaman tampil data -->
            <a href="?halaman=data" class="btn btn-primary rounded-pill py-2 px-4">Kembali</a>
        </div>
    </div>
</div>