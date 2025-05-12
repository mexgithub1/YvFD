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
                 <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat custom-btn"><i class="fa fa-plus"></i>Register New Faculty</a> 
              </div>
              <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered">
                  <thead>
                    <th>List</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php $sql = "SELECT * FROM users WHERE type = 1";
                    $stmt = $this->conn()->query($sql);
                    $id = 1;
                    while ($row = $stmt->fetch()) { ?>
                      <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td>
                          <button class='btn btn-success btn-sm edit btn-flat' 
                          data-edit_id='<?php echo $row['id'] ?>'
                          data-edit_firstname='<?php echo $row['firstname'] ?>'
                          data-edit_lastname='<?php echo $row['lastname'] ?>'
                          data-edit_email='<?php echo $row['email'] ?>'
                          data-edit_password='<?php echo $row['passwordtxt'] ?>'
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
  <?php include 'modal/facultyModal.php'; ?>
  <script>
    $(document).on('click', '.edit', function(e){
      e.preventDefault();
      $('#edit').modal('show');
      var edit_id = $(this).data('edit_id');
      var edit_firstname = $(this).data('edit_firstname');
      var edit_lastname = $(this).data('edit_lastname');
      var edit_email = $(this).data('edit_email');
      var edit_password = $(this).data('edit_password');

      $('#edit_id').val(edit_id)
      $('#edit_firstname').val(edit_firstname)
      $('#edit_lastname').val(edit_lastname)
      $('#edit_email').val(edit_email)
      $('#edit_password').val(edit_password)
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