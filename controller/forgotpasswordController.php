<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once "../sendphpmailer/PHPMailer.php";
require_once "../sendphpmailer/SMTP.php";
require_once "../sendphpmailer/Exception.php";
  include '../config/config.php';
  session_start();
    
  class forgotpassword extends Connection{
  
    public function forgotpassworduser(){ 

      if (isset($_POST['sendemail'])) {

        $email = $_POST['email'];

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn()->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowcount() > 0) {

          $row = $stmt->fetch();

          $code = rand(00000,99999);

          $sqlselect_users = "UPDATE users SET code = ? WHERE email = '".$email."'";
          $stmt = $this->conn()->prepare($sqlselect_users);
          $stmt->execute([$code]);

          $mail = new PHPMailer();

          $mail->isSMTP();
          $mail->Host = "smtp.gmail.com";
          $mail->SMTPAuth = true;
          // $mail->Username = "sorar384@gmail.com";
          // $mail->Password = 'ukjqeppzrfugeqgx';
          $mail->Username = "sorar384@gmail.com";
          $mail->Password = 'ukjqeppzrfugeqgx';
          $mail->Port = 587;
          $mail->SMTPSecure = "tls";

          $mail->isHTML(true);
          $mail->setFrom($email);
          $mail->addAddress($email);
          $mail->Subject = "Change Password";
          $mail->Body = "Click <a href='http://localhost/youvalue/changepassword.php?code=".$code."'>Here</a> to change Your password";
          $mail->send();


                echo "<script type='text/javascript'>alert('Check your Email');</script>";
                echo "<script>window.location.href='../login.php';</script>";


        } else {

            echo "<script type='text/javascript'>alert('Invalid Email');</script>";
            echo "<script>window.location.href='../forgotpassword.php';</script>";

        } 
       
      } 
         
    }

  }

  $forgotpasswordrun = new forgotpassword();
  $forgotpasswordrun->forgotpassworduser();

?>



