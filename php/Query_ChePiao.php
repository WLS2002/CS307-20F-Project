<?php
    header("Content-type: text/html; charset=utf-8");
    require './functions.php';
    require './classes.php';
    session_start();

    $depart_station = $_GET["ChuFaDi"];
    $arrive_station = $_GET["DaoDaDi"];
    $date = $_GET["Date"];
    if($depart_station == null || $arrive_station == null || $date == null)
        die("非法访问！");
    $day = getDayBetween($date);
    //echo "<script>alert('$day')</script>";



    $user_ID_num = "un_log_in";
    $_SESSION['query_date'] = $date;
?>

<head>
    <meta charset="UTF-8">
    <title>单程查询</title>

    <link rel="shortcut icon" href="../favicon.png"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/select_box.css">
    <link rel="stylesheet" type="text/css" href="../js/lib/jquery-ui.min.css">
    <script src="../js/lib/jquery.js"></script>
    <script src="../js/select_location.js"></script>
    <script src="../js/input_autocom.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="../js/clickButton.js"></script>
    <script src="../js/other.js"></script>
</head>

<style>
    table{
        border: 1px solid blue;  /* 设置边框*/
        border-collapse:collapse;  /* 单一边框 */
        width :1800px;  /* 整体宽度拉满 */

    }

    tr{
        height: 50px;
        width: 1800px;
    }

    td{
        text-align: center;
        width: 7.69%;
        font-size: 20px;
    }

    tr:nth-child( odd){
        background: #c1e3f8;
    }
    th{
        position: relative;
        height: 70px;
        font-size: 25px;
        background: #76d3ff;
        width: 7.69%;
    }

    #table_head{
        position: absolute;
        top:265px;
        width: 1800px;
        z-index: 10;
    }

    #table_main{
        position: absolute;
        top:335px;
        width :1800px;
    }

    .query_box{
        z-index: 40;
        height: 60%;
        font-size: 20px;
    }

    .query_button{
        position: relative;
        width: 50%;
        left:25%;
    }
    #query_info div{
        width :25%;
        float : left;
        font-size: 25px;
    }

    #query_info div label{
        position: relative;
        left : 10%;
        line-height: 100%;
    }

    .up_triangle{
        position: absolute;
        left : 119px;
        top : 15px;
    }

    .down_triangle{
        position: absolute;
        left : 119px;
        top:35px;
    }


</style>

<body>

<div id = 'head_region'>
    <div id = 'logo_figure'>
        <a href = ../index.php>
            <img src="../images/logo.png" width="400" height="100" alt = ''/>
        </a>
    </div>

<!--    上方信息框-->
    <div id = "Log_in_message" onclick= "clickAboveButtonFromQueries()">
        <?php
        if(array_key_exists('current_user', $_SESSION)){
            echo "已登录 : ".$_SESSION["current_user"]->username;
            $user_ID_num = $_SESSION["current_user"]->ID_card_num;
            if($_SESSION['current_user']->IsDBA == 1) echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp管理员";
            echo '<br>';
        }else echo '尚未登录！点击此处登录';
        ?>
    </div>
    <?php
    if(array_key_exists('current_user', $_SESSION)){
        echo "<div onclick='clickZhuXiao()' style = 'cursor : pointer;
    position : relative;
    left: 1400px;
    font-size: 21px;
    text-underline: teal;
    height: 0;
    top:10px;
    color:red'> 退出登录 </div>";
    }
    ?>
    <!--
        <script>
            let i = 0;
            const x1 = document.getElementById('head_region');
            function rotate(){
                x1.style.transform = "rotateX(" + i + "deg)";
                i++;
                if(i === 360) i = 1;
            }
            setInterval("rotate()", 10)
        </script>
    旋转，图一乐
        -->


    <div id = 'select_links'>
        <a id = '首页' href="../index.php">首页</a>
        <a id = '登录' onclick="clickAboveButtonFromQueries()" >登录</a>
        <a id = '车票' >车票</a>
        <a id = '信息查询' onclick =  "clickAboveButtonFromQueries()">信息查询</a>
        <a id = '出行指南' onclick = "clickMyOrderButton('<?php echo $user_ID_num; ?>')" >我的订单</a>
    </div>

    <script>
        const x = document.getElementById('车票');  // 首页颜色更深
        x.style.backgroundColor = '#0066ff';
    </script>

</div>

<div id = 'query_info' style = "position: relative; height: 100px; width: 1600px; top : 15px; margin: auto">

    <div>
        <label for = 'query_ChuFaDian'>出发点</label>
        <input type = "text" class = "text input_station query_box" id = 'query_ChuFaDian' value = "<?php echo $depart_station?>" >
    </div>

    <div>
        <label for = 'query_DaoDaDi'>到达地</label>
        <input type = "text" class = "text input_station query_box" id = 'query_DaoDaDi' value = "<?php echo $arrive_station?>">
    </div>

    <div>
        <label for = 'query_ChuFaRiQi'>出发日期</label>
        <input type = "date" class = "date query_box" id = 'query_ChuFaRiQi' value = "<?php echo $date?>">
    </div>

    <div>
        <button class = "ChaXunButton query_box query_button" onclick="clickChaXun_ChePiao_DanCheng(getVal('query_ChuFaDian'), getVal('query_DaoDaDi'), getVal('query_ChuFaRiQi'))"> 查询 </button>
    </div>



</div>

<div id = 'query_table' style = "width: 1800px; margin: auto; overflow-y: auto;">
    <script>
        window.addEventListener("scroll", function(){
            let tmp = document.getElementById('table_head');
            let tmp2 = document.getElementById('table_main');
            let top = tmp2.getBoundingClientRect().top;
            if(top < 70){
                tmp.style.position = "fixed";
                tmp.style.top = "0";
            }else{
                tmp.style.position = "absolute";
                tmp.style.top = "265";
            }
        });   // 最上面一栏固定

    </script>

    <?php

    /*$depart_station = "··";
    $arrive_station = "广州南";*/

    $conn = new mysqli("p:23.105.201.214", "phpserver", "123456", "train_system");
    mysqli_query($conn, "set names utf8");  // 半个小时 2020/12/17/20:18 解决

    if($conn -> connect_error){
        die("error" . $conn ->error);
    }

    $bind_day = checkCorrectDay($day) ? $day : 0;


    $stmt = $conn -> prepare("call QueryByStation(?,?,?)");
    $stmt -> bind_param("sss", $bind_day,$depart_station, $arrive_station);

    $stmt -> execute();
    $stmt -> bind_result($t0,$t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9, $t10,$t11, $t12, $t13, $t14, $t15);

    $result_array = [];

    while($stmt -> fetch()){
        $result_array[] = new query_tickets($t0, $t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9, $t10,$t11, $t12, $t13, $t15);
    }

    $QSid = (string)rand()."id";

    $_SESSION[$QSid] = $result_array;

    $stmt -> close();
    $conn -> close();

    $table_head = "<table id = 'table_head'> 

<tr> 
    <th> 车次 </th> 
    <th> 出发站 </th> 
    <th> 到达站 </th> 
    <th> 出发时间 <img src='../images/up_gray.svg' alt = '' width= 20 height= 20 class = 'up_triangle up_down_button' onclick = click_up_or_down(this,'up','depart_time','$QSid','DanChen') > 
                <img src='../images/down_gray.svg' alt = '' width= 20 height= 20 class = 'down_triangle up_down_button' onclick = click_up_or_down(this,'down','depart_time','$QSid','DanChen')> </th> 
    <th> 到达时间 <img src='../images/up_gray.svg' alt = '' width= 20 height= 20 class = 'up_triangle up_down_button' onclick = click_up_or_down(this,'up','arrive_time','$QSid','DanChen') > 
                <img src='../images/down_gray.svg' alt = '' width= 20 height= 20 class = 'down_triangle up_down_button' onclick = click_up_or_down(this,'down','arrive_time','$QSid','DanChen')> </th> 
    <th> 硬卧 </th>
    <th> 硬卧价格 <img src='../images/up_gray.svg' alt = '' width= 20 height= 20 class = 'up_triangle up_down_button' onclick = click_up_or_down(this,'up','YingWo_price','$QSid','DanChen') > 
                <img src='../images/down_gray.svg' alt = '' width= 20 height= 20 class = 'down_triangle up_down_button' onclick = click_up_or_down(this,'down','YingWo_price','$QSid','DanChen')> </th> 
    <th> 硬座 </th> 
    <th> 硬座价格 <img src='../images/up_gray.svg' alt = '' width= 20 height= 20 class = 'up_triangle up_down_button' onclick = click_up_or_down(this,'up','YingZuo_price','$QSid','DanChen') > 
                <img src='../images/down_gray.svg' alt = '' width= 20 height= 20 class = 'down_triangle up_down_button' onclick = click_up_or_down(this,'down','YingZuo_price','$QSid','DanChen')> </th> 
    <th> 软卧 </th>
    <th> 软卧价格 <img src='../images/up_gray.svg' alt = '' width= 20 height= 20 class = 'up_triangle up_down_button' onclick = click_up_or_down(this,'up','RuanWo_price','$QSid','DanChen') > 
                <img src='../images/down_gray.svg' alt = '' width= 20 height= 20 class = 'down_triangle up_down_button' onclick = click_up_or_down(this,'down','RuanWo_price','$QSid','DanChen') > </th> 
    <th> 软座 </th> 
    <th> 软座价格 <img src='../images/up_gray.svg' alt = '' width= 20 height= 20 class = 'up_triangle up_down_button' onclick = click_up_or_down(this,'up','RuanZuo_price','$QSid','DanChen') > 
                <img src='../images/down_gray.svg' alt = '' width= 20 height= 20 class = 'down_triangle up_down_button' onclick = click_up_or_down(this,'down','RuanZuo_price','$QSid','DanChen')> </th> 
</tr></table>";

    $table = "<table id = table_main>";


    for($i = 0; $i < count($result_array); $i++){
        $ticket_type = $result_array[$i]->ticket_type;
        $CheCi = $result_array[$i]->CheCi;
        $time = $result_array[$i]->depart_time;
        $YW = checkCorrectDay($day) ? $result_array[$i]->YingWo : 180;
        $YZ = checkCorrectDay($day) ? $result_array[$i]->YingZuo : 180;
        $RW = checkCorrectDay($day) ? $result_array[$i]->RuanWo : 180;
        $RZ = checkCorrectDay($day) ? $result_array[$i]->RuanZuo : 180;


        $table.="<tr>";
        $table.="<td style='cursor: pointer' onclick = checkTimeTable('$CheCi','$ticket_type')>".$result_array[$i]->CheCi ."</td>";
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
        $table .= "</tr>";
    }

    $table.="</table>";

    /*while($stmt -> fetch()){
    $table.="<tr>";
        $table.="<td>".$t1."</td>";
        $table.="<td>".$t2."</td>";
        $table.="<td>".$t3."</td>";
        $table.="<td>".$t4."</td>";
        $table.="<td>".$t5."</td>";
        $table.="<td>".$t6."</td>";
        $table.="<td style='color : red'>".$t7."</td>";
        $table.="<td>".$t8."</td>";
        $table.="<td style='color : red'>".$t9."</td>";
        $table.="<td>".$t10."</td>";
        $table.="<td style='color : red'>".$t11."</td>";
        $table.="<td>".$t12."</td>";
        $table.="<td style='color : red'>".$t13."</td>";
        $table.="</tr>";
    }*/

    echo $table_head;
    echo $table;
    ?>


</div>

</body>


