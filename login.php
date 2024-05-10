<?php
    require("koneksi.php");

    $response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST["username"];
    $password = $_POST["password"];


    $perintah = "SELECT * FROM user where username = '$username' and password = '$password'";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    if ($cek > 0){
        $response["status"] = true;
        $response["pesan"] = "Login Berhasil";
        $response ["data"] = array();

        while ($ambil = mysqli_fetch_object($eksekusi)) {
            
            $f["nama_user"] = $ambil ->nama_user;

            array_push($response["data"], $f);
            
    }

    }else {
        $response["status"] = 0;
        $response["pesan"] = "Username Atau Password Salah";
    }

    
}else{
        $response["status"] = false;
        $response["pesan"] = "Silahkan Isi Data";
}
echo json_encode($response);
mysqli_close($konek);
?>