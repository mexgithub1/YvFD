<?php
    include '../config/config.php';

    class controller extends Connection{

        public function managecontroller(){

            if (isset($_POST['register'])) {

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $middlename = $_POST['middlename'];
                $phone_number = $_POST['phone_number'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $passwordtxt = $_POST['password'];
                $confirmpassword = $_POST['confirmpassword'];

                if ($_POST['password'] != $_POST['confirmpassword']) {
                 
                    echo "<script type='text/javascript'>alert('Password Not Match');</script>";
                    echo "<script>window.location.href='../register.php';</script>";
                
                } else {

                    $sql = "SELECT * FROM users WHERE email = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$email]);
                    
                    if ($stmt->rowcount() > 0) {

                        echo "<script type='text/javascript'>alert('Account Already Exist');</script>";
                        echo "<script>window.location.href='../register.php';</script>";

                    } else {

                        $sql = "INSERT INTO users (firstname,lastname,middlename,phone_number,age,gender,email,password,passwordtxt) VALUES (?,?,?,?,?,?,?,?,?)";
                        $stmt = $this->conn()->prepare($sql);
                        $stmt->execute([$firstname,$lastname,$middlename,$phone_number,$age,$gender,$email,$password,$passwordtxt]);
                   
                        echo "<script type='text/javascript'>alert('Successfully Register');</script>";
                       echo "<script>window.location.href='../login.php';</script>";

                    }

                }

                

            }

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
