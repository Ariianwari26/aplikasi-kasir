<?php
require("koneksi.php");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$id_total = $_POST['id_total'];
	$fix_total = $_POST['fix_total'];


	$perintah = "UPDATE fixtotal set fix_total = '$fix_total' where  1 = '$id_total'";
	$eksekusi = mysqli_query($konek, $perintah);
	$cek = mysqli_affected_rows($konek);

	if ($cek > 0){
		$response["kode"] = 1;
		$response["pesan"] = $fix_total;
	
	}
	else{
		$response["kode"] = 0;
		$response["pesan"] = "Gagal";
	}
}
else{
		$response["kode"] = 0;
		$response["pesan"] = "Tidak Ada Post Data";
}

echo json_encode($response);
mysqli_close($konek);
?>