<?php 
if(!isset($_SESSION)){
  session_start();
}
// print_r($_SESSION);
include "config.db.php";

// draw tables
function draw_lecturer_table(){
  global $con;
  $sql = $con->query("SELECT * FROM lecturers");
  if($sql){
    while($row = $sql->fetch_object()){
      ?>  
        <tr>
          <td><?php echo $row->id ?></td>
          <td><?php echo $row->fname ?></td>
          <td><?php echo $row->lname ?></td>
          <td><?php echo $row->email ?></td>
          <td><?php echo $row->telephone ?></td>
          <td><?php 
          $arr = $row->courses;
          $token = strtok($arr,",");
          while ($token !== false){
            echo "<code>$token </code>";
            $token = strtok(",");
          }
          ?></td>
          <td>
            <button class="btn btn-info btn-sm lecturer"  data-toggle="modal" data-id="<?php echo $row->id ?>" data-target=".edit"><i class="fa fa-pencil"></i></button> 
            <button data-id="<?php echo $row->id ?>" data-toggle="modal" data-target="#myModal" <?php if($arr !== ''){echo "disabled";} ?> class="btn btn-danger btn-sm lecturers"><i class="fa fa-trash"></i> </button>
          </td>
        </tr>
      <?php
    }
  }
}
// draw tables
function draw_course_unit_table($year,$semester){
  global $con;
  if(isset($_SESSION['timetable_courseID'])){
    $course = $_SESSION['timetable_courseID'];
    $sql = $con->query("SELECT * FROM course_unit WHERE semester='$semester' AND year='$year' AND course_id=$course");
  }else {
    $sql = $con->query("SELECT * FROM course_unit WHERE semester='$semester' AND year='$year'");
  }
  if($sql){
    $id =1;
    while($row = $sql->fetch_object()){
      $lecturer = $con->query("SELECT fname,lname FROM lecturers WHERE id=$row->lecturer")->fetch_object();
      ?>  
        <tr>
          <td><?php echo $id ?></td>
          <td><?php echo $row->course_unit_id ?></td>
          <td><?php echo $row->name ?></td>
          <td><?php echo $lecturer->fname." ".$lecturer->lname ?></td>
          <td>
            <button class="btn btn-info btn-sm editing"  data-toggle="modal" data-id="<?php echo $row->id ?>" data-target=".edit"><i class="fa fa-pencil"></i></button> 
            <button data-id="<?php echo $row->id ?>" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-sm units"><i class="fa fa-trash"></i> </button>
          </td>
        </tr>
      <?php
      $id++;
    }
  }
}
// draw tables
function draw_course_table(){
  global $con;
  $sql = $con->query("SELECT * FROM course ");
  if($sql){
    $i =1;
    while($row = $sql->fetch_object()){
      $course_units = $con->query("SELECT id FROM course_unit WHERE course_id=$row->id")->num_rows;
      ?>  
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row->course_id ?></td>
          <td><?php echo $row->name ?></td>
          <td>
            <button class="btn btn-info btn-sm course"  data-toggle="modal" data-id="<?php echo $row->id ?>" data-target=".edit"><i class="fa fa-pencil"></i></button> 
            <button data-id="<?php echo $row->id ?>" data-toggle="modal" data-target="#myModal" <?php if($course_units > 0) echo "disabled" ?> class="btn btn-danger btn-sm course"><i class="fa fa-trash"></i> </button>
          </td>
        </tr>
      <?php
      $i++;
    }
  }
}
// draw tables
function draw_users_table(){
  global $con;
  $sql = $con->query("SELECT * FROM user ");
  if($sql){
    $id =1;
    while($row = $sql->fetch_object()){
      $lecturer = $con->query("SELECT * FROM lecturers WHERE id=$row->lecturer_id");
      $course = $con->query("SELECT * FROM course WHERE id=$row->course_id");
      if($lecturer && $course){
        $row2 = $lecturer->fetch_object();
        $row3 = $course->fetch_object();
        ?>  
        <tr>
          <td><?php echo $id ?></td>
          <td>
          <img src="images/<?php echo $row->user_image ?>" width="40px" height="30px"  /></td>
          <td><?php echo $row2->fname ?></td>
          <td><?php echo $row2->lname ?></td>
          <td><?php echo $row2->email ?></td>
          <td><?php echo $row2->telephone ?></td>
          <td><?php echo $row3->name ?></td>
          <td>
            <button data-id="<?php echo $row->id ?>" class="btn btn-info btn-sm user"  data-toggle="modal" data-target=".edit"><i class="fa fa-pencil" ></i></button> 
            <button data-id="<?php echo $row->id ?>" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-sm users"><i class="fa fa-trash"></i> </button>
          </td>
        </tr>
      <?php
      }
      $id++;
    }
  }
}

// draw edit form for course units
function draw_course_unit_edit_form($id){
  global $con;
  extract($id);
  $sql = $con->query("SELECT * FROM course_unit WHERE id=$id");
  if($sql){
    $row = $sql->fetch_object();
    $lect = get_lectures_select_options($row->lecturer);

    $reponse='
                
            <div class="col-md-12 col-sm-12  form-group has-feedback">
              <input type="hidden" name="id" value="'.$row->id.'" >
                <input type="text" class="form-control has-feedback-left" name="course_unit_number" placeholder="Course unit No." required value="'.$row->course_unit_id .'">
                <p>Course Id</p>
                <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-md-12 col-sm-12  form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="course_unit_name" placeholder="Course unit Name" value="'.$row->name.'">
                <p>Course unit name</p>
                <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="col-md-12 col-sm-12  form-group has-feedback">
                <select class="form-control has-feedback-left" name="course_unit_lecturer" >
                '.$lect.'
                </select>
                <p>Lecturer</p>
                <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="margin-right: 69%" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Update </button>
            </div>
    ';
    echo $reponse;
  }else {
    echo "Failed ". $con->error;
  }
}
// draw edit form for course 
function draw_course_edit_form($id){
  global $con;
  extract($id);
  $sql = $con->query("SELECT * FROM course WHERE id=$id");
  if($sql){
    $row = $sql->fetch_object();
    $reponse='
          <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="hidden" value="'.$row->id.'" name="id" >
            <input type="text" class="form-control has-feedback-left" name="course_number"
            value="'.$row->course_id.'"
            placeholder="Course No." required>
            <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="course_name" 
            value="'.$row->name.'"
            placeholder="Course Name">
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" style="margin-right: 69%" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save </button>
        </div>
    ';
    echo $reponse;
  }else {
    echo "Failed ". $con->error;
  }
}
// draw edit form for lecturers
function draw_lecturer_edit_form($id){
  global $con;
  extract($id);
  $sql = $con->query("SELECT * FROM lecturers WHERE id=$id");
  if($sql){
    $row = $sql->fetch_object();
    $reponse='
        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input name="id" type="hidden" value="'.$row->id.'"/>
            <input type="text" class="form-control has-feedback-left" name="title" placeholder="Enter Title" value="'.$row->title.'">
            <p>Title</p>
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>

         <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="fname" placeholder="First Name" value="'.$row->fname.'">
            <p>First Name</p>
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="lname" placeholder="Last Name" value="'.$row->lname.'">
            <p>Last Name</p>
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="email" class="form-control has-feedback-left" name="email" placeholder="Email Address" value="'.$row->email.'">
            <p>Email Address</p>
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="tel" class="form-control has-feedback-left" name="telephone" placeholder="Telephone Number" value="'.$row->telephone.'">
            <p>Telephone</p>
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="available_on" placeholder="Available On" value="'.$row->available_on.'">
            <p>Available On</p>
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="margin-right: 69%" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save </button>
        </div> 
    ';
    echo $reponse;
  }else {
    echo "Failed ". $con->error;
  }
}
//draw edit form for user
function draw_user_edit_form($id){
  global $con;
  extract($id);
  $sql = $con->query("SELECT * FROM user WHERE id=$id");
  if($sql){
    $row = $sql->fetch_object();
    $reponse = '
    <div class="col-md-12 col-sm-12  form-group has-feedback">
      <input type="hidden" name="id" value="'.$row->id.'">
      <select class="form-control has-feedback-left" name="lecturer">'.
            get_lectures_select_options($row->id).'
      </select>
      <p>Select the lecturer</p>
      <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
      </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="text" class="form-control has-feedback-left" name="username" placeholder="Username" value="'.$row->username.'">
            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
        </div>

        <div class="col-md-12 col-sm-12  form-group has-feedback">
            <input type="password" class="form-control has-feedback-left" name="password" placeholder="Password" value="'.$row->password.'">
            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
        </div>
        <div class="row">
          <div class="col-md-4">
            <img src="images/'.$row->user_image.'" width="100px" />
          </div>
          <div class="col-md-8">
            <div class="col-md-12 col-sm-12  form-group has-feedback">
                <input type="file" class="form-control has-feedback-left" name="profile_pic" placeholder="Proile picture">
                <p>Profile Picture</p>
                <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
        </div>
    ';
    echo $reponse;
  }else {
    echo "Failed ".$con->error;
  }
}


//get lectures name
function get_lectures_select_options($lect=null){
  global $con;
  $sql = $con->query("SELECT * FROM lecturers");
  if($sql){
    if(is_null($lect)){
      while($row = $sql->fetch_object()){
      ?>
      <option value="<?php echo $row->id ?>"><?php echo $row->fname.' '.$row->lname ?></option>
      <?php
      }
    }else {
      $rep = '';
      $lect = (int)$lect;
      while($row = $sql->fetch_object()){
        if($lect == $row->id){
          $rep .= '<option selected value="'. $row->id.'">'.$row->fname.' '.$row->lname.'</option>';
        }else {
          $rep .= '<option  value="'. $row->id .'">'.$row->fname.' '.$row->lname.'</option>';
        }
      }
      return $rep;
    }
    
  }
}
//get lectures name
function get_course_select_options(){
  global $con;
  $sql = $con->query("SELECT * FROM course");
  if($sql){
    while($row = $sql->fetch_object()){
      ?>
      <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
      <?php
    }
  }
}

//add lecturer
function add_lecturer($post){
  global $con;
  extract($post);
  // print_r($post); die();
  $sql = $con->query("INSERT INTO lecturers(fname,lname,email,telephone,title,available_on) VALUES('$fname','$lname','$email','$telephone','$title','$available_on')");
  if($sql){
    print_r(json_encode(["response"=>"success"]));
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}
// add courses
function add_course_unit($post){
  global $con;
  extract($post);
  // print_r($post); die();
  $course_id = $_SESSION['timetable_courseID'];
  $sql = $con->query("INSERT INTO course_unit(course_unit_id,name,lecturer,semester,year,course_id) VALUES('$course_unit_number','$course_unit_name','$course_unit_lecturer','$semester','$year',$course_id)");
  if($sql){
    // $user = explode(" ",$course_unit_lecturer);
    // $fname = $user[0];
    // $lname = $user[1];
    // update the lecturers course units
    $update = $con->query("UPDATE lecturers SET courses=CONCAT(courses,',$course_unit_name') WHERE id=$course_unit_lecturer");
    if($update){
      print_r(json_encode(["response"=>"success"]));
    }else {
       print_r(json_encode(["response"=>"failed ".$con->error]));
    }
    
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}
// add users
function add_user($post,$file){
  global $con;
  extract($post);
  extract($file);
  $img = $profile_pic["name"];
  if(move_uploaded_file($profile_pic['tmp_name'],'../images/'.$profile_pic['name'])){
    $c = $con->query("SELECT course_id FROM lecturers WHERE id=$lecturer");
    if($c){
      $course = $c->fetch_object()->course_id;
      $sql = $con->query("INSERT INTO user(user_image,lecturer_id,course_id,username,password) VALUES('$img',$lecturer,$course,'$username','$password')");
      if($sql){
        print_r(json_encode(["response"=>"success"]));
      }else {
        print_r(json_encode(["response"=>"failed ".$con->error]));
      }
    }
    
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
  
}
// add course
function add_course($post){
  global $con;
  extract($post);
  $sql = $con->query("INSERT INTO course(course_id,name) VALUES('$course_number','$course_name')");
  if($sql){
    print_r(json_encode(["response"=>"success"]));
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}


//update lecturer
function update_lecturer($post){
  global $con;
  extract($post);
  // print_r($post); die();
  $sql = $con->query("UPDATE lecturers SET fname='$fname',lname='$lname',email='$email',telephone='$telephone',title='$title',available_on='$available_on' WHERE id=$id");
  if($sql){
    print_r(json_encode(["response"=>"success"]));
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}
//update course unit
function update_course_unit($post){
  global $con;
  extract($post);
  $id = (int)($id);
  $sql = $con->query("UPDATE course_unit SET name='$course_unit_name',course_unit_id='$course_unit_number',lecturer='$course_unit_lecturer' WHERE id=$id");
  if($sql){
    print_r(json_encode(["response"=>"success"]));
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}
//update user
function update_user($post,$file){
  global $con;
  extract($post);
  extract($file);
  $id = (int)$id;
  $img = $profile_pic["name"];
  if($profile_pic['size'] > 0){
    if(move_uploaded_file($profile_pic['tmp_name'],'../images/'.$profile_pic['name'])){
      $sql = $con->query("UPDATE user SET user_image='$img',lecturer_id=$lecturer,username='$username',password='$password' WHERE id=$id");
      if($sql){
        print_r(json_encode(["response"=>"success"]));
      }else {
        print_r(json_encode(["response"=>"failed ".$con->error]));
      }
      
    }else {
      print_r(json_encode(["response"=>"failed ".$con->error]));
    }
  }else {
    $sql = $con->query("UPDATE user SET lecturer_id=$lecturer,username='$username',password='$password' WHERE id=$id");
    if($sql){
      print_r(json_encode(["response"=>"success"]));
    }else {
      print_r(json_encode(["response"=>"failed ".$con->error]));
    }
  }
  
}
//update admin
function update_admin($post,$file){
  global $con;
  extract($post);
  extract($file);
  $id = (int)$id;
  $img = $profile_pic["name"];
  if($profile_pic['size'] > 0){
    if(move_uploaded_file($profile_pic['tmp_name'],'../images/'.$profile_pic['name'])){
      $sql = $con->query("UPDATE admin SET profile_pic ='$img',username='$username',password='$password' WHERE id=$id");
      if($sql){
        print_r(json_encode(["response"=>"success"]));
      }else {
        print_r(json_encode(["response"=>"failed ".$con->error]));
      }
      
    }else {
      print_r(json_encode(["response"=>"failed ".$con->error]));
    }
  }else {
    $sql = $con->query("UPDATE admin SET username='$username',password='$password' WHERE id=$id");
    if($sql){
      print_r(json_encode(["response"=>"success"]));
    }else {
      print_r(json_encode(["response"=>"failed ".$con->error]));
    }
  }
  
}
// update course
function update_course_details($post){
  global $con;
  extract($post);
  $id = (int)($id);
  $sql = $con->query("UPDATE course SET course_id='$course_number',name='$course_name' WHERE id=$id");
  if($sql){
    print_r(json_encode(["response"=>"success"]));
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}

// delete lecturer
function delete_lecturer($post){
  global $con;
  extract($post);
  $sql = $con->query("DELETE FROM lecturers WHERE id=$id");
  if($sql){
    print_r(json_encode(["response"=>"success"]));
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}
// delete course unit
function delete_course_unit($post){
  global $con;
  extract($post);
  $sql = $con->query("DELETE FROM course_unit WHERE id=$id");
  if($sql){
    print_r(json_encode(["response"=>"success"]));
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}
// delete user
function delete_user($post){
  global $con;
  extract($post);
  $sql = $con->query("DELETE FROM users WHERE id=$id");
  if($sql){
    print_r(json_encode(["response"=>"success"]));
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}
// delete course
function delete_course($post){
  global $con;
  extract($post);
  $sql = $con->query("DELETE FROM course WHERE id=$id");
  if($sql){
    print_r(json_encode(["response"=>"success"]));
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}


// login
function login($post){
  global $con;
  extract($post);

  // first check to see if it the admin logging in
  $sql = $con->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
  if($sql){
    if($sql->num_rows > 0){
      // log in the admin
      $row = $sql->fetch_object();
      $_SESSION['timetable_adminID'] =$row->id;
      $_SESSION['timetable_adminIMAGE'] =$row->profile_pic;
      $_SESSION['timetable_adminNAME'] =$row->username;
       print_r(json_encode(["response"=>"success"]));
    }else {
      //check to see if it the system user
      $sql1 = $con->query("SELECT * FROM user AS U INNER JOIN lecturers AS L ON U.lecturer_id = L.id  WHERE username='$username' AND password='$password'");
      if($sql1){
        if($sql1->num_rows > 0){
          // log the user in
           $row = $sql1->fetch_object();
            $_SESSION['timetable_userID'] =$row->id;
            $_SESSION['timetable_userIMAGE'] =$row->user_image;
            $_SESSION['timetable_userNAME'] =$row->username;
            $_SESSION['timetable_courseID'] =$row->course_id;
             print_r(json_encode(["response"=>"success"]));
        }else {
          print_r(json_encode(["response"=>"failed ".$con->error]));
        }
      }else {
        print_r(json_encode(["response"=>"failed ".$con->error]));
      }
    }
  }else {
    print_r(json_encode(["response"=>"failed ".$con->error]));
  }
}

//helpers
function get_course_options($course= null){
  global $con;
  $sql = $con->query("SELECT * FROM course");
  if($sql){
    if(is_null($course)){
      while($rows=$sql->fetch_object()){
        echo '<option value="'.$rows->id.'">'.$rows->name.  '</option>';
      }
    }else {
      $reponse = '';
      while($rows=$sql->fetch_object()){
        if($course == $rows->id){
         $reponse .='<option selected value="'.$rows->id.'">'.$rows->name.'</option>';
        }else {
            $reponse .='<option value="'.$rows->id.'">'.$rows->name.'</option>';
        }
      }
      return $reponse;
    }
   
  }
}