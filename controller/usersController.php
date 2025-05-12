<?php
    session_start();
    include '../config/config.php';

    class controller extends Connection{

        public function managecontroller(){

            if (isset($_POST['add'])) {

                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $department = $_POST['department'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $passwordtxt = $_POST['password'];

                $sql = "SELECT * FROM users WHERE email = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$email]);
                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('User Already Exist');</script>";

                } else {

                    $sql = "INSERT INTO users (firstname,lastname,email,password,passwordtxt,type,department) VALUES (?,?,?,?,?,?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$firstname,$lastname,$email,$password,$passwordtxt,1,$department]);

                    echo "<script type='text/javascript'>alert('Successfully Add User');</script>";

                }

                echo "<script>window.location.href='../admin/users.php';</script>";

            }


            if (isset($_POST['edit'])) {

                $id = $_POST['id'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $department = $_POST['department'];
                $status = $_POST['status'];

                $sql = "UPDATE users SET firstname = ?, lastname = ?, email = ?, department = ?, status = ? WHERE id = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$firstname,$lastname,$email,$department,$status,$id]);
           
                echo "<script type='text/javascript'>alert('Successfully Edit User');</script>";
                echo "<script>window.location.href='../admin/users.php';</script>";

            }

            if (isset($_POST['delete'])) {

                $id = $_POST['id'];

                $sql = "DELETE FROM users WHERE id = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$id]);

                echo "<script type='text/javascript'>alert('Successfully Delete User');</script>";
                echo "<script>window.location.href='../admin/users.php';</script>";
                
            }

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
