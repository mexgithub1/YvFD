<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once "PHPMailer.php";
require_once "SMTP.php";
require_once "Exception.php";



  $mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "harvestingsuccessph@gmail.com";
$mail->Password = 'h4rV3stiNgSucC388@PH';
$mail->Port = 587;
$mail->SMTPSecure = "tls";

$mail->isHTML(true);
$mail->setFrom('harvestingsuccessph@gmail.com', 'SESL');     
$mail->addAddress('harvestingsuccessph@gmail.com');
$mail->Subject = "SESL Subscription";
$mail->Body    = '
      <div style="text-align:center;font-size:24px;">
      Good day!<br><br>
     <div style="background-color:#222549;border-radius:20px;width:300px;margin:auto;color:#fff;font-size:24px;padding:20px 10px;">Your Subscription has been Expired</div></div>';



if ($mail->send()) {
	echo "success";
}else{
	echo "error";
}
?>