<?php
session_start();
session_unset();
session_destroy();

if(isset($_SESSION['timetable_userID'])){
    $_SESSION['timetable_userID'] = null;
    $_SESSION['timetable_userIMAGE'] = null;
    $_SESSION['timetable_userNAME'] = null;
}

if(isset($_SESSION['timetable_adminID'])){
    $_SESSION['timetable_adminID'] = null;
    $_SESSION['timetable_adminIMAGE'] = null;
    $_SESSION['timetable_adminNAME'] = null;
}

header("Location: ../");