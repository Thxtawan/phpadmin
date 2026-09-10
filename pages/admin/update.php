<?php include_once('../authen.php'); ?>
<?php
if (isset($_POST['submit'])) { # เช็คว่ามีการกดปุ่ม submit หรือไม่
    // ถ้ามีการกรอกรหัสผ่านใหม่ ให้ hash แล้วรวมเข้าไปใน SQL
    $passwordSql = ''; # ตัวแปรสำหรับเก็บ SQL สำหรับอัปเดตรหัสผ่าน
    if (!empty($_POST['password'])) { # ถ้ามีการกรอกรหัสผ่านใหม่ ให้ hash แล้วรวมเข้าไปใน SQL
        $hashed = password_hash($_POST['password'], PASSWORD_DEFAULT); # เข้ารหัส password ก่อนทำการ update ลงฐานข้อมูล
        $passwordSql = "`password` = '" . $hashed . "', "; # สร้าง SQL สำหรับอัปเดตรหัสผ่าน
    }
    $sql = "UPDATE `admin` 
            SET `first_name` = '".$_POST['first_name']."', 
                `last_name` = '".$_POST['last_name']."', 
                ".$passwordSql."
                `status` = '".$_POST['status']."', 
                `updated_at` = '".date("Y-m-d H:i:s")."' 
            WHERE `id` = '".$_POST['id']."';";

    $result = $conn->query($sql);
    if ($result) {
        echo '<script> alert("Finished Updating!")</script>';
        header('Refresh:0; url=index.php');
    } else {
        echo '<script> alert("Update Error!")</script>';
        header('Refresh:0; url=index.php');
    }
} else {
    header('Refresh:0; url=index.php');
}
?>