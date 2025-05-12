<?php 
include '../config/config.php';

    class add extends Connection{

        public function managadd(){
            
            $message = $_POST['message'];
            
            $sender_id = $_POST['sender_id'];
            $receiver_id = $_POST['receiver_id'];

            $sql = " SELECT * FROM chat_code WHERE sender_id = '$sender_id' AND receiver_id = '$receiver_id' OR sender_id = '$receiver_id' AND receiver_id = '$sender_id'";
            $stmt = $this->conn()->query($sql);
            $stmt->execute([]);
            $row = $stmt->fetch();
            $code = $row['code'];


            if ($stmt->rowcount() > 0) {

                $sqlinsert = " INSERT INTO chat (sender_id,receiver_id,message,code) VALUES (?,?,?,?) ";
                $statementinsert = $this->conn()->prepare($sqlinsert);
                $statementinsert->execute([$sender_id,$receiver_id,$message,$code]);
            }else{
                $code = rand(00000,99999);
                $sqlinsert = " INSERT INTO chat (sender_id,receiver_id,message,code) VALUES (?,?,?,?) ";
                $statementinsert = $this->conn()->prepare($sqlinsert);
                $statementinsert->execute([$sender_id,$receiver_id,$message,$code]);   

                $sqlinsert = " INSERT INTO chat_code (sender_id,receiver_id,code) VALUES (?,?,?) ";
                $statementinsert = $this->conn()->prepare($sqlinsert);
                $statementinsert->execute([$sender_id,$receiver_id,$code]);
            }

            

        }

    }

    $adddata = new add();
    $adddata->managadd();

?>
