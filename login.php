<?php 
  /**เก็บค่า username passwrod */
  session_start();
  require_once('php/connect.php');

  /**เช็คค่าการกดปุ่ม submit มีค่าส่งมาหรือเปล่า */
  if (isset($_POST['submit'])) {
    //ประกาศตัวแปรเก็บค่า
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    //เขียนคำสั่ง sql
    $sql = "SELECT * FROM `admin` WHERE `username` = '".$username."' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    //เช็คว่าเป็นค่าว่างหรือเปล่า และตรวจสอบรหัสผ่าน
    $is_password_valid = false;
    if (!empty($row)) {
      if (password_verify($password, $row['password'])) {
        $is_password_valid = true;
      } else if ($password === $row['password']) {
        // รองรับรหัสผ่านเดิมที่ยังไม่ได้ hash และอัปเดตเป็น hash อัตโนมัติ
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $conn->query("UPDATE `admin` SET `password` = '".$hashed."' WHERE `id` = '".$row['id']."'");
        $is_password_valid = true;
      }
    }

    if ($is_password_valid) {
      $_SESSION['authen_id'] = $row['id'];
      $_SESSION['first_name'] = $row['first_name'];
      $_SESSION['last_name'] = $row['last_name'];
      $_SESSION['status'] = $row['status'];
      $_SESSION['last_login'] = $row['last_login'];

      // อัปเดตเวลาเข้าสู่ระบบล่าสุด
      $update_login = "UPDATE `admin` SET `last_login` = '".date("Y-m-d H:i:s")."' WHERE `id` = '".$row['id']."' ";
      $conn->query($update_login);

      header('Location: pages/dashboard');
    } else {
      echo '<script> alert("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง! กรุณาลองใหม่อีกครั้ง")</script>';
      header('Refresh:0; url=login.php');
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="dist/img/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="dist/img/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="dist/img/favicons/favicon-16x16.png">
  <link rel="manifest" href="dist/img/favicons/site.webmanifest">
  <link rel="mask-icon" href="dist/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="dist/img/favicons/favicon.ico">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-config" content="dist/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login to start your Admin</p>

      <form action="" method="post">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fas fa-lock"></i></span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
        </div>

        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
          <!-- /.col -->
        </div>
        
      </form>

      <div class="mt-3 text-center text-muted">
        <p class="mb-0">username : test</p>
        <p class="mb-0">password : password</p>
      </div>

      <div class="mt-3">
        <a href="your-source-code-link" target="_blank" class="btn btn-dark btn-block" style="background-color: #000000; color: #ffffff; border: 1px solid #000000;">
          <i class="fab fa-github mr-1"></i> Source Code
        </a>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
