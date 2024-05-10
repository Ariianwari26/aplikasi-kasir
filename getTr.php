<?php
require("koneksi.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id_transaksi = $_POST ["id_transaksi"];

	$perintah = "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'";
	$eksekusi = mysqli_query($konek, $perintah);
	$cek = mysqli_affected_rows($konek);

	if ($cek > 0){
		$response["kode"] = 1;
		$response["pesan"] = "Data Tersedia";
		$response ["data"] = array();

		while ($ambil = mysqli_fetch_object($eksekusi)) {
			
			$f["total"] = $ambil ->total;

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