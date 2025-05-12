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
<body class="hold-transition login-page">
<div class="login-box" style="display: flex;">
    <div class="login-box-body" style="padding: 50px 30px;width: 100%;display: grid;place-items: center;">
      <div>
        <div style="width: 100%;text-align: center;">
          <img src="images/logo.png" width="100px">
        </div> 
        <br>

        <?php if (isset($_GET['score'])) { ?>
        <div style="width: 100%;text-align: center;color: green;font-size: 20px;">
          Assessment results: <?php echo $_GET['score']; ?>
          Your 
          <?php  if ($_GET['score'] >= 0 && $_GET['score'] <= 39) {
            echo "responses fall within the typical range—everything looks good! If you’d like to save your results and explore more features, consider creating a YouValue account to continue your wellness journey";
          }else if ($_GET['score'] >= 40 && $_GET['score'] <= 90) {
              echo "responses suggest that you may be dealing with intense anxiety, and you're not alone in this. Creating a YouValue account can help you track your progress, access support, and take meaningful steps toward feeling better.";
          } ?>
        </div> 
        <?php } ?>
      </div>
    </div>
    <div class="login-box-body" style="padding: 50px 30px;width: 100%;">
      <div style="display: flex;justify-content: space-evenly;padding: 0px 50px;">
        <h3 class="text-center" style="width: 100%;padding: 5px;"><a href="login.php" class="text-decoration-none" style="color: #000;">Login</a></h3>

        <h3 class="text-center" style="border-bottom: 3px solid #ebc09a;width: 100%;padding: 5px;"><a href="register.php" class="text-decoration-none" style="color: #000;">Signup</a></h3>
        
      </div>
      <br>
      <p class="login-box-msg">Create an account?</p>
      <br>
      <form action="controller/registerController.php" method="POST">
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="text" name="firstname" placeholder="First Name" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="text" name="lastname" placeholder="Last Name" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="text" name="middlename" placeholder="Middle Name" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="email" name="email" placeholder="Email" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
            <span class="fa fa-at form-control-feedback" style="margin-top: 6px;"></span>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group has-feedback form-control" style="height: 45px;margin-bottom: 10px;">
                <input type="password" name="password" id="password" placeholder="******" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
                <i class="fa fa-eye-slash toggle-password" style="position: absolute; right: 15px; top: 10px; cursor: pointer;margin-top: 6px;"></i>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group has-feedback form-control" style="height: 45px;">
                <input type="password" name="confirmpassword" placeholder="******" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
                <i class="fa fa-eye-slash toggle-password2" style="position: absolute; right: 15px; top: 10px; cursor: pointer;margin-top: 6px;"></i>
              </div>
            </div>
          </div>          
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="text" name="phone_number" placeholder="Phone Number" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="number" name="age" placeholder="Age" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <select name="gender" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="row">
          <div class="col-xs-12">
                <button type="submit" class="btn btn-block btn-flat submit" style="background: #ebc09a; color: #fff; border: unset;height: 45px;font-size: 23px;" name="register">Signup</button>
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
