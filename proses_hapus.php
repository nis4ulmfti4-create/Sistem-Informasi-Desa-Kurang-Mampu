<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/database.php";

// mengecek data GET "nomor_urutan"
if (isset($_GET['id'])) {
    // ambil data GET dari tombol hapus
    $nomor_urutan = $mysqli->real_escape_string(trim($_GET['id']));

    // mengecek data dokumen_foto
    // sql statement untuk menampilkan data "dokumen_foto" dari tabel "tbl_siswa" berdasarkan "nomor_urutan"
    $query = $mysqli->query("SELECT dokumen_foto FROM tbl_siswa WHERE nomor_urutan='$nomor_urutan'")
                             or die('Ada kesalahan pada query tampil data : ' . $mysqli->error);
    // ambil data hasil query
    $data = $query->fetch_assoc();

    // hapus file foto dari folder images
    $hapus_file = unlink("images/$data[dokumen_foto]");

    // sql statement untuk delete data dari tabel "tbl_siswa" berdasarkan "nomor_urutan"
    $delete = $mysqli->query("DELETE FROM tbl_siswa WHERE nomor_urutan='$nomor_urutan'")
                              or die('Ada kesalahan pada query delete : ' . $mysqli->error);
    // cek query
    // jika proses delete berhasil
    if ($delete) {
        // alihkan ke halaman data Data Penduduk dan tampilkan pesan berhasil hapus data
        header('location: index.php?halaman=data&pesan=3');
    }
}
