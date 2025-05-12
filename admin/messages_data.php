<?php 
include '../config/config.php';

    class data extends Connection{

        public function managdata(){
            date_default_timezone_set('Asia/Manila');

             $sender_id = $_POST['sender_id'];
             $receiver_id = $_POST['receiver_id'];

            $sql = " SELECT * FROM chat_code WHERE sender_id = '".$sender_id."' AND receiver_id = '".$receiver_id."' OR sender_id = '".$receiver_id."' AND receiver_id = '".$sender_id."'";
            $stmt = $this->conn()->query($sql);
            $stmt->execute([]);
            $row = $stmt->fetch();

            if ($stmt->rowcount() > 0) {

            $sql = " SELECT * FROM chat WHERE code = '".$row['code']."' ORDER BY id ASC";
            $stmt = $this->conn()->query($sql);
            $stmt->execute([]);

            while ($row = $stmt->fetch()) {  ?>

                <?php if ($_POST['sender_id'] == $row['sender_id']) { ?>
                    <div style="text-align: center;margin-top: 30px;"><small ><?php echo $row['date'] ?> <?php echo $row['time'] ?></small></div>
                <article class="conversation__view__bubbles">
                    <p class=" chat__right__bubble">
                        
                        <?php

                        if ($row['image'] == "") { ?>
                            
                        <?php } else { ?>
                            <div class="chat__right__bubble">
                                <div style="clear: both;"></div>
                            </div>
                            <div style="clear: both;"></div>
                          
                        <?php } ?>
                        <p class="chat__right__bubble" style="background-color: #007bff;">
                            <span class="text-white"><?php echo $row['message'] ?></span>
                            <div style="clear: both;"></div>
                        </p>
                        <div style="clear: both;"></div>

       

                        
                    </p>
                    
                </article>
                
                <?php }else if ($_POST['receiver_id'] == $row['sender_id']) { ?>
                    <div style="text-align: center;margin-top: 30px;"><small ><?php echo $row['date'] ?> <?php echo $row['time'] ?></small></div>
                    <article class="conversation__view__bubbles2">
                    <p class=" chat__right__bubble2">
                        
                        <?php

                        if ($row['image'] == "") { ?>
                            
                        <?php } else { ?>
                            <div class="chat__right__bubble2">
                                <div style="clear: both;"></div>
                            </div>
                            <div style="clear: both;"></div>
                          
                        <?php } ?>
                        <p class="chat__right__bubble2" style="background-color: #000;">
                            <span style="color: #fff;"><?php echo $row['message'] ?></span>
                            <div style="clear: both;"></div>
                        </p>
                        <div style="clear: both;"></div>

       

                        
                    </p>
                    
                </article>
                <?php } ?>
                

  
                

<?php }  }

        }

    }

    $datadata = new data();
    $datadata->managdata();

?>
