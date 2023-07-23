
<form class="form-label-left input_mask" id="addNewCourse">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add new Course</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            
        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="course_number" placeholder="Course No." required>
            <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="course_name" placeholder="Course Name">
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" style="margin-right: 69%" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save </button>
        </div>
    </div>
</form>