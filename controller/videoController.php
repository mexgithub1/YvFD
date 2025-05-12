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

                $sql = "SELECT * FROM video WHERE file = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$file]);
                
                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Video Already Exist');</script>";
                    echo "<script>window.location.href='../admin/video.php';</script>";

                } else {

                    $sql = "INSERT INTO video (title,file,category) VALUES (?,?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$title,$file,$category]);


                    echo "<script type='text/javascript'>alert('Successfully Add Video');</script>";
                    echo "<script>window.location.href='../admin/video.php';</script>";

                }

            }

            if (isset($_POST['edit'])) {

                $id = $_POST['id'];
                $title = $_POST['title'];
                $file = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], "../videovideo/".$file);
                $category = $_POST['category'];

                if ($file == "") {

                    $sql = "UPDATE video SET title = ?, category = ? WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$title,$category,$id]);

                } else {

                    $sql = "UPDATE video SET title = ?, file = ?, category = ? WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$title,$file,$category,$id]);

                }
                
                echo "<script type='text/javascript'>alert('Successfully Edit Video');</script>";
                echo "<script>window.location.href='../admin/video.php';</script>";

            }

            if (isset($_POST['delete'])) {

                    $id = $_POST['id'];

                    $sql = "DELETE FROM video WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$id]);


                    echo "<script type='text/javascript'>alert('Successfully Delete Video');</script>";
                    echo "<script>window.location.href='../admin/video.php';</script>";
                
            } 

            if (isset($_POST['setbookmark'])) {

                $users_id = $_SESSION['id'];
                $video_id = $_POST['id'];

                $sql = "SELECT * FROM bookmark_video WHERE users_id = ? AND video_id = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$users_id,$video_id]);
                
                if ($stmt->rowcount() > 0) {

                    $sql = "DELETE FROM bookmark_video WHERE users_id = ? AND video_id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$users_id,$video_id]);

                } else {

                    $sql = "INSERT INTO bookmark_video (users_id,video_id) VALUES (?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$users_id,$video_id]);

                }

            }

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
