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
                <li class="breadcrumb-item" aria-current="page">Pencarian</li>
            </ol>
        </nav>
    </div>
</div>

<div class="mb-5">
    <div class="row flex-lg-row-reverse align-items-center">
        <!-- button kembali ke halaman tampil data -->
        <div class="col-lg-4 col-xl-3">
            <a href="?halaman=data" class="btn btn-primary rounded-pill float-lg-end py-2 px-4 mb-4 mb-lg-0">
                <i class="fa-solid fa-angle-left me-2"></i> Kembali
            </a>
        </div>

<div class="row">
    <?php
    // mengecek data hasil submit dari form
    if (isset($_POST['kata_kunci'])) {
        // ambil data hasil submit dari form
        $kata_kunci = $_POST['kata_kunci'];
    ?>
        <div class="col-12">
            <div class="alert alert-primary rounded-4 mb-5" role="alert">
                <i class="fa-solid fa-hand-point-right me-2"></i> Hasil Pencarian <span class="fw-bold fst-italic">"<?php echo $kata_kunci; ?>"</span>
            </div>
        </div>

        <?php
        // sql statement untuk menampilkan data dari tabel "tbl_siswa" berdasarkan "kata_kunci"
        $query = $mysqli->query("SELECT nomor_urutan, penghasilan_perbulan, nama_lengkap, dokumen_foto FROM tbl_siswa 
                                 WHERE nomor_urutan LIKE '%$kata_kunci%' OR nama_lengkap LIKE '%$kata_kunci%'
                                 ORDER BY nomor_urutan ASC")
                                 or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
        // ambil jumlah data hasil query
        $rows = $query->num_rows;

        // cek hasil query
        // jika data Data Penduduk ada
        if ($rows <> 0) {
            // ambil data hasil query
            while ($data = $query->fetch_assoc()) { ?>
                <!-- tampilkan data -->
                <div class="p-2">
                    <div class="d-flex bg-white rounded-4 shadow-sm">
                        <div class="flex-shrink-0 p-3">
                            <img src="images/<?php echo $data['dokumen_foto']; ?>" class="border border-2 img-fluid rounded-4" alt="dokumen_foto" width="100" height="100">
                        </div>
                        <div class="p-4 flex-grow-1">
                            <h5><?php echo $data['nomor_urutan']; ?> - <?php echo $data['nama_lengkap']; ?></h5>
                            <p class="text-muted"><?php echo $data['penghasilan_perbulan']; ?></p>
                        </div>
                        <div class="p-4">
                            <div class="d-flex flex-column flex-lg-row">
                                <!-- button form detail data -->
                                <a href="?halaman=detail&id=<?php echo $data['nomor_urutan']; ?>" class="btn btn-primary btn-sm rounded-pill px-3 me-2 mb-2 mb-lg-0"> Detail </a>
                                <!-- button form ubah data -->
                                <a href="?halaman=ubah&id=<?php echo $data['nomor_urutan']; ?>" class="btn btn-success btn-sm rounded-pill px-3 me-2 mb-2 mb-lg-0"> Ubah </a>
                                <!-- button modal hapus data -->
                                <button type="button" class="btn btn-danger btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalHapus<?php echo $data['nomor_urutan']; ?>"> Hapus </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal hapus data -->
                <div class="modal fade" id="modalHapus<?php echo $data['nomor_urutan']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    <i class="fa-regular fa-trash-can me-2"></i> Hapus Data Data Penduduk
                                </h1>
                            </div>
                            <div class="modal-body">
                                <p class="mb-2">Anda yakin ingin menghapus data Data Penduduk?</p>
                                <!-- informasi data yang akan dihapus -->
                                <p class="fw-bold mb-2"><?php echo $data['nomor_urutan']; ?> <span class="fw-normal">-</span> <?php echo $data['nama_lengkap']; ?></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                                <!-- button proses hapus data -->
                                <a href="proses_hapus.php?id=<?php echo $data['nomor_urutan']; ?>" class="btn btn-danger rounded-pill px-3">Ya, Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
        // jika data Data Penduduk tidak ada
        else { ?>
            <!-- tampilkan pesan data tidak ditemukan -->
            <div class="col-12">
                <i class="fa-regular fa-circle-question me-1"></i>
                Data Data Penduduk dengan kata kunci <span class="text-primary fst-italic px-2">"<?php echo $kata_kunci; ?>"</span> tidak ditemukan.
            </div>
    <?php
        }
    }
    ?>
</div>