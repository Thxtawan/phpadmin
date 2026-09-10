<?php 
$db_host = 'sql210.infinityfree.com'; // Replace with your actual database host
$db_user = 'if0_42361404'; // Replace with your actual database username
$db_pass = '7iyq3bTyjEgcAB'; // Replace with your actual database password
$db_name = 'if0_42361404_workshop'; // Replace with your actual database name

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . $conn->connect_error);
}

$conn->set_charset('utf8');
date_default_timezone_set('Asia/Bangkok');
?>