<?php

  include '../config/config.php';
  session_start();
    
  class changepassword extends Connection{
  
    public function changepassworduser(){ 

      if (isset($_POST['changepassword'])) {

        $code = $_POST['code'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $passwordtxt = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        if ($passwordtxt != $confirmpassword) {
        
          echo "<script type='text/javascript'>alert('Password Not Match');</script>";
          echo "<script>window.location.href='../changepassword.php?code=".$code."';</script>";
       
        }else{

          $sql = "UPDATE users SET password = ?, passwordtxt = ?, code = ? WHERE code = '".$code."'";
          $stmt = $this->conn()->prepare($sql);
          $stmt->execute([$password,$passwordtxt,0]);
          echo "<script type='text/javascript'>alert('Successfully Change Password');</script>";
          echo "<script>window.location.href='../login.php';</script>";
        }

      } 
         
    }

  }

  $changepasswordrun = new changepassword();
  $changepasswordrun->changepassworduser();

?>



