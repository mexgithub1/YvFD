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
              <div class="box-header with-border">
                 <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat custom-btn"><i class="fa fa-plus"></i> New Questions</a> 
              </div>
              <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>List</th>
                    <th>Questions</th>
                    <th>Choice 1</th>
                    <th>Choice 2</th>
                    <th>Choice 3</th>
                    <th>Choice 4</th>
                    <th>Answers</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php $sql = "SELECT * FROM questionnaires";
                    $stmt = $this->conn()->query($sql);
                    $id = 1;
                    while ($row = $stmt->fetch()) { ?>
                      <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $row['questions'] ?></td>
                        <td><?php echo $row['choice1'] ?></td>
                        <td><?php echo $row['choice2'] ?></td>
                        <td><?php echo $row['choice3'] ?></td>
                        <td><?php echo $row['choice4'] ?></td>
                        <td><?php echo $row['answers'] ?></td>
                        <td>
                          <button class='btn btn-success btn-sm edit btn-flat' 
                          data-edit_id='<?php echo $row['id'] ?>'
                          data-edit_questions='<?php echo $row['questions'] ?>'
                          data-edit_choice1='<?php echo $row['choice1'] ?>'
                          data-edit_choice2='<?php echo $row['choice2'] ?>'
                          data-edit_choice3='<?php echo $row['choice3'] ?>'
                          data-edit_choice4='<?php echo $row['choice4'] ?>'
                          data-edit_answers='<?php echo $row['answers'] ?>'
                          ><i class='fa fa-edit'></i> Edit</button>
                          <button class='btn btn-danger btn-sm delete btn-flat' 
                          data-delete_id='<?php echo $row['id'] ?>'
                          ><i class='fa fa-trash'></i> Delete</button>
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
  <?php include 'modal/questionnairesModal.php'; ?>
  <script>
    $(document).on('click', '.edit', function(e){
      e.preventDefault();
      $('#edit').modal('show');
      var edit_id = $(this).data('edit_id');
      var edit_questions = $(this).data('edit_questions');
      var edit_choice1 = $(this).data('edit_choice1');
      var edit_choice2 = $(this).data('edit_choice2');
      var edit_choice3 = $(this).data('edit_choice3');
      var edit_choice4 = $(this).data('edit_choice4');
      var edit_answers = $(this).data('edit_answers');

      $('#edit_id').val(edit_id)
      $('#edit_questions').val(edit_questions)
      $('#edit_choice1').val(edit_choice1)
      $('#edit_choice2').val(edit_choice2)
      $('#edit_choice3').val(edit_choice3)
      $('#edit_choice4').val(edit_choice4)
      $('#edit_answers').val(edit_answers)
    });

    $(document).on('click', '.delete', function(e){
      e.preventDefault();

      $('#delete').modal('show');
      var delete_id = $(this).data('delete_id');
      
      $('#delete_id').val(delete_id)
    });
  </script>
</body>
</html>
<?php } } $data = new data(); $data->managedata(); ?>