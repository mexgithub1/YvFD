<?php
    
    include '../config/config.php';
    session_start();
    class controller extends Connection{

        public function managecontroller(){


            if (isset($_POST['save'])) {

                $id = $_SESSION['id'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone_number = $_POST['phone_number'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $img = $_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'], "../images/".$img);
                            
                if ($img == '') {
                    $sql = "UPDATE users SET firstname = ?, lastname = ?, phone_number = ?, age = ?, gender = ?, email = ?, password = ?, passwordtxt = ? WHERE id = '".$id."'";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$firstname,$lastname,$phone_number,$age,$gender,$email,$password,$_POST['password']]);
            
                } else {
                    $sql = "UPDATE users SET img = ?, firstname = ?, lastname = ?, phone_number = ?, age = ?, gender = ?, email = ?, password = ?, passwordtxt = ? WHERE id = '".$id."'";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$img,$firstname,$lastname,$phone_number,$age,$gender,$email,$password,$_POST['password']]);
                }
                    
            }

            echo "<script>window.location.href='../admin/dashboard.php';</script>";

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
