<?php
header("Content-type: text/html; charset=utf-8");
require './functions.php';
require './classes.php';
session_start();


$type = $_GET["type"];
$sort_name = $_GET["sort_name"];
$id = $_GET["id"];
$location = $_GET["location"];

$result_array = $_SESSION[$id];

$sort_type = $type == "up" ? "asc" : "dsc";
$sort_function_name = "compare_" . $sort_name . "_" . $sort_type;

usort($result_array, $sort_function_name);

if ($location == "DanChen") {
    $table = "<table id = table_main>";
    for($i = 0; $i < count($result_array); $i++){
        $CheCi = $result_array[$i]->CheCi;
        $depart_station = $result_array[$i]->depart_station;
        $arrive_station = $result_array[$i]->arrive_station;
        $date = $_SESSION['query_date'];
        $time = $result_array[$i]->depart_time;
        $ticket_type = $result_array[$i]->ticket_type;

        $YW = $result_array[$i]->YingWo;
        $YZ = $result_array[$i]->YingZuo;
        $RW = $result_array[$i]->RuanWo;
        $RZ = $result_array[$i]->RuanZuo;


        if(array_key_exists('current_user', $_SESSION))
            $user_ID_num = $_SESSION["current_user"]->ID_card_num;
        else $user_ID_num = 'un_log_in';

        $table.="<tr>";
        $table.="<td style='cursor: pointer' onclick = checkTimeTable('$CheCi')>".$result_array[$i]->CheCi ."</td>";
        $table.="<td>".$result_array[$i]->depart_station ."</td>";
        $table.="<td>".$result_array[$i]->arrive_station ."</td>";
        $table.="<td>".$result_array[$i]->depart_time ."</td>";
        $table.="<td>".$result_array[$i]->arrive_time ."</td>";
        $table.="<td style = 'cursor:pointer' onclick=buyTickets('$CheCi','$depart_station','$arrive_station','$date','硬卧','$user_ID_num','$time','$ticket_type','$YW')>".$result_array[$i]->YingWo ."</td>";
        $table.="<td>".$result_array[$i]->YingWo_price ."</td>";
        $table.="<td style = 'cursor:pointer' onclick=buyTickets('$CheCi','$depart_station','$arrive_station','$date','硬座','$user_ID_num','$time','$ticket_type','$YZ')>".$result_array[$i]->YingZuo ."</td>";
        $table.="<td>".$result_array[$i]->YingZuo_price ."</td>";
        $table.="<td style = 'cursor:pointer' onclick=buyTickets('$CheCi','$depart_station','$arrive_station','$date','软卧','$user_ID_num','$time','$ticket_type','$RW')>".$result_array[$i]->RuanWo ."</td>";
        $table.="<td>".$result_array[$i]->RuanWo_price ."</td>";
        $table.="<td style = 'cursor:pointer' onclick=buyTickets('$CheCi','$depart_station','$arrive_station','$date','软座','$user_ID_num','$time','$ticket_type','$RZ')>".$result_array[$i]->RuanZuo ."</td>";
        $table.="<td>".$result_array[$i]->RuanZuo_price ."</td>";
    }
    $table .= "</table>";
    echo $table;
}else if($location == "SYCC"){
    $table = "<table id = table_main>";
    for ($i = 0; $i < count($result_array); $i++) {
        $table .= "<tr>";
        $table .= "<td>" . $result_array[$i]->CheCi . "</td>";
        $table .= "<td>" . $result_array[$i]->depart_station . "</td>";
        $table .= "<td>" . $result_array[$i]->arrive_station . "</td>";
        $table .= "<td>" . $result_array[$i]->depart_time . "</td>";
        $table .= "<td>" . $result_array[$i]->arrive_time . "</td>";
        $table .= "<td>" . $result_array[$i]->YingWo . "</td>";
        $table .= "<td>" . $result_array[$i]->YingWo_price . "</td>";
        $table .= "<td>" . $result_array[$i]->YingZuo . "</td>";
        $table .= "<td>" . $result_array[$i]->YingZuo_price . "</td>";
        $table .= "<td>" . $result_array[$i]->RuanWo . "</td>";
        $table .= "<td>" . $result_array[$i]->RuanWo_price . "</td>";
        $table .= "<td>" . $result_array[$i]->RuanZuo . "</td>";
        $table .= "<td>" . $result_array[$i]->RuanZuo_price . "</td>";
        $table .= "<td>" . $result_array[$i]->day . "</td>";
    }
    $table .= "</table>";
    echo $table;
}




