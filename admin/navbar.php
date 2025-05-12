<style>
/* styles.css */
.notification-container {
    position: absolute;
    right: 0;
    top: 50px;
    height: 459px;
    width: 350px;
    background: white;
    box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.2);
    opacity: 0;
    visibility: hidden;
}

.notification-container-show {
    opacity: 1;
    visibility: visible;
}

.notification-header {
    padding: 10px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
}

.notification-item {
    padding: 10px;
    margin: 5px 0;
}

.notification-item:nth-child(odd) {
    background-color: #f0f0f0; /* Grey for odd items */
}

.notification-item:nth-child(even) {
    background-color: white; /* White for even items */
}

</style>
<header class="main-header">
  <a href="#" class="logo">
    MaSPotato
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li>
          <a style="position: relative;cursor: pointer;" class="btnnotif"><i class="fa fa-bell"></i>
            <div class="notification-indicator" style="position:absolute;top: 40%;right: 35%;transform: translate(-40%,-35%);width: 6px;height: 6px;background: red;border-radius: 50%;box-shadow: 0px 0px 3px red;"></div>
            <div class="notification-container">
              <div class="notification-header">
                  <h4 style="color: black;">Notifications</h4>
              </div>
              <div class="datanotification" style="color: #000;overflow-y: auto;height: 398px;padding: 5px;">
                  
              </div>
          </div>
          </a>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <?php
                  $sql = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
          $stmt = $this->conn()->query($sql);
          $row = $stmt->fetch();
                ?>
            <img src="../images/<?php echo $row['img'] ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $row['firstname'] ?></span>
          </a>
          <ul class="dropdown-menu" style="background: linear-gradient(to right, #5d9ba9, #9bda66);">
            <li class="user-header" style="background: linear-gradient(to right, #5d9ba9, #9bda66);">
              <img src="../images/<?php echo $row['img'] ?>" class="img-circle" alt="User Image">
              <p><?php echo $row['firstname'] ?></p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile" data-user_id="<?php echo $_SESSION['id'] ?>" data-firstname="<?php echo $row['firstname'] ?>" data-lastname="<?php echo $row['lastname'] ?>" data-email="<?php echo $row['email'] ?>" data-password="<?php echo $row['passwordtxt'] ?>" >Update</a>
              </div>
              <div class="pull-right">
                <a href="#logout" data-toggle="modal" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>


<div class="modal fade" id="logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Logout</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/categoryController.php">
                <input type="hidden" name="category_id" id="delete_category_id">
                <div class="text-center">
                    <p>Are you sure you want to logout?</p>
                    <h2 class="bold catname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <a href="../logout.php" class="btn btn-success btn-flat" name="add"><i class="fa fa-sign-out"></i> Logout</a>
              </form>
            </div>
        </div>
    </div>
</div>