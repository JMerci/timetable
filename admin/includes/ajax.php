<?php
include "functions.php";
if(isset($_GET['role'])){
    $role = $_GET['role'];

    switch($role){
        case 'add_lecturer':
            add_lecturer($_POST);
        break;
        case 'add_course_unit':
            add_course_unit($_POST);
        break;
        case 'add_user':
            add_user($_POST,$_FILES);
        break;
        case 'add_course':
            add_course($_POST);
        break;


        case 'update_lecturer':
            update_lecturer($_POST);
        break;
        case 'update_course_unit':
            update_course_unit($_POST);
        break;
        case 'update_user':
            update_user($_POST,$_FILES);
        break;
        case 'update_admin':
            update_admin($_POST,$_FILES);
        break;
        case 'update_course_details':
            update_course_details($_POST);
        break;


        case 'draw_course_unit_edit_form':
            draw_course_unit_edit_form($_POST);
        break;
        case 'draw_course_edit_form':
            draw_course_edit_form($_POST);
        break;
        case 'draw_lecturer_edit_form':
            draw_lecturer_edit_form($_POST);
        break;
        case 'draw_user_edit_form':
            draw_user_edit_form($_POST);
        break;

        case 'delete_course_unit':
            delete_course_unit($_POST);
        break;
        case 'delete_course':
            delete_course($_POST);
        break;
        case 'delete_user':
            delete_user($_POST);
        break;
        case 'delete_lecturer':
            delete_lecturer($_POST);
        break;




        case 'login':
            login($_POST);
        break;
    }
}


/**
 * 
 * 
 * 
 * <table width="100%" style="border-collapse:collapse" border='1'>
<thead>
<tr>
<?php
for($i=0;$i<6;$i++){
    ?>
    <th><?php echo $lecture_hours[$i]?></th>
    <?php
}
?>
</tr>
</thead>
<tbody>
<?php 
    foreach($all_courses as $key=> $value){
        echo '<tr>';
        echo "<td><b>".$value['day']."</b></td>";
        foreach($value['data'] as $k=>$v){   
            // print_r($v);
            echo "<td>".$v."</td>";
        }
        echo '</tr>';
        
    }

?>


</tbody>
</table>

 * 
 */