<?php
    session_start();
  include '../config/config.php';

  class controller extends Connection{ 

    public function managecontroller(){ 

            $sql = "SELECT scores.id,scores.date,scores.code,users.firstname, users.lastname FROM scores INNER JOIN users ON scores.users_id=users.id WHERE scores.users_id = '".$_SESSION['id']."'";

                $stmt = $this->conn()->query($sql);
                $stmt->execute([]);
                 
                if($stmt->rowcount() > 0) {
                    $data_arr=array();
                  $i=1;
                    while($row = $stmt->fetch()) {  
                        $data_arr[$i]['events_id'] = $row['id'];
                        $data_arr[$i]['title'] = $row['firstname']." ".$row['lastname'];
                        $data_arr[$i]['start'] = date("Y-m-d", strtotime($row['date']));
                        $data_arr[$i]['end'] = date("Y-m-d", strtotime($row['date']));
                        $data_arr[$i]['color'] = '#'.substr(uniqid(),-6);
                        $data_arr[$i]['code'] = $row['code'];
                        $i++;
                    }
                    
                    $data = array(
                    'status' => true,
                    'msg' => 'successfully!',
                        'data' => $data_arr
                  );

                } else {

                    $data = array(
                    'status' => false,
                    'msg' => 'Error!'               
                    );

                }

                echo json_encode($data);

        } 
    }

  $controllerrun = new controller();
  $controllerrun->managecontroller();
          
?>