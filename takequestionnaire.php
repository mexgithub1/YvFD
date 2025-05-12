<?php
    include 'config/config.php';
    class data extends Connection { 
        public function managedata() { 
            $datetake = date('Y-m-d');

            $sql = "SELECT * FROM users WHERE datetake = ?";
            $stmt = $this->conn()->prepare($sql);
            $stmt->execute([$datetake]);

            if ($stmt->rowCount() > 0) {
            } else {
                $sql = "UPDATE users SET datetake = ?, totaltake = ? WHERE datetake IS NULL OR datetake != ?";
                $stmt = $this->conn()->prepare($sql);
                $stmt->execute([$datetake, 0, $datetake]);

            }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>YouValue</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
 <style>
    .form-group {
      position: relative;
    }
    .toggle-password {
      position: absolute;
      right: 15px;
      top: 12px;
      cursor: pointer;
    }
  </style>
<body class="hold-transition login-page" style="background-color: #fff;">
    <div class="login-box-body" style="padding: 20px 30px;height: 100vh;">
    	<h2 style="color:#000;font-weight: bold;margin-top: unset;">Questions</h2>

        <?php if(isset($_GET['score'])): ?>
        <div style="width: 100%;text-align: center;color: green;font-size: 20px;">
            Your Assessment: <?php echo $_GET['score']; ?>
            It seems like you might be going through a tough time. We're here for you—please share your details with us so we can reach out and support you.
          </div> 
          <br>
      <?php endif; ?>
      <div class="box-body">
 

            <form method="POST" action="controller/takequestionnaireController.php">
                <?php
				$sql = "SELECT * FROM questionnaires ORDER BY RAND() LIMIT 10";
                $stmt = $this->conn()->query($sql);
                while ($row = $stmt->fetch()) {
                    $id = $row['id']; 
                ?>
                <div class="bg-light col-lg-6 p-3 m-3">
                    <h4 style="color:#000;font-weight: bold;"><?php echo $row['questions']; ?></h4>
                    
                    <div style="padding: 4px;">
                        <input type="radio" name="choice[<?php echo $id; ?>]" value="<?php echo $row['choice1']; ?>"> <?php echo $row['choice1']; ?>
                    </div>
                    <div style="padding: 4px;">
                        <input type="radio" name="choice[<?php echo $id; ?>]" value="<?php echo $row['choice2']; ?>"> <?php echo $row['choice2']; ?>
                    </div>
                    <div style="padding: 4px;">
                        <input type="radio" name="choice[<?php echo $id; ?>]" value="<?php echo $row['choice3']; ?>"> <?php echo $row['choice3']; ?>
                    </div>
                    <div style="padding: 4px;">
                        <input type="radio" name="choice[<?php echo $id; ?>]" value="<?php echo $row['choice4']; ?>"> <?php echo $row['choice4']; ?>
                    </div>

                    <input type="hidden" name="answer[<?php echo $id; ?>]" value="<?php echo $row['answers']; ?>">
                </div>          
                <?php } ?>
                <div class="text-right">
                    <button type="submit" name="takequiz" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>

            <h3>Assessment Results:</h3>
      </div>
    </div>

<script src="dist/js/jquery.js"></script>

</body>
</html>
<?php } } $data = new data(); $data->managedata(); ?>