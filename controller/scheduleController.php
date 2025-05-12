<?php
    session_start();
    include '../config/config.php';

    class controller extends Connection{

        public function managecontroller(){

            if (isset($_POST['edit'])) {

                $schedule_id = $_POST['schedule_id'];
                $date = $_POST['date'];

                $sqlinsert = "UPDATE schedule SET date = ? WHERE schedule_id = '".$schedule_id."'";
                $statementinsert = $this->conn()->prepare($sqlinsert);
                $statementinsert->execute([$date]);
           
                echo "<script type='text/javascript'>alert('Successfully Edit Schedule');</script>";
                echo "<script>window.location.href='../admin/schedule.php';</script>";

            }

        }

    }

    $controllerrun = new controller();
    $controllerrun->managecontroller();

?>
