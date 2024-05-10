<?php
require("koneksi.php");
$perintah = "SELECT * FROM menu";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if ($cek > 0) {
	$response ["kode"] = 1;
	$response ["pesan"] = "Data Tersedia";
	$response ["data"] = array();

	while ($ambil = mysqli_fetch_object($eksekusi)) {
		$f["id_menu"] = $ambil ->id_menu;
		$f["nama_menu"] = $ambil ->nama_menu;
		$f["harga_menu"] = $ambil ->harga_menu;
		$f["gambar"] = $ambil ->gambar;

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