<?php
    session_start();
    include '../config/config.php';

    class controller extends Connection{

        public function managecontroller(){

            if (isset($_POST['add'])) {

                $questions = $_POST['questions'];
                $choice1 = $_POST['choice1'];
                $choice2 = $_POST['choice2'];
                $choice3 = $_POST['choice3'];
                $choice4 = $_POST['choice4'];
                $answers = $_POST['answers'];


                $sql = "SELECT * FROM questionnaires WHERE questions = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$questions]);
                
                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Questions Already Exist');</script>";
                    echo "<script>window.location.href='../admin/questionnaires.php';</script>";

                } else {

                    $sql = "INSERT INTO questionnaires (questions,choice1,choice2,choice3,choice4,answers) VALUES (?,?,?,?,?,?)";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$questions,$choice1,$choice2,$choice3,$choice4,$answers]);


                    echo "<script type='text/javascript'>alert('Successfully Add Questions');</script>";
                    echo "<script>window.location.href='../admin/questionnaires.php';</script>";

                }

            }

            if (isset($_POST['edit'])) {

                $id = $_POST['id'];
                $questions = $_POST['questions'];
                $choice1 = $_POST['choice1'];
                $choice2 = $_POST['choice2'];
                $choice3 = $_POST['choice3'];
                $choice4 = $_POST['choice4'];
                $answers = $_POST['answers'];

                $sql = "UPDATE questionnaires SET questions = ?, choice1 = ?, choice2 = ?, choice3 = ?, choice4 = ?, answers = ? WHERE id = ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$questions,$choice1,$choice2,$choice3,$choice4,$answers,$id]);

           
                echo "<script type='text/javascript'>alert('Successfully Edit Questions');</script>";
                echo "<script>window.location.href='../admin/questionnaires.php';</script>";

            }

            if (isset($_POST['delete'])) {

                    $id = $_POST['id'];

                    $sql = "DELETE FROM questionnaires WHERE id = ?";
                    $stmt = $this->conn()->prepare($sql);
                    $stmt->execute([$id]);


                    echo "<script type='text/javascript'>alert('Successfully Delete Questions');</script>";
                    echo "<script>window.location.href='../admin/questionnaires.php';</script>";
                
            } 

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
