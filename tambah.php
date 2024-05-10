<?php
require("koneksi.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$nama_menu = $_POST["nama_menu"];
	$harga_menu = $_POST["harga_menu"];
	$gambar = $_POST["gambar"];


	$perintah = "INSERT INTO menu (nama_menu, harga_menu, gambar) VALUES ('$nama_menu','$harga_menu','$gambar')";
	$eksekusi = mysqli_query($konek, $perintah);
	$cek = mysqli_affected_rows($konek);

	if ($cek > 0){
		$response["kode"] = 1;
		$response["pesan"] = "Data Berhasil Ditambah";
	
	}
	else{
		$response["kode"] = 0;
		$response["pesan"] = "Gagal Menambah Data";
	}
}
else{
		$response["kode"] = 0;
		$response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);
?>