<form class="form-label-left input_mask" id="addNewUser">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Add New User</h4>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
        
        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <select class="form-control has-feedback-left" name="lecturer">
               <?php get_lectures_select_options() ?>
            </select>
            <p>Select the lecturer</p>
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="username" placeholder="Username">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="password" class="form-control has-feedback-left" name="password" placeholder="Password">
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>
        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="file" class="form-control has-feedback-left" name="profile_pic" placeholder="Proile picture">
            <p>Profile Picture</p>
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" style="margin-right: 69%" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save </button>
        </div>
    </div>
</form>