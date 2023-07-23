
<?php include "includes/parts/header.php" ?>
<?php include "includes/functions.php" ?>

            <!-- sidebar menu -->
<?php include "includes/parts/sideBar.php" ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
          
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                       <?php 
                        if(isset($_SESSION['timetable_adminIMAGE'])){
                          ?>
                          <img src="images/<?php echo $_SESSION['timetable_adminIMAGE']  ?>" alt="..." > <?php echo  $_SESSION['timetable_adminNAME'] ; ?>
                          <?php
                        }else {

                          ?>
                          <img src="images/<?php echo $_SESSION['timetable_userIMAGE']  ?>" alt="..." >
                          <?php echo  $_SESSION['timetable_userNAME']?>
                          <?php

                        }

                      ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>                  
                </ul>
              </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <?php 
          if(isset($_GET['page'])){
            $page = $_GET['page'];
          }else {
            $page = null;
          }

          switch($page){
            case 'course':
              include "includes/parts/view/course.php";
            break;
            case 'year_one':
              include "includes/parts/view/one/index.php";
            break;
            case 'year_two':
              include "includes/parts/view/two/index.php";
            break;
            case 'year_three':
              include "includes/parts/view/three/index.php";
            break;
            case 'lecturers':
              include "includes/parts/view/lecturers.php";
            break;
            case 'user':
              include "includes/parts/view/user-profile.php";
            break;
            case 'users':
              include "includes/parts/view/users.php";
            break;

            default :
            include "includes/parts/view/course.php";
            break;
          }
          
          
          ?>
          
        </div>
          </div>
        </div>
        <!-- /page content -->

       <?php include "includes/parts/footer.php" ?>