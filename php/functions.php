<?php

header("Content-type: text/html; charset=utf-8");

function getDayBetween($date){
    $currentDate = time();

    $pastDate = strtotime($date);
    $interval = ceil(($pastDate - $currentDate)/(3600*24));
    if($interval == "-0") return 0;
    else return $interval;
}

function getDateAfter($nth_day){
    $currentDate = time();
    $pastTime = $nth_day * 24 * 3600;
    $currentDate += $pastTime;

    return date('Y-m-d', $currentDate);
}

function checkCorrectDay($day){
    return $day <= 14 && $day >= 0;
}

function compare_time($a, $b){
    $a_array = explode(":", $a);
    $b_array = explode(":", $b);
    if($a_array[0] > $b_array[0]) return 1;
    else if($a_array[0] < $b_array[0]) return -1;
    else return $a_array[1] > $b_array[1];
}

function compare_depart_time_asc($a, $b){
    return compare_time($a->depart_time, $b->depart_time);
}

function compare_depart_time_dsc($a, $b){
    return compare_time($b->depart_time, $a->depart_time);
}

function compare_arrive_time_asc($a, $b){
    return compare_time($a->arrive_time, $b->arrive_time);
}

function compare_arrive_time_dsc($a, $b){
    return compare_time($b->arrive_time, $a->arrive_time);
}

function compare_YingWo_price_asc($a, $b){
    return $a->YingWo_price - $b->YingWo_price;
}

function compare_YingWo_price_dsc($a, $b){
    return $b->YingWo_price - $a->YingWo_price;
}

function compare_RuanWo_price_asc($a, $b){
    return $a->RuanWo_price - $b->RuanWo_price;
}

function compare_RuanWo_price_dsc($a, $b){
    return $b->RuanWo_price - $a->RuanWo_price;
}

function compare_YingZuo_price_asc($a, $b){
    return $a->YingZuo_price - $b->YingZuo_price;
}

function compare_YingZuo_price_dsc($a, $b){
    return $b->YingZuo_price - $a->YingZuo_price;
}

function compare_RuanZuo_price_asc($a, $b){
    return $a->RuanZuo_price - $b->RuanZuo_price;
}

function compare_RuanZuo_price_dsc($a, $b){
    return $b->RuanZuo_price - $a->RuanZuo_price;
}

function compare_Day_asc($a, $b){
    return $a->day - $b->day ;
}

function compare_Day_dsc($a, $b){
    return $b->day  - $a->day ;
}
