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
                <?php if($_SESSION['type'] == 2): ?>
                    <div class="box-header with-border">
                        <a href="#addnew" data-toggle="modal" class="btn btn-success btn-sm btn-flat custom-btn"><i class="fa fa-plus"></i> New Readables</a> 
                    </div>
                <?php endif; ?>
                <?php if($_SESSION['type'] == 0): ?>
                    <div class="box-header with-border">
                        <a href="bookmark_readables.php" class="btn btn-success btn-sm btn-flat custom-btn"><i class="fas fa-bookmark"></i> Bookmark</a> 
                    </div>
                <?php endif; ?>
                <?php if($_SESSION['type'] == 2): ?>
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <th>List</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>File</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php 
                                $sql = "SELECT * FROM readables";
                                $stmt = $this->conn()->query($sql);
                                $id = 1;
                                while ($row = $stmt->fetch()) { 
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><?php echo $row['title']; ?></td>
                                        <td><a href="../files/<?php echo $row['file'] ?>" target="_blank">Download</a></td>
                                        <td>
                                            <button class='btn btn-success btn-sm edit btn-flat' 
                                                data-edit_id='<?php echo $row['id']; ?>'
                                                data-edit_file='<?php echo $row['file']; ?>'
                                                data-edit_title='<?php echo $row['title']; ?>'data-edit_category='<?php echo $row['category']; ?>'>
                                                <i class='fa fa-edit'></i> Edit
                                            </button>
                                            <button class='btn btn-danger btn-sm delete btn-flat' 
                                                data-delete_id='<?php echo $row['id']; ?>'>
                                                <i class='fa fa-trash'></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php $id++; } ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>

                <?php if($_SESSION['type'] == 0): ?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Normal</h3>
                            </div>
                            <?php 
                            $sql = "SELECT * FROM readables WHERE category = 'Normal'";
                            $stmt = $this->conn()->query($sql);
                            while ($row = $stmt->fetch()) { 
                                $file = $row['file'];
                                $file_ext = pathinfo($file, PATHINFO_EXTENSION);
                                $file_path = "../files/" . $file;
                            ?>
                                <div class="col-lg-3" style="text-align: center;">
                                    <div class="card" style="border: 2px solid rgba(0, 0, 0, 0.1);padding: 20px;">
                                        <a href="../files/<?php echo $row['file'] ?>" target="_blank"><?php echo $row['file'] ?></a>
                                        <div style="display: flex;place-items: center;justify-content: space-between;">
                                            <h4 style="text-align: center;"><?php echo $row['title']; ?></h4>
                                            <h4>

                                                <?php 
                                                $sql2 = "SELECT * FROM bookmark_readables WHERE users_id = ? AND readables_id = ?";
                                                $stmt2 = $this->conn()->prepare($sql2);
                                                $stmt2->execute([$_SESSION['id'],$row['id']]);
                                                if ($stmt2->rowCount() > 0) { ?>
                                                    <i class="fas fa-bookmark bookmark" data-id="<?php echo $row['id'] ?>"></i>
                                                <?php } else { ?>
                                                    <i class="far fa-bookmark bookmark" data-id="<?php echo $row['id'] ?>"></i>
                                                <?php } ?>
                                                

                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Anxiety</h3>
                            </div>
                            <?php 
                            $sql = "SELECT * FROM readables WHERE category = 'Anxiety'";
                            $stmt = $this->conn()->query($sql);
                            while ($row = $stmt->fetch()) { 
                                $file = $row['file'];
                                $file_ext = pathinfo($file, PATHINFO_EXTENSION);
                                $file_path = "../files/" . $file;
                            ?>
                                <div class="col-lg-3" style="text-align: center;">
                                    <div class="card" style="border: 2px solid rgba(0, 0, 0, 0.1);padding: 20px;">
                                        <a href="../files/<?php echo $row['file'] ?>" target="_blank"><?php echo $row['file'] ?></a>
                                        <div style="display: flex;place-items: center;justify-content: space-between;">
                                            <h4 style="text-align: center;"><?php echo $row['title']; ?></h4>
                                            <h4>

                                                <?php 
                                                $sql2 = "SELECT * FROM bookmark_readables WHERE users_id = ? AND readables_id = ?";
                                                $stmt2 = $this->conn()->prepare($sql2);
                                                $stmt2->execute([$_SESSION['id'],$row['id']]);
                                                if ($stmt2->rowCount() > 0) { ?>
                                                    <i class="fas fa-bookmark bookmark" data-id="<?php echo $row['id'] ?>"></i>
                                                <?php } else { ?>
                                                    <i class="far fa-bookmark bookmark" data-id="<?php echo $row['id'] ?>"></i>
                                                <?php } ?>
                                                

                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Depressed</h3>
                            </div>
                            <?php 
                            $sql = "SELECT * FROM readables WHERE category = 'Depressed'";
                            $stmt = $this->conn()->query($sql);
                            while ($row = $stmt->fetch()) { 
                            ?>
                                <div class="col-lg-3" style="text-align: center;">
                                    <div class="card" style="border: 2px solid rgba(0, 0, 0, 0.1);padding: 20px;">
                                        <a href="../files/<?php echo $row['file'] ?>" target="_blank"><?php echo $row['file'] ?></a>
                                        <div style="display: flex;place-items: center;justify-content: space-between;">
                                            <h4 style="text-align: center;"><?php echo $row['title']; ?></h4>
                                            <h4>

                                                <?php 
                                                $sql2 = "SELECT * FROM bookmark_readables WHERE users_id = ? AND readables_id = ?";
                                                $stmt2 = $this->conn()->prepare($sql2);
                                                $stmt2->execute([$_SESSION['id'],$row['id']]);
                                                if ($stmt2->rowCount() > 0) { ?>
                                                    <i class="fas fa-bookmark bookmark" data-id="<?php echo $row['id'] ?>"></i>
                                                <?php } else { ?>
                                                    <i class="far fa-bookmark bookmark" data-id="<?php echo $row['id'] ?>"></i>
                                                <?php } ?>
                                                

                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <?php include 'modal/readablesModal.php'; ?>
  <script>
    $(document).on('click', '.edit', function(e){
      e.preventDefault();
      $('#edit').modal('show');
      var edit_id = $(this).data('edit_id');
      var edit_file = $(this).data('edit_file');
      var edit_title = $(this).data('edit_title');
      var edit_category = $(this).data('edit_category');

      $('#edit_id').val(edit_id)
      $('#edit_file').val(edit_file)
      $('#edit_title').val(edit_title)
      $('#edit_category').val(edit_category)
    });

    $(document).on('click', '.delete', function(e){
      e.preventDefault();

      $('#delete').modal('show');
      var delete_id = $(this).data('delete_id');
      
      $('#delete_id').val(delete_id)
    });

    $(document).ready(function() {
        $(".bookmark").click(function() {
            $(this).toggleClass("far fas");

            let readablesId = $(this).data("id");
            $.ajax({
                url: '../controller/readablesController.php',
                type: 'POST',
                data: { setbookmark: 'setbookmark', id: readablesId },
                success: function(response) {
                    console.log("Bookmark status updated:", response);
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                }
            });
        });
    });
  </script>
</body>
</html>
<?php } } $data = new data(); $data->managedata(); ?>