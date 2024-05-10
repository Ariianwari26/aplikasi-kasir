<?php
require("koneksi.php");
$perintah = "SELECT * FROM fixtotal";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if ($cek > 0) {
	$response ["kode"] = 1;
	$response ["pesan"] = "Data Tersedia";
	$response ["data"] = array();

	while ($ambil = mysqli_fetch_object($eksekusi)) {
		$f["id_total"] = $ambil ->id_total;
		$f["fix_total"] = $ambil ->fix_total;

		array_push($response["data"], $f);

	}

}
else{
	$response["kode"]= 0;
	$response["pesan"]="Data Tidak Tersedia";

}
echo json_encode($response);
mysqli_close($konek); 
?>