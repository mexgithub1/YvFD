<?php
  
  include '../config/config.php';
  session_start();
  
  class controller extends Connection{
  
    public function managecontroller(){ 

      if (isset($_POST['signin'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn()->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowcount() > 0) {

          $row = $stmt->fetch();

          if (password_verify($password, $row['password'])) {
            
            $_SESSION['id'] = $row['id'];
            $_SESSION['type'] = $row['type'];

            if ($row['type'] == 2) {

              header('location:../admin/dashboard.php');
            
            } else if ($row['type'] == 1) {

              header('location:../admin/dashboard.php');
              
            } else {
              header('location:../admin/dashboard.php');
            }
            
        
          } else {

            echo "<script type='text/javascript'>alert('Invalid Password');</script>";

          }

        } else {

            echo "<script type='text/javascript'>alert('Invalid Email And Password');</script>";

        } 

        echo "<script>window.location.href='../login.php';</script>";
       
      } 
         
    }

  }
  
  $controllerrun = new controller();
  $controllerrun->managecontroller();

?>



