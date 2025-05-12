<?php 
  session_start();
  include '../config/config.php';
  class data extends Connection{ 
    public function managedata(){ 
?>
<!DOCTYPE html>
<html>
<head><?php include 'head.php'; ?></head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'profile.php'; ?>
    <?php include 'sidebar.php'; ?>
    <div class="content-wrapper" style="height: 100vh;background-color: #f9f9f9;overflow-y: auto;">
      <section class="content">
        <div class="row" style="display: flex;">
        <div class="left_messages col-xs-3">
          <div class="box">
            <div class="box-header with-border">
             Messages
            </div>
            <div class="box-body">
              <?php
              if ($_SESSION['type'] == 1) {
                $sql = "SELECT *,users.id AS users_id FROM users INNER JOIN chat_code ON users.id=chat_code.sender_id WHERE users.type = 1 AND chat_code.receiver_id = '".$_SESSION['id']."' OR users.type = 0 AND chat_code.receiver_id = '".$_SESSION['id']."'";
              } else {
                $sql = "SELECT *,users.id AS users_id FROM users WHERE type = 1";
              }
                  
                
                $stmt = $this->conn()->query($sql);
                while ($row = $stmt->fetch()) { ?>
                  <a href="messages.php?id=<?php echo $row['users_id'] ?>">                    
                    <div class="holdleft" style="display: flex;position: relative;margin-top: 30px;">
                      <div><img src="../images/<?php echo $row['img'] ?>" width="40px" style="border-radius: 50%;"></div>
                      <div class="desktop_name" style="margin-top: 10px;margin-left: 5px;font-weight: bold;font-weight: bold;color: #000;font-style: normal"><?php echo $row['firstname']." ".$row['lastname']; ?></div>
                      <div class="mobile_name"><?php echo $row['firstname']." ".$row['lastname']; ?></div>
                    </div>
                  </a>
              <?php } ?>
            </div>
          </div>
        </div>
        <?php
         if (isset($_GET['id'])) {  
                $sql = "SELECT * FROM users WHERE id = '".$_GET['id']."'";
                $stmt = $this->conn()->query($sql);
                $stmt->execute([]);
                $row2 = $stmt->fetch();
              }
        ?>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
             Messages
            </div>
            <div class="box-body">
              <div class="chat">
                  <?php  if (isset($_GET['id'])) {  ?>
                  <div class="name" style="font-weight: bold;"><img src="../images/<?php echo $row2['img'] ?>" width="50px" style="border-radius: 50%;"> <?php echo $row2['firstname']." ".$row2['lastname']; ?>asd</div>
                
                  <?php if (isset($_GET['id'])) { ?>
                        <div class="box_data_wrapper">
                          <div class="box_data">
                      </div>
                      </div>
                  <?php }else{ ?> 
                      <div class="box_data_wrapper2">
                      </div>
                  <?php } ?>
                  <div id="imagePreview"></div>
                  <form style="display: flex;" enctype="multipart/form-data">

                      <input type="hidden" id="sender_id" value="<?php echo $_SESSION['id'] ?>">
                      <input type="hidden" id="receiver_id" value="<?php echo $_GET['id'] ?>">

                      <input type="text" id="message" class="form-control mr-2 message border-0" placeholder="Message...">
                      <button type="button" id="chat" class="btn ml-2" style="background:linear-gradient(-180deg,#f53d2d,#f63);color: #fff;"><i class="fas fa-paper-plane"></i></button>
                  </form>
                  <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>
    </div>
  </div>

  <?php include 'footer.php'; ?>
  
  <script>
    var scrollPosition = 0;

    function loadingdata() {
      $.ajax({
          url: 'messages_data.php',
          method: 'POST',
          cache: false,
          data: {
              sender_id: $('#sender_id').val(),
              receiver_id: $('#receiver_id').val()
          },
          success: function(data) {
              var objDiv = $('.box_data_wrapper');
              var isScrolledToBottom = objDiv.prop('scrollHeight') - objDiv.scrollTop() === objDiv.innerHeight();
              scrollPosition = isScrolledToBottom ? objDiv.prop('scrollHeight') : objDiv.scrollTop();
              $('.box_data').html(data);

              if (isScrolledToBottom) {
                  scrollToBottom();
              } else {
                  objDiv.scrollTop(scrollPosition);
              }
          }
      });
    }

    setInterval(function() {
        loadingdata();
    }, 1000);

    function scrollToBottom() {
        var objDiv = $('.box_data_wrapper');
        objDiv.scrollTop(objDiv.prop('scrollHeight'));
    }

    $(document).ready(function() {
      loadingdata();
    });

    $('#chat').click(function() {
      const formData = new FormData();
      formData.append('message', $('#message').val());
      formData.append('sender_id', $('#sender_id').val());
      formData.append('receiver_id', $('#receiver_id').val());
      $.ajax({
        url: '../controller/send_controller.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
        },
        error: function(xhr, status, error) {
        }
      });
      $('#message').val('');
    });


    $('form input').keydown(function (e) {
      if (e.keyCode == 13) {
        e.preventDefault();
        const formData = new FormData();
        formData.append('message', $('#message').val());
        formData.append('sender_id', $('#sender_id').val());
        formData.append('receiver_id', $('#receiver_id').val());
        $.ajax({
          url: '../controller/send_controller.php',
          method: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function(data) {
          },
          error: function(xhr, status, error) {
          }
        });
        $('#message').val('');
      }
    });

  </script>

</body>
</html>
<?php } } $data = new data(); $data->managedata(); ?>