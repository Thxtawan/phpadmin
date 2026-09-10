<?php include_once('../authen.php'); ?>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
if (isset($id) && $id != 1) {
    $sql = "DELETE FROM `admin` WHERE `admin`.`id` = '".$id."'";
    $result = $conn->query($sql);

    if ($conn->affected_rows) {
        echo '<script> alert("Finished Deleting!")</script>';
        header('Refresh:0; url=index.php');
    } else {
        echo '<script> alert("NoData !")</script>';
        header('Refresh:0; url=index.php');
    }
} else {
    header('Refresh:0; url=index.php');
}
?>