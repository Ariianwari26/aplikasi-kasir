<?php
require('koneksi.php');
if($_SERVER['REQUEST_METHOD']=='POST') {

  $search = $_POST['search'];
  $perintah = "SELECT * FROM menu where nama_menu LIKE '%$search%'";
  $eksekusi = mysqli_query($konek, $perintah);
  $response = array();
  $cek = mysqli_affected_rows($konek);
 if ($cek > 0) {
	
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

}
echo json_encode($response);
mysqli_close($konek); 
?>