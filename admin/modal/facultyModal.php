<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>New Faculty</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/facultyController.php">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">First Name</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="firstname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Last Name</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="lastname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Email</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Password</label>
                    <div class="col-sm-12">
                      <input type="password" class="form-control" id="" name="password" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Faculty</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/facultyController.php">
                <input type="hidden" name="id" id="edit_id">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">First Name</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="edit_firstname" name="firstname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Last Name</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="edit_lastname" name="lastname">
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Email</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="edit_email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Password</label>
                    <div class="col-sm-12">
                      <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/facultyController.php">
                <input type="hidden" name="id" id="delete_id">
                <div class="text-center">
                    <p>DELETE FACULTY</p>
                    <h2 class="bold catname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>