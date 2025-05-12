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
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-box-body" style="padding: 50px 30px;">
      <div style="width: 100%;text-align: center;">
        <img src="images/logo.png" width="100px">
      </div> 
        <h3 class="text-center" style="width: 100%;padding: 5px;"><a href="register.php" class="text-decoration-none" style="color: #5783a5;">Change Password</a></h3>
      <br>
      <br>
      <form action="controller/changepasswordController.php" method="POST">
        <input type="hidden" name="code" value="<?php echo $_GET['code'] ?>">
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="password" name="password" placeholder="******" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
            <i class="fa fa-eye-slash toggle-password" style="position: absolute; right: 15px; top: 10px; cursor: pointer;margin-top: 6px;"></i>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="password" name="confirmpassword" placeholder="******" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
            <i class="fa fa-eye-slash toggle-password2" style="position: absolute; right: 15px; top: 10px; cursor: pointer;margin-top: 6px;"></i>
          </div>
          <div class="row">
          <div class="col-xs-12">
                <button type="submit" class="btn btn-block btn-flat" style="background: #ebc09a; color: #fff; border: unset;height: 45px;font-size: 23px;" name="changepassword">Change Password</button>
              </div>
          </div>
      </form>
      <br>
    </div>
</div>

<script src="dist/js/jquery.js"></script>
<script>
  $(".toggle-password").click(function() {
      $(this).toggleClass("fa-eye-slash fa-eye");
      var input = $(this).prev("input");
      if (input.attr("type") === "password") {
          input.attr("type", "text");
      } else {
          input.attr("type", "password");
      }
  });

  $(".toggle-password2").click(function() {
      $(this).toggleClass("fa-eye-slash fa-eye");
      var input = $(this).prev("input");
      if (input.attr("type") === "password") {
          input.attr("type", "text");
      } else {
          input.attr("type", "password");
      }
  });
</script>
</body>
</html>
