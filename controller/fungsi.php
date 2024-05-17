<?php

// mengkoneksikan dengan file koneksi.php
include 'koneksi.php';

// membuat function tambah data dengan mengambil parameter $_POST = $data dan $_FILES = $files
function tambah_data($data, $files)
{
    // membuat variable dari value $data
    $id_pelanggan = $data['id_pelanggan'];
    $nama_pelanggan = $data['nama_pelanggan'];
    $role_pelanggan = $data['role_pelanggan'];
    $ulasan_pelanggan = $data['ulasan_pelanggan'];
    $rate_pelanggan = $data['rate_pelanggan'];

    // Memeriksa apakah ada file foto yang diunggah
    if (!empty($files['foto']['name'])) {
        // memisahkan nama foto setiap ada titik
        $split = explode('.', $files['foto']['name']);
        // mengambil 1 kata di akhir nama foto sesudah titik, misal akbar.jpg maka yang di ambil adalah "jpg" untuk dijadikan variable ekstensi
        $ekstensi = $split[count($split) - 1];

        // membuat variable $foto yang berisi nisn + nama siswa + . + $ekstensi
        $combine = $nama_pelanggan . $role_pelanggan . $role_pelanggan . '.' . $ekstensi;

        // menghapus spasi pada isi $combine (misal: akbar eka.jpg => akbareka.jpg)
        $foto_pelanggan = str_replace(" ", "", $combine);

        // tujuan foto disimpan
        $dir = "../assets/images/";
        // mengambil foto dari tmpFile yang ada di array $_FILES
        $tmpFile = $files['foto']['tmp_name'];

        // memindahkan foto dari tmpFIle ke dir atau tujuan foto disimpan dengan nama $foto
        move_uploaded_file($tmpFile, $dir . $foto_pelanggan);
    } else {
        // Jika tidak ada file foto yang diunggah, set nilai $foto_pelanggan menjadi NULL atau sesuai dengan kebutuhan Anda
        $foto_pelanggan = NULL;
    }

    // query untuk menambahkan data ke database
    $query = "INSERT INTO tb_ulasan VALUES(null, '$nama_pelanggan', '$role_pelanggan', '$foto_pelanggan', '$ulasan_pelanggan', '$rate_pelanggan')";
    // running querry
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

// membuat function ubah data dengan mengambil parameter $_POST = $data dan $_FILES = $files
function ubah_data($data, $files)
{
	// membuat variable dari array di dalam $data/$_POST
	$id_pelanggan = $data['id_pelanggan'];
	$nama_pelanggan = $data['nama_pelanggan'];
	$role_pelanggan = $data['role_pelanggan'];
	$ulasan_pelanggan = $data['ulasan_pelanggan'];
	$rate_pelanggan = $data['rate_pelanggan'];

	// query untuk mengambil data dari db
	$queryShow = "SELECT * FROM tb_ulasan WHERE id_pelanggan = '$id_pelanggan';";
	// running query
	$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
	// menyimpan output dari db ke variable $result
	$result = mysqli_fetch_assoc($sqlShow);

	// jika di dalam array $file dengan nama "name" di dalam "foto" tidak ada atau == ""
	if ($files['foto']['name'] == "") {
		// variable $foto berisi string sesuai di db
		$foto_pelanggan = $result['foto_pelanggan'];
	}

	// jika tidak, atau jika di dalam array $foto yang berisi "name" di dalam "foto" ada isinya atau !=
	else {
		// memisahkan nama foto setiap ada titik
		$split = explode('.', $files['foto']['name']);
		// mengambil 1 kata di akhir nama foto sesudah titik, misal akbar.jpg maka yang di ambil adalah "jpg" untuk dijadikan variable ekstensi
		$ekstensi = $split[count($split) - 1];

		// membuat variable $foto yang berisi nisn + nama siswa + . + $ekstensi
		$combine = $id_pelanggan . $nama_pelanggan . '.' . $ekstensi;

		// menghapus space pada isi $combine (misal: akbar eka.jpg => akbareka.jpg)
		$foto_pelanggan = str_replace(" ", "", $combine);

		// menghapus file dalam assets/images/ dengan nama foto yang sesuai di db 
		unlink("../assets/images/" . $result['foto_pelanggan']);

		// memindahkan foto dari tmp File ke assets/images/ dengan nama foto = $foto
		move_uploaded_file($files['foto']['tmp_name'], '../assets/images/' . $foto_pelanggan);
	}

	// query untuk update data
	$query = "UPDATE tb_ulasan SET nama_pelanggan='$nama_pelanggan', role_pelanggan='$role_pelanggan', foto_pelanggan='$foto_pelanggan', ulasan_pelanggan = '$ulasan_pelanggan', rate_pelanggan='$rate_pelanggan' WHERE id_pelanggan='$id_pelanggan';";
	// running query
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}

// membuat function hapus data dengan mengambil parameter $_POST = $data
function hapus_data($data)
{
	// membuat variable dengan mengambil isi dari $data untuk dijadikan id siswa
	$id_pelanggan = $data['hapusUlasan'];

	// query untuk mengambil data yang id siswanya sama dengan id siswa di db
	$queryShow = "SELECT * FROM tb_ulasan WHERE id_pelanggan = '$id_pelanggan';";
	// running query
	$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
	// menyimpan output querry
	$result = mysqli_fetch_assoc($sqlShow);

	// meghapus file assets/images/ dengan nama sesuai nama foto siswa di db
	unlink("../assets/images/" . $result['foto_pelanggan']);

	// query untuk menghapus data, dimana id siswa harus sesuai dengan id siswa di db
	$query = "DELETE FROM tb_ulasan WHERE id_pelanggan = '$id_pelanggan';";
	// running the query
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}

function tambah_produk($data, $files)
{
    // membuat variable dari value $data
    $id_produk = $data['id_produk'];
    $nama_produk = $data['nama_produk'];
    $varian_produk = $data['varian_produk'];
    $harga_produk = $data['harga_produk'];

    // Memeriksa apakah ada file foto yang diunggah
    if (!empty($files['foto']['name'])) {
        // memisahkan nama foto setiap ada titik
        $split = explode('.', $files['foto']['name']);
        // mengambil 1 kata di akhir nama foto sesudah titik, misal akbar.jpg maka yang di ambil adalah "jpg" untuk dijadikan variable ekstensi
        $ekstensi = $split[count($split) - 1];

        // membuat variable $foto yang berisi nisn + nama siswa + . + $ekstensi
        $combine = $nama_produk . $varian_produk . $harga_produk . '.' . $ekstensi;

        // menghapus spasi pada isi $combine (misal: akbar eka.jpg => akbareka.jpg)
        $foto_produk = str_replace(" ", "", $combine);

        // tujuan foto disimpan
        $dir = "../assets/images/";
        // mengambil foto dari tmpFile yang ada di array $_FILES
        $tmpFile = $files['foto']['tmp_name'];

        // memindahkan foto dari tmpFIle ke dir atau tujuan foto disimpan dengan nama $foto
        move_uploaded_file($tmpFile, $dir . $foto_produk);
    } else {
        // Jika tidak ada file foto yang diunggah, set nilai $foto_pelanggan menjadi NULL atau sesuai dengan kebutuhan Anda
        $foto_produk = NULL;
    }

    // query untuk menambahkan data ke database
    $query = "INSERT INTO tb_produk VALUES(null, '$nama_produk', '$varian_produk', '$harga_produk', '$foto_produk')";
    // running querry
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_produk($data, $files)
{
	// membuat variable dari array di dalam $data/$_POST
	$id_produk = $data['id_produk'];
	$nama_produk = $data['nama_produk'];
	$varian_produk = $data['varian_produk'];
	$harga_produk = $data['harga_produk'];

	// query untuk mengambil data dari db
	$queryShow = "SELECT * FROM tb_produk WHERE id_produk = '$id_produk';";
	// running query
	$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
	// menyimpan output dari db ke variable $result
	$result = mysqli_fetch_assoc($sqlShow);

	// jika di dalam array $file dengan nama "name" di dalam "foto" tidak ada atau == ""
	if ($files['foto']['name'] == "") {
		// variable $foto berisi string sesuai di db
		$foto_produk = $result['foto_produk'];
	}

	// jika tidak, atau jika di dalam array $foto yang berisi "name" di dalam "foto" ada isinya atau !=
	else {
		// memisahkan nama foto setiap ada titik
		$split = explode('.', $files['foto']['name']);
		// mengambil 1 kata di akhir nama foto sesudah titik, misal akbar.jpg maka yang di ambil adalah "jpg" untuk dijadikan variable ekstensi
		$ekstensi = $split[count($split) - 1];

		// membuat variable $foto yang berisi nisn + nama siswa + . + $ekstensi
		$combine = $id_produk . $nama_produk . '.' . $ekstensi;

		// menghapus space pada isi $combine (misal: akbar eka.jpg => akbareka.jpg)
		$foto_produk = str_replace(" ", "", $combine);

		// menghapus file dalam assets/images/ dengan nama foto yang sesuai di db 
		unlink("../assets/images/" . $result['foto_produk']);

		// memindahkan foto dari tmp File ke assets/images/ dengan nama foto = $foto
		move_uploaded_file($files['foto']['tmp_name'], '../assets/images/' . $foto_produk);
	}

	// query untuk update data
	$query = "UPDATE tb_produk SET nama_produk='$nama_produk', varian_produk='$varian_produk', harga_produk='$harga_produk', foto_produk = '$foto_produk' WHERE id_produk='$id_produk';";
	// running query
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}

function hapus_produk($data){
	// membuat variable dengan mengambil isi dari $data untuk dijadikan id siswa
	$id_produk = $data['hapusProduk'];

	// query untuk mengambil data yang id siswanya sama dengan id siswa di db
	$queryShow = "SELECT * FROM tb_produk WHERE id_produk = '$id_produk';";
	// running query
	$sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
	// menyimpan output querry
	$result = mysqli_fetch_assoc($sqlShow);

	// meghapus file assets/images/ dengan nama sesuai nama foto siswa di db
	unlink("../assets/images/" . $result['foto_produk']);

	// query untuk menghapus data, dimana id siswa harus sesuai dengan id siswa di db
	$query = "DELETE FROM tb_produk WHERE id_produk = '$id_produk';";
	// running the query
	$sql = mysqli_query($GLOBALS['conn'], $query);

	return true;
}