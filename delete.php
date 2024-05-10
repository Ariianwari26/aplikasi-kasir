<?php
require("koneksi.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id_menu = $_POST ["id_menu"];

	$perintah = "DELETE FROM menu WHERE id_menu = '$id_menu'";
	$eksekusi = mysqli_query($konek, $perintah);
	$cek = mysqli_affected_rows($konek);

	if ($cek > 0){
		$response["kode"] = 1;
		$response["pesan"] = "Data Berhasil Dihapus";

	}
	else{
		$response["kode"] = 0;
		$response["pesan"] = "Gagal Menghapus";
	}
}
else{
		$response["kode"] = 0;
		$response["pesan"] = "Tidak Ada Post Data";
}
echo json_encode($response);
mysqli_close($konek);