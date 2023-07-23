<?php
if(isset($_GET['semester'])){
    $semester = $_GET['semester'];
    switch($semester){
        case 'one':
        include "one.php";
        break;
        case 'two':
            include "two.php";
        break;
    }
}