<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




$email=$_REQUEST['id1'];
$subject=$_REQUEST['id2'];
$message=$_REQUEST['id3'];


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
if (empty($_POST["send"])) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'inclassusach@gmail.com';
    $mail->Password = 'kntytdhtustlenox'; // Your gmail app passwordfranciscousach85@gmail.com
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('inclassusach@gmail.com'); // Your gmail
    $mail->addAddress($_REQUEST['id1']);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->send();
    echo
        "
<script>
document.location.href = 'ver_cur_asistencia.php';
</script>
";
}

?>