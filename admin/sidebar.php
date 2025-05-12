<style>
  .main-sidebar a{
  color:#000 !important;
}
</style>
<aside class="main-sidebar" style="padding-top: unset;">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li style="background: #fff;color: #fff;text-align: center;padding: 20px;">
      <img src="../images/logo.png" width="100px"></li>
      <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <?php if($_SESSION['type'] == 2): ?>
        <li><a href="questionnaires.php"><i class="fa fa-list"></i> <span>Questionnaires</span></a></li>
        <li><a href="faculty.php"><i class="fas fa-users"></i> <span>Faculty</span></a></li>
      <?php endif; ?>

      <?php if($_SESSION['type'] == 0 || $_SESSION['type'] == 2): ?>
        <li><a href="audio.php"><i class="fas fa-volume-up"></i> <span>Wellbeing Audio Hub</span></a></li>
        <li><a href="video.php"><i class="fas fa-video"></i> <span>Mindful Watch</span></a></li>
        <li><a href="readables.php"><i class="fas fa-file"></i> <span>Supportive Reads</span></a></li>
      <?php endif; ?>

      <?php if($_SESSION['type'] == 0): ?>
        <li><a href="calendar.php"><i class="far fa-calendar"></i> <span>My Wellness Calendar</span></a></li>
      <?php endif; ?>

      <?php if($_SESSION['type'] == 1 || $_SESSION['type'] == 2): ?>
        <li><a href="students.php"><i class="fas fa-users"></i> <span>Student List</span></a></li>
      <?php endif; ?>

      <?php if($_SESSION['type'] == 1): ?>
        <li><a href="messages.php"><i class="fas fa-sms"></i> <span>Messages</span></a></li>
        <li><a href="depressed.php"><i class="fas fa-users"></i> <span>Depressed Students</span></a></li>
      <?php endif; ?>

      <?php if($_SESSION['type'] == 0): ?>
        <?php $sql2 = "SELECT * FROM scores WHERE users_id = ? AND score <= ?";
         $stmt2 = $this->conn()->prepare($sql2);
         $stmt2->execute([$_SESSION['id'],69]);
         if ($stmt2->rowCount() > 0) { ?>
          <li><a href="messages.php"><i class="fas fa-sms"></i> <span>Talk to Us!</span></a></li>
        <?php } ?>
      <?php endif; ?>
      
      <li><a href="../logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    </ul>

    <ul class="sidebar-menu" style="position: absolute;bottom: 0;">
      <li>
        <?php
        $sql = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
        $stmt = $this->conn()->query($sql);
        $row = $stmt->fetch();
        ?>
        <a href="#profile" data-toggle="modal" id="updateprofile" 
        data-firstname="<?= $row['firstname'] ?>" 
        data-users_id="<?= $row['id'] ?>"
        data-lastname="<?= $row['lastname'] ?>"
        data-phone_number="<?= $row['phone_number'] ?>"
        data-age="<?= $row['age'] ?>"
        data-gender="<?= $row['gender'] ?>"
        data-email="<?= $row['email'] ?>"
        data-password="<?= $row['passwordtxt'] ?>"><img src="../images/<?php echo $row['img'] ?>" width="30px" style="border-radius: 50%;"> <span><?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></span> <i></a>
      </li>
    </ul>
  </section>
</aside>
