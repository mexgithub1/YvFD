<?php
    session_start();
    include '../config/config.php';

    class controller extends Connection{

        public function managecontroller(){

            if (isset($_POST['add'])) {

                $title = $_POST['title'];
                $file = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], "../files/".$file);
                $category = $_POST['category'];

                $sql = "SELECT * FROM readables WHERE file = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$file]);
                
                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('File Already Exist');</script>";
                    echo "<script>window.location.href='../admin/readables.php';</script>";

                } else {

                    $sql = "INSERT INTO readables (title,file,category) VALUES (?,?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$title,$file,$category]);


                    echo "<script type='text/javascript'>alert('Successfully Add File');</script>";
                    echo "<script>window.location.href='../admin/readables.php';</script>";

                }

            }

            if (isset($_POST['edit'])) {

                $id = $_POST['id'];
                $title = $_POST['title'];
                $file = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], "../files/".$file);
                $category = $_POST['category'];

                if ($file == "") {

                    $sql = "UPDATE readables SET title = ?, category = ? WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$title,$category,$id]);

                } else {

                    $sql = "UPDATE readables SET title = ?, file = ?, category = ? WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$title,$file,$category,$id]);
                    
                }

           
                echo "<script type='text/javascript'>alert('Successfully Edit File');</script>";
                echo "<script>window.location.href='../admin/readables.php';</script>";

            }

            if (isset($_POST['delete'])) {

                    $id = $_POST['id'];

                    $sql = "DELETE FROM readables WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$id]);


                    echo "<script type='text/javascript'>alert('Successfully Delete File');</script>";
                    echo "<script>window.location.href='../admin/readables.php';</script>";
                
            }

            if (isset($_POST['setbookmark'])) {

                $users_id = $_SESSION['id'];
                $readables_id = $_POST['id'];

                $sql = "SELECT * FROM bookmark_readables WHERE users_id = ? AND readables_id = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$users_id,$readables_id]);
                
                if ($stmt->rowcount() > 0) {

                    $sql = "DELETE FROM bookmark_readables WHERE users_id = ? AND readables_id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$users_id,$readables_id]);

                } else {

                    $sql = "INSERT INTO bookmark_readables (users_id,readables_id) VALUES (?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$users_id,$readables_id]);

                }

            }

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
