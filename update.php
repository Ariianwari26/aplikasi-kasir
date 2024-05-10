<?php
require("koneksi.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$nama_menu = $_POST["nama_menu"];
	$jumlah = $_POST["jumlah"];
	$harga_menu = $_POST["harga_menu"];
	$total = $_POST["total"];


	$perintah = "INSERT INTO transaksi (nama_menu, jumlah, harga_menu, total, status ) VALUES ('$nama_menu', '$jumlah', '$harga_menu', '$total','belom')";
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