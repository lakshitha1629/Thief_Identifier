<?php
// $hostname = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'provisio';

$hostname = 'us-cdbr-east-03.cleardb.com';
$username = 'beb8a7043280b3';
$password = '02927e682c5fd43';
$dbname = 'heroku_476a5900c81e182';

$con = new mysqli($hostname, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
