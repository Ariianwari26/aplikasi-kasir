<?php
require("koneksi.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id_menu = $_POST ["id_menu"];

	$perintah = "SELECT * FROM menu WHERE id_menu = '$id_menu'";
	$eksekusi = mysqli_query($konek, $perintah);
	$cek = mysqli_affected_rows($konek);

	if ($cek > 0){
		$response["kode"] = 1;
		$response["pesan"] = "Data Tersedia";
		$response ["data"] = array();

		while ($ambil = mysqli_fetch_object($eksekusi)) {
			$f["id_menu"]    = $ambil ->id_menu;
			$f["nama_menu"]  = $ambil ->nama_menu;
			$f["harga_menu"] = $ambil ->harga_menu;

			array_push($response["data"], $f);
			
	}

	}
	else{
		$response["kode"] = 0;
		$response["pesan"] = "Data Tidak Tersedia";
	}
}
else{
		$response["kode"] = 0;
		$response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);
?>