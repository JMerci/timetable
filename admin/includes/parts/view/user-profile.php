<?php 
if(isset($_SESSION['timetable_userID'])){
    $ID = $_SESSION['timetable_userID'];

    $sql = $con->query("SELECT U.id as user_id,user_image,lecturer_id,U.course_id,username,password,fname,lname,email,telephone FROM user AS U INNER JOIN lecturers AS L ON U.lecturer_id = L.id WHERE L.id=$ID");
    if($sql){
        $row = $sql->fetch_object();
    ?>
        <form class="form-label-left input_mask" id="update_user">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Your Profile</h4>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="form-row">
                        <div class="col-md-3">
                            <p>First Name</p>
                        </div>
                        <div class="col-md-3">
                            <p><?php echo $row->fname ?></p>
                        </div>
                        <div class="col-md-6">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="hidden" name="id" value="<?php echo $row->user_id ?>" />
                                    <input type="hidden" name="lecturer" value="<?php echo $row->lecturer_id ?>" />
                                <input type="text" class="form-control has-feedback-left" value="<?php echo $row->fname ?>" name="fname" 
                                readonly
                                placeholder="First Name">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <p>Last Name</p>
                        </div>
                        <div class="col-md-3">
                            <p><?php echo $row->lname ?></p>
                        </div>
                        <div class="col-md-6">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" name="lname" readonly value="<?php echo $row->lname ?>" placeholder="Last Name">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <p>Email Address</p>
                        </div>
                        <div class="col-md-3">
                            <p><?php echo $row->email ?></p>
                        </div>
                        <div class="col-md-6">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="email" readonly class="form-control has-feedback-left" value="<?php echo $row->email ?>" name="email" placeholder="Email Address">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <p>Telephone</p>
                        </div>
                        <div class="col-md-3">
                            <p><?php echo $row->telephone ?></p>
                        </div>
                        <div class="col-md-6">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                
                                <input readonly type="tel" class="form-control has-feedback-left" value="<?php echo $row->telephone ?>" name="telephone" placeholder="Telephone">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <p>Username</p>
                        </div>
                        <div class="col-md-3">
                            <p><?php echo $row->username ?></p>
                        </div>
                        <div class="col-md-6">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" value="<?php echo $row->username ?>" name="username" placeholder="Username">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <p>Password</p>
                        </div>
                        <div class="col-md-3">
                            <p>****************</p>
                        </div>
                        <div class="col-md-6">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="password" class="form-control has-feedback-left" value="<?php echo $row->password ?>" name="password" placeholder="Password">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" style="justify-content: center;align-items: center">
                     <div class="col-md-3">
                            <p>Profile Picture</p>
                        </div>
                        <div class="col-md-3">
                            <img class="img-circle profile_img" src="images/<?php echo $row->user_image ?>"/>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12  form-group has-feedback">
                                <input type="file" class="form-control has-feedback-left" name="profile_pic">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Update </button>
                </div>
            </div>
        </form>
    <?php
    }else {
        echo "Error ".$con->error;
    }
}else {
    $ID = $_SESSION['timetable_adminID'];

    $sql = $con->query("SELECT * FROM admin WHERE id=$ID");
    if($sql){
        $row = $sql->fetch_object();
        ?>
         <form class="form-label-left input_mask" id="update_admin">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Your Profile</h4>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="col-md-3">
                            <p>Username</p>
                        </div>
                        <div class="col-md-3">
                            <p><?php echo $row->username ?></p>
                        </div>
                        
                        <div class="col-md-6">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>" />
                                <input type="text" class="form-control has-feedback-left" value="<?php echo $row->username ?>" name="username" placeholder="Username">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-3">
                            <p>Password</p>
                        </div>
                        <div class="col-md-3">
                            <p>****************</p>
                        </div>
                        <div class="col-md-6">
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                <input type="password" class="form-control has-feedback-left" value="<?php echo $row->password ?>" name="password" placeholder="Password">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-row" style="justify-content: center;align-items: center">
                        <div class="col-md-3">
                            <p>Profile Picture</p>
                        </div>
                        <div class="col-md-3">
                            <img class="img-circle profile_img" src="images/<?php echo $row->profile_pic ?>"/>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12  form-group has-feedback">
                                <input type="file" class="form-control has-feedback-left" name="profile_pic">
                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Update </button>
                </div>
            </div>
        </form>
        <?php
    }else {
        echo "Error ".$con->error;
    }

}
?>

