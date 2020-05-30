<?php
require "application/library/class.smtp.php";
require 'application/library/class.phpmailer.php';// Đường dẫn tới file class.phpmailer.php
require 'application/library/PHPMailerAutoload.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
//$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPOptions = array(
   'ssl' => array(
     'verify_peer' => false,
     'verify_peer_name' => false,
     'allow_self_signed' => true
    )
);
$mail->Port = 587;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';
 
$mail->Username = "dienmaytriplet@gmail.com";
$mail->Password = "triplet123456";
 
$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
 
$mail->From = "dienmaytriplet@gmail.com";
$mail->FromName = "Dien may triplet";
 
$mail->addAddress("nguyennhuttien1998@gmail.com","Nguyen Nhut Tien");
// $mail->addAddress("user.2@gmail.com","User 2");
 
// $mail->addCC("user.3@ymail.com","User 3");
// $mail->addBCC("user.4@in.com","User 4");
$mail->AddReplyTo('dienmaytriplet@gmail.com', 'Dien may TRIPLET'); //khi nguoi dung phan hoi se duoc gui den email nay
$mail->Subject = "Nhan mat khau moi";
$mail->Body = "Hi,<br /><br />This system is working perfectly.";
 
if(!$mail->Send())
 echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
 echo "Message has been sent";
?>