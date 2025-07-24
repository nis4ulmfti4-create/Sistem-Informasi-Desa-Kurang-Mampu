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

    // mengecek data foto dari form ubah data
    // jika data foto tidak ada (foto tidak diubah)
    if (empty($nama_file)) {
        // sql statement untuk update data di tabel "tbl_siswa" berdasarkan "nomor_urutan"
        $update = $mysqli->query("UPDATE tbl_siswa
                                  SET tanggal_terdaftar='$tanggal_terdaftar', penghasilan_perbulan='$penghasilan_perbulan', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', status_bantuan='$status_bantuan', alamat_lengkap='$alamat_lengkap', status_bantuan='$status_bantuan'
                                  WHERE nomor_urutan='$nomor_urutan'")
                                  or die('Ada kesalahan pada query update : ' . $mysqli->error);
        // cek query
        // jika proses update berhasil
        if ($update) {
            // alihkan ke halaman data Data Penduduk dan tampilkan pesan berhasil ubah data
            header('location: index.php?halaman=data&pesan=2');
        }
    }
    // jika data foto ada (foto diubah)
    else {
        // lakukan proses unggah file
        // jika file berhasil diunggah
        if (move_uploaded_file($tmp_file, $path)) {
            // sql statement untuk update data di tabel "tbl_siswa" berdasarkan "nomor_urutan"
            $update = $mysqli->query("UPDATE tbl_siswa
                                      SET tanggal_terdaftar='$tanggal_terdaftar', penghasilan_perbulan='$penghasilan_perbulan', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', nik='$status_bantuan', alamat_lengkap='$alamat_lengkap', nik='$nik', dokumen_foto='$nama_file_enkripsi'
                                      WHERE nomor_urutan='$nomor_urutan'")
                                      or die('Ada kesalahan pada query update : ' . $mysqli->error);
            // cek query
            // jika proses update berhasil
            if ($update) {
                // alihkan ke halaman data Data Penduduk dan tampilkan pesan berhasil ubah data
                header('location: index.php?halaman=data&pesan=2');
            }
        }
    }
}
