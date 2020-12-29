<?php
require_once('connect.php');

$id = $_GET['id']; // $id is now defined

$qry = "DELETE FROM `criminal_profile` WHERE `id`='" . $id . "'";

$result = mysqli_query($con, $qry)
    or die('Error: ' . mysqli_error($con));

mysqli_close($con);
header("Location: tables.php");
