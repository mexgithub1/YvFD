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
        <div style="width: 100%;text-align: center;color: green;font-size: 20px;">
          Your Assessment: <?php echo $_GET['score']; ?>
          It seems like you might be going through a tough time. We're here for you—please share your details with us so we can reach out and support you.
        </div> 
      </div>
    </div>
    <div class="login-box-body" style="padding: 50px 30px;width: 100%;">
      <h3 class="login-box-msg">Fill up Form</h3>
      <br>
      <form action="controller/depressedController.php" method="POST">
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="text" name="fullname" placeholder="Full Name" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
          </div>
          <div class="form-group has-feedback form-control" style="height: 45px;">
            <input type="email" name="email" placeholder="Email" style="width: 100%;height: 100%;border: unset;box-shadow: none;outline-style: none;" required>
            <span class="fa fa-at form-control-feedback" style="margin-top: 6px;"></span>
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
                <button type="submit" class="btn btn-block btn-flat submit" style="background: #ebc09a; color: #fff; border: unset;height: 45px;font-size: 23px;" name="submit">Submit</button>
              </div>
          </div>
      </form>
      <br>
    </div>
</div>

</body>
</html>
