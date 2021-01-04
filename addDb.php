<?php
require_once('connect.php');

date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d H:i:s');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM `criminal_profile` WHERE `FullName` LIKE '%'$id'%'";
    $res = $con->query($query);

    if (mysqli_num_rows($res) == 1) {

        while ($data1 = $res->fetch_assoc()) {
            $FullName = $data1['FullName'];
            $proId = $data1['id'];
        }
        $qry1 = "INSERT INTO `criminal_history`(`Name`, `Time`, `pro_id`) VALUES ('$FullName','$date','$proId')";
        $result = mysqli_query($con, $qry1)
            or die('Error: ' . mysqli_error($con));

        $response = "Thief Detected";
    } else {
        $response = "Normal Person";
    }
    echo json_encode($response);
}
exit;
