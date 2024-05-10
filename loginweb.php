<html lang="en">

<head>
  <meta charset="utf-8">
  <title>NOTE!</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
  <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">

  <style>
    body {

      background-image: url(img/white2.jpg);
      font-family: century gothic;
    }
  </style>

<body>

  <div class="col-md-4 col-md-offset-4 form-login">
    <a href="index.php" class="btn btn-primary">&#10096;Kembali</a>

    <?php session_start();
    include "koneksi.php";

    if (isset($_POST['login'])) {
      $username  = $_POST['username'];
      $password  = md5($_POST['password']);

      $cekuser = mysqli_query($konek, "SELECT * FROM user WHERE username = '$username' and password = '$password'");

      $login = mysqli_fetch_array($cekuser);
      $USERNAME = $login['username'];
      $PASS     = $login['password'];

      if ($login['level']  == "admin") {
        $_SESSION['username']   = $USERNAME;
        $_SESSION['level'] = "admin";

        echo "echo '<script language='javascript'>
  alert('Anda berhasil Login Admin!'); document.location='admin/index.php';</script>
  ";
      } elseif ($login['level'] == "user") {
        $_SESSION['username']   = $USERNAME;
        $_SESSION['level'] = "user";
        echo "
  <script>
  alert('DATA VALID, SELAMAT DATANG USER'); document.location='user/index.php';
  </script>
  ";
      } else {
        echo "DATA TIDAK VALID";
      }
    }
    ?>

    <div class="outter-form-login">
      <div class="logo-login">
        <em class="glyphicon glyphicon-user"></em>
      </div>
      <form action="" class="inner-login" method="post">
        <h3 class="text-center title-login">Login</h3>
        <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="Username">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <input type="submit" class="btn btn-block btn-primary" name="login" value="LOGIN" />

        <div class="text-center forget">
          <p><a href="register.php"> Daftar? </a></p>


        </div>

      </form>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>