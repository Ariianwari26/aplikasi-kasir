<?php
if (isset($_GET['page'])){
	$page = $_GET['page'];
	switch ($page){
		case 'tampil':
		include "view.php";
		break;

		case 'about':
		include "about.php";
			# code...
			break;




		default:
		echo"<center><h3>MAAF, HALAMAN TIDAK DITEMUKAN!</h3></center>";
		break;
		}
}else{
include "view.php";
}
?>	