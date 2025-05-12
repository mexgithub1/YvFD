<?php
    session_start();
    include '../config/config.php';

    class controller extends Connection{

        public function managecontroller(){

            if (isset($_POST['add'])) {

                $title = $_POST['title'];
                $file = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], "../audiovideo/".$file);
                $category = $_POST['category'];

                $sql = "SELECT * FROM audio WHERE file = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$file]);
                
                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Audio Already Exist');</script>";
                    echo "<script>window.location.href='../admin/audio.php';</script>";

                } else {

                    $sql = "INSERT INTO audio (title,file,category) VALUES (?,?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$title,$file,$category]);


                    echo "<script type='text/javascript'>alert('Successfully Add Audio');</script>";
                    echo "<script>window.location.href='../admin/audio.php';</script>";

                }

            }

            if (isset($_POST['edit'])) {

                $id = $_POST['id'];
                $title = $_POST['title'];
                $file = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], "../audiovideo/".$file);
                $category = $_POST['category'];

                if ($file == "") {

                    $sql = "UPDATE audio SET title = ?, category = ? WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$title,$category,$id]);

                } else {

                    $sql = "UPDATE audio SET title = ?, file = ?, category = ? WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$title,$file,$category,$id]);
                    
                }

           
                echo "<script type='text/javascript'>alert('Successfully Edit Audio');</script>";
                echo "<script>window.location.href='../admin/audio.php';</script>";

            }

            if (isset($_POST['delete'])) {

                    $id = $_POST['id'];

                    $sql = "DELETE FROM audio WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$id]);


                    echo "<script type='text/javascript'>alert('Successfully Delete Audio');</script>";
                    echo "<script>window.location.href='../admin/audio.php';</script>";
                
            }

            if (isset($_POST['setbookmark'])) {

                $users_id = $_SESSION['id'];
                $audio_id = $_POST['id'];

                $sql = "SELECT * FROM bookmark_audio WHERE users_id = ? AND audio_id = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$users_id,$audio_id]);
                
                if ($stmt->rowcount() > 0) {

                    $sql = "DELETE FROM bookmark_audio WHERE users_id = ? AND audio_id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$users_id,$audio_id]);

                } else {

                    $sql = "INSERT INTO bookmark_audio (users_id,audio_id) VALUES (?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$users_id,$audio_id]);

                }

            }

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
