<?php
session_start();
include "config.db.php"; 

$it = 0;
$lecture_hours = array('Day','7am-9am','9am-11am','11am-1pm','2pm-4pm','4pm-6pm');
$days = ['Monday','Tuesday','Wednesday','Thurshday','Friday'];

function generate_random_units($arr){
    $arr_count = count($arr);
    $res = array();
    $counter = $arr_count;
    for($i=0;$i<$counter;$i++){
        array_push($res,$arr[mt_rand(0,$arr_count-1)]);
    }
    return $res;
}


function spread($arr){
    $res = array();
    $name = null;
    foreach($arr as $key=>$value){
        foreach($value as $k=>$v){
            $name = $value['course_unit_id'].' '.$value['name'];
        }
        array_push($res,$name);
    }
    asort($res);
    return $res;
}
function select_courses($year,$sem){
    global $con;
    global $_SESSION;
    if(isset($_SESSION['timetable_courseID'])){
        $couse_id = $_SESSION['timetable_courseID'];
        $sql = $con->query("SELECT * FROM course_unit WHERE semester='$sem' AND  year='$year' AND course_id=$couse_id ORDER BY RAND() LIMIT 1");
        $courses = array();
        if($sql){
            while($row[] = $sql->fetch_assoc()){
                $courses = $row;
            }
            $all = spread($courses);
            $week_days = array(
                ['day'=>'Monday','data'=>$all],
                ['day'=>'Tuesday','data'=>$all],
                ['day'=>'Wednesday','data'=>$all],
                ['day'=>'Thurshday','data'=>$all],
                ['day'=>'Friday','data'=>$all]
            );
        
        }

        return $week_days;


    }else {
        echo "<h1>Sorry You can not perform this operation</h1>";
        die();
    }
   
}

function combine_course_units(){
    $y11 = select_courses("one","one");
    $y12 = select_courses("one","two");
    $y21 = select_courses("two","one");
    $y22 = select_courses("two","two");
    $y31 = select_courses("three","one");
    $y32 = select_courses("three","two");

    return [...$y11,...$y12,...$y21,...$y22,...$y31,...$y32];
}
function merge_course_units_per_day(&$arr){
    $all_count = count($arr);
    $monday = [];
    $tuesday = [];
    $wednesday = [];
    $thursday = [];
    $friday = [];
    
    for($i=0;$i<$all_count-1;$i++){
        $temp  = $arr[$i]['day'];
        $data  = $arr[$i]['data'];
    
        switch($temp){
            case 'Monday':
                array_push($monday,...$data);
            break;
                case 'Tuesday':
                array_push($tuesday,...$data);
            break;
                case 'Wednesday':
                array_push($wednesday,...$data);
            break;
                case 'Thurshday':
                array_push($thursday,...$data);
            break;
                case 'Friday':
                array_push($friday,...$data);
            break;
        }
    }
    
        return ([['day'=>'Monday','data'=>$monday],['day'=>'Tuesday','data'=>$tuesday],['day'=>'Wednesday','data'=>$wednesday],['day'=>'Thursday','data'=>$thursday],['day'=>'Friday','data'=>$friday]]);

}
function increment($i){
    $i++;
}
function draw_td($arr){
   
    global $con;
    global $_SESSION;
    $couse_id = $_SESSION['timetable_courseID'];
    $all = combine_course_units();
    $merged = merge_course_units_per_day($all);
    echo "<td>";
    foreach($merged as $key=> $value){
        foreach($value['data'] as $k=>$v){   
            // print_r($v); 
            echo $v."<br>";
        }
        break;
    }
    echo "</td>";
   
}

$all_courses = combine_course_units();

$merged = merge_course_units_per_day($all_courses);

?>
<button  onclick="window.print()">Print</button>
 <table width="100%" style="border-collapse:collapse" border='1'>
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
    foreach($merged as $key=> $value){
        echo '<tr>';
        echo "<td><b>".$value['day']."</b></td>";
        for($i=0;$i<5;$i++){
            draw_td($value['data']);
        
        }
        echo '</tr>';
        
    }

?>


</tbody>
</table>