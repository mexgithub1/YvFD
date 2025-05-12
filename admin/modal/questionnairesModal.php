<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>New Questions</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/questionnairesController.php">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Questions</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="questions" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Choice 1</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="choice1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Choice 2</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="choice2" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Choice 3</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="choice3" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Choice 4</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="choice4" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Answers</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="" name="answers" required>
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
              <h4 class="modal-title"><b>Edit User</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/questionnairesController.php">
                <input type="hidden" name="id" id="edit_id">
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Questions</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="edit_questions" name="questions" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Choice 1</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="edit_choice1" name="choice1" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Choice 2</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="edit_choice2" name="choice2" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Choice 3</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="edit_choice3" name="choice3" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Choice 4</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="edit_choice4" name="choice4" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="project_list_id" class="col-sm-12">Answers</label>
                    <div class="col-sm-12">
                      <input class="form-control" id="edit_answers" name="answers" required>
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
              <form class="form-horizontal" method="POST" action="../controller/questionnairesController.php">
                <input type="hidden" name="id" id="delete_id">
                <div class="text-center">
                    <p>DELETE DATA</p>
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