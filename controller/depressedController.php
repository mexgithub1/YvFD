<?php
    include '../config/config.php';

    class controller extends Connection{

        public function managecontroller(){

            if (isset($_POST['submit'])) {

                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $phone_number = $_POST['phone_number'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];

                $sql = "INSERT INTO depressed (fullname,email,phone_number,age,gender) VALUES (?,?,?,?,?)";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$fullname,$email,$phone_number,$age,$gender]);
           
                echo "<script type='text/javascript'>alert('Successfully Submit Form');</script>";
                echo "<script>window.location.href='../login.php';</script>";
            
            }

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
