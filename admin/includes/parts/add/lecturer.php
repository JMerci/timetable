<form class="form-label-left input_mask" id="addNewLecturer">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add Lecturer</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            
        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="title" placeholder="Lecturer title" required>
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="fname" placeholder="First Name">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="lname" placeholder="Last Name">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="email" class="form-control has-feedback-left" name="email" placeholder="Email Address">
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="tel" class="form-control has-feedback-left" name="telephone" placeholder="Telephone Number">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="available_on" placeholder="Available On">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <select class="form-control has-feedback-left" name="course">
               <?php get_course_options(); ?>
            </select>
            <p>Course</p>
             <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" style="margin-right: 69%" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save </button>
        </div>
    </div>
</form>