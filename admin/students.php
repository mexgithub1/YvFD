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
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>List</th>
                    <th>Student</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Points</th>
                    <th>Status</th>
                  </thead>
                  <tbody>
                    <?php $sql = "SELECT * FROM users INNER JOIN scores ON users.id=scores.users_id";
                    $stmt = $this->conn()->query($sql);
                    $id = 1;
                    while ($row = $stmt->fetch()) { ?>
                      <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $row['firstname'] ?> <?php echo $row['middlename'] ?> <?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone_number'] ?></td>
                        <td><?php echo $row['age'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['score'] ?></td>
                        <td>
                          <?php if ($row['score'] >= 1 && $row['score'] <= 49) {
                            echo "Normal";
                          }else if ($row['score'] >= 50 && $row['score'] <= 69) {
                            echo "Anxiety";
                          }else if ($row['score'] >= 70 && $row['score'] <= 90) {
                            echo "Depressed";
                          } ?>
                        </td>
                      </tr>
                    <?php $id++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
<?php } } $data = new data(); $data->managedata(); ?>