<?php
  require_once "vendor/autoload.php";
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->isSMTP();
  $mail->Host = "smtp.example.com";
  $mail->SMTPAuth = true;
  $mail->Username = "inclassusach@gmail.com";
  $mail->Password = "inclassusach123";
  $mail->SMTPSecure = "tls";
  $mail->Port = 587;
  $mail->setFrom("inclassusach@gmail.com", "InClass Usach");
  $mail->addAddress("franciscousach85@gmail.com", "Francisco Guerrero");
  $mail->Subject = "Test email";
  $mail->Body = "This is a test email.";
  if($mail->send()) {
    echo "Email sent successfully.";
  } else {
    echo "Email sending failed.";
  }
?>