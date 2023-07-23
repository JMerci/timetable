<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
    <h3>General</h3>
    <ul class="nav side-menu">
        <?php if(isset($_SESSION['timetable_adminID'])) echo '<li><a href="./"><i class="fa fa-book"></i> Courses </a></li>' ?>
        
        <li ><a><i class="fa fa-list-alt"></i> Year One <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li ><a href="?page=year_one&semester=one">Semester One</a></li>
                 <li ><a href="?page=year_one&semester=two">Semester Two</a></li>
               
            </ul>
        </li>

        <li><a><i class="fa fa-list-alt"></i> Year Two <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="?page=year_two&semester=one">Semester One</a></li>
            <li><a href="?page=year_two&semester=two">Semester Two</a></li>
        </ul>
        </li>

        <li><a><i class="fa fa-list-alt"></i> Year Three <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="?page=year_three&semester=one">Semester One</a></li>
            
            <li>
            <a href="?page=year_three&semester=two">Semester Two</a></li>
        </ul>
        </li>
         <?php if(isset($_SESSION['timetable_userID'])) echo '<li> <a href="includes/Timetable.php" target="_blank"><i class="fa fa-book"></i> Generate timetable </a></li>' ?>
        <li><a href="?page=lecturers"><i class="fa fa-user"></i> Lecturers </a>
        </li>
       
        <li>
            <a href="?page=user"><i class="fa fa-cog"></i> Profile </a>
        </li>
        <?php if(isset($_SESSION['timetable_adminID'])) echo '<li> <a href="?page=users"><i class="fa fa-users"></i> Users </a></li>' ?>
    </ul>
    </div>

</div>