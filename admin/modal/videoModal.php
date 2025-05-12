<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Upload Video</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/videoController.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Title</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="" name="title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Video</label>
                    <div class="col-sm-12">
                      <input type="file" class="form-control" id="" name="file" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Category</label>
                    <div class="col-sm-12">
                      <select class="form-control" id="" name="category" required>
                        <option value="Normal">Normal</option>
                        <option value="Anxiety">Anxiety</option>
                        <option value="Depressed">Depressed</option>
                      </select>
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
              <h4 class="modal-title"><b>Edit Video</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/videoController.php" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Title</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="edit_title" name="title" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Video</label>
                    <div class="col-sm-12">
                      <input type="file" class="form-control" id="" name="file">
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Category</label>
                    <div class="col-sm-12">
                      <select class="form-control" id="edit_category" name="category" required>
                        <option value="Normal">Normal</option>
                        <option value="Anxiety">Anxiety</option>
                        <option value="Depressed">Depressed</option>
                      </select>
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
              <form class="form-horizontal" method="POST" action="../controller/videoController.php">
                <input type="hidden" name="id" id="delete_id">
                <div class="text-center">
                    <p>DELETE VIDEO</p>
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