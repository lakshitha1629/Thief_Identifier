<?php
require_once('connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d H:i:s');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM `criminal_profile` WHERE `NIC`='$id'";
    $res = $con->query($query);

    if (mysqli_num_rows($res) == 1) {

        while ($data1 = $res->fetch_assoc()) {
            $FullName = $data1['FullName'];
            $proId = $data1['id'];
        }
        $qry1 = "INSERT INTO `criminal_history`(`Name`, `Time`, `pro_id`) VALUES ('$FullName','$date','$proId')";
        $result = mysqli_query($con, $qry1)
            or die('Error: ' . mysqli_error($con));

        //============================ Mail Fun
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = 'provisioalert@gmail.com'; // YOUR gmail email
            $mail->Password = 'gmasata94p'; // YOUR gmail password

            // Sender and recipient settings
            $mail->setFrom('provisioalert@gmail.com', 'Provisio');
            $mail->addAddress('tasilnimashan@gmail.com', '');
            $mail->addReplyTo('provisioalert@gmail.com', 'Provisio'); // to set the reply to

            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject = "Provisio - Intelligent Criminal Detector";
            $mail->Body = '<b>Warning:</b> A Criminal Face Detected. Check your system and do the needful immediately.!!';
            $mail->AltBody = 'Provisio - Intelligent Criminal Detector';

            $mail->send();
            // echo "Email message sent.";

        } catch (Exception $e) {
            // echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }
        $response = "Thief Detected.<br> <strong style='font-size: 20px;'>$FullName</strong>";
    }
    // else {
    //     $response = "Normal Person";
    // }
    echo json_encode($response);
}
exit;
