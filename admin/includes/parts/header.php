<?php 
session_start();
if(!isset($_SESSION['timetable_userID']) && !isset($_SESSION['timetable_adminID'])){
  header("Location: ../");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Automatic Timetable Generator</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <!-- <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet"> -->
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="./" class="site_title"><i class="fa fa-book"></i> <span>  KU ATG</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <?php 
                if(isset($_SESSION['timetable_adminIMAGE'])){
                  ?>
                   <img src="images/<?php echo $_SESSION['timetable_adminIMAGE']  ?>" alt="..." class="img-circle profile_img">
                  <?php
                }else {

                  ?>
                   <img src="images/<?php echo $_SESSION['timetable_userIMAGE']  ?>" alt="..." class="img-circle profile_img">
                  <?php

                }

              ?>
               
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <?php
                if(isset($_SESSION['timetable_adminNAME'])){
                  echo '<h2>'.$_SESSION['timetable_adminNAME'].'</h2>';
                }else {
                    echo '<h2>'.$_SESSION['timetable_userNAME'].'</h2>';
                }
                
                ?>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />