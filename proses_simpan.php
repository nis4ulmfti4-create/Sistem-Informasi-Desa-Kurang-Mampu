<?php
// panggil file "database.php" untuk koneksi ke database
require_once "config/database.php";

// mengecek data hasil submit dari form
if (isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $nomor_urutan                 = $mysqli->real_escape_string($_POST['nomor_urutan']);
    $tanggal                      = $mysqli->real_escape_string(trim($_POST['tanggal_terdaftar']));
    $penghasilan_perbulan         = $mysqli->real_escape_string($_POST['penghasilan_perbulan']);
    $nama_lengkap                 = $mysqli->real_escape_string(trim($_POST['nama_lengkap']));
    $jenis_kelamin                = $mysqli->real_escape_string($_POST['jenis_kelamin']);
    $status_bantuan               = $mysqli->real_escape_string(trim($_POST['status_bantuan']));
    $alamat_lengkap               = $mysqli->real_escape_string(trim($_POST['alamat_lengkap']));
    $nik                          = $mysqli->real_escape_string(trim($_POST['nik']));

    // ubah format tanggal menjadi Tahun-Bulan-Hari (Y-m-d) sebelum disimpan ke database
    $tanggal_terdaftar = date('Y-m-d', strtotime($tanggal));

    // ambil data file hasil submit dari form
    $nama_file          = $_FILES['foto']['name'];
    $tmp_file           = $_FILES['foto']['tmp_name'];
    $extension          = array_pop(explode(".", $nama_file));
    // enkripsi nama file
    $nama_file_enkripsi = sha1(md5(time() . $nama_file)) . '.' . $extension;
    // tentukan direktori penyimpanan file
    $path               = "images/" . $nama_file_enkripsi;

    // lakukan proses unggah file
    // jika file berhasil diunggah
    if (move_uploaded_file($tmp_file, $path)) {
        // sql statement untuk insert data ke tabel "tbl_siswa"
        $insert = $mysqli->query("INSERT INTO tbl_siswa(nomor_urutan, tanggal_terdaftar, penghasilan_perbulan, nama_lengkap, jenis_kelamin, status_bantuan, alamat_lengkap, nik, dokumen_foto) 
                                  VALUES('$nomor_urutan', '$tanggal_terdaftar', '$penghasilan_perbulan', '$nama_lengkap', '$jenis_kelamin', '$status_bantuan', '$alamat_lengkap_lengkap', '$nik', '$nama_file_enkripsi')")
            or die('Ada kesalahan pada query insert : ' . $mysqli->error);
        // cek query
        // jika proses insert berhasil
        if ($insert) {
            // alihkan ke halaman data Data Penduduk dan tampilkan pesan berhasil simpan data
            header('location: index.php?halaman=data&pesan=1');
        }
    }
}
