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
              <?php $sql = "SELECT * FROM scores INNER JOIN users ON scores.users_id=users.id WHERE scores.code = '".$_GET['code']."'";
              $stmt = $this->conn()->query($sql);
              $row = $stmt->fetch(); ?>
              <div class="box-header with-border">
                 <h3>Full Name: <?php echo $row['firstname'] ?> <?php echo $row['lastname'] ?></h3>
              </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <th>Points</th>
                    <th>Status</th>
                    <th>Date</th>
                  </thead>
                  <tbody>
                    <?php $sql = "SELECT * FROM scores WHERE code = '".$_GET['code']."'";
                    $stmt = $this->conn()->query($sql);
                    while ($row = $stmt->fetch()) { ?>
                      <tr>
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
                        <td><?php echo date('F j, Y', strtotime($row['date'])) ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>

      <?php if($_SESSION['type'] == 0): ?>
        <section class="content">
          <div class="row">
            <?php
              $sql = "SELECT *,questionnaires.answers AS q_answers, questionnaires.id AS questionnaires_ids, take_students.answers AS ts_answers
                      FROM questionnaires 
                      INNER JOIN take_students ON questionnaires.id = take_students.questionnaires_id 
                          AND take_students.code = ?";

              $stmt = $this->conn()->prepare($sql);
              $stmt->execute([$_GET['code']]);

              if ($stmt->rowCount() > 0) {
                  while ($row = $stmt->fetch()) {
                      $id = $row['questionnaires_ids']; 
              ?>
                <div class="bg-light col-lg-6" style="padding: 10px 20px;">
                    <h4 style="color:#000;font-weight: bold;margin-top: unset;"><?php echo $row['questions']; ?></h4>
                    
                    <ul>
                      <li style="padding: 4px;">
                        <?php echo $row['choice1']; ?>
                      </li>
                      <li style="padding: 4px;">
                          <?php echo $row['choice2']; ?>
                      </li>
                      <li style="padding: 4px;">
                          <?php echo $row['choice3']; ?>
                      </li>
                      <li style="padding: 4px;">
                          <?php echo $row['choice4']; ?>
                      </li>
                    </ul>

                    <div style="padding: 4px;color: green;">
                        MY ANSWERS: <?php echo $row['ts_answers'];?>
                    </div>
                </div>          
                <?php } ?>
              <?php } else { ?>
                <h2 style="color: green;font-weight: bold;text-align: center;">No Take Test</h2>
              <?php } ?>
          </div>
        </section>
      <?php endif; ?>
    </div>
  </div>
  <?php include 'footer.php'; ?>
</body>
</html>
<?php } } $data = new data(); $data->managedata(); ?>