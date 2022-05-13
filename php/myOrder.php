<?php
header("Content-type: text/html; charset=utf-8");
require './functions.php';
require './classes.php';
session_start();

if (!array_key_exists('current_user', $_SESSION)) {
    die("我缓缓打出一个?");
}
$id = $_SESSION['current_user']->ID_card_num;
$username = $_SESSION['current_user']->username;

?>

<head>
    <meta charset="UTF-8">
    <title>我的订单</title>

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
    table {
        border: 1px solid blue; /* 设置边框*/
        border-collapse: collapse; /* 单一边框 */
        width: 1800px; /* 整体宽度拉满 */

    }

    tr {
        height: 50px;
    }

    td {
        text-align: center;
        width: 6.25%;
        font-size: 20px;
    }

    tr:nth-child(odd) {
        background: #c1e3f8;
    }


    th {
        position: relative;
        height: 70px;
        font-size: 25px;
        background: #76d3ff;
        width: 6.25%;
    }

    #table_head {
        position: absolute;
        top: 265px;
        width: 1800px;
        z-index: 10;
    }

    #table_main {
        position: absolute;
        top: 335px;
    }


    #query_info {
        font-size: 30px;
        text-align: center;
        line-height: 70px;
    }

    #query_info div {
        width: 25%;
        float: left;
        font-size: 25px;
    }

    #query_info div label {
        position: relative;
        left: 10%;
        line-height: 100%;
    }

</style>

<body>

<div id='head_region'>
    <div id='logo_figure'>
        <a href=../index.php>
            <img src="../images/logo.png" width="400" height="100" alt=''/>
        </a>
    </div>

    <!--    上方信息框-->
    <div id="Log_in_message" onclick="clickAboveButtonFromQueries()">
        <?php
        if (array_key_exists('current_user', $_SESSION)) {
            echo "已登录 : " . $_SESSION["current_user"]->username;
            $user_ID_num = $_SESSION["current_user"]->ID_card_num;
            if ($_SESSION['current_user']->IsDBA == 1) echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp管理员";
            echo '<br>';
        } else echo '尚未登录！点击此处登录';
        ?>
    </div>
    <?php
    if (array_key_exists('current_user', $_SESSION)) {
        echo "<div onclick= ' function(){ clickAboveButtonFromQueries(); clickZhuXiao() }' style = 'cursor : pointer;
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


    <div id='select_links'>
        <a id='首页' href="../index.php">首页</a>
        <a id='登录' onclick="clickAboveButtonFromQueries()">登录</a>
        <a id='车票'>车票</a>
        <a id='信息查询' onclick="clickAboveButtonFromQueries()">信息查询</a>
        <a id='出行指南' onclick="clickMyOrderButton('')">我的订单</a>
    </div>

    <script>
        const x = document.getElementById('出行指南');  // 首页颜色更深
        x.style.backgroundColor = '#0066ff';
    </script>

</div>

<div id='query_info' style="position: relative; height: 100px; width: 1600px; top : 15px; margin: auto;">
    用户 <?php echo $username ?> 的订单
</div>

<div id='query_table' style=" width: 1800px; margin: auto; overflow-y: auto">
    <script>
        window.addEventListener("scroll", function () {
            let tmp = document.getElementById('table_head');
            let tmp2 = document.getElementById('table_main');
            let top = tmp2.getBoundingClientRect().top;
            if (top < 70) {
                tmp.style.position = "fixed";
                tmp.style.top = "0";
            } else {
                tmp.style.position = "absolute";
                tmp.style.top = "265";
            }
        });   // 最上面一栏固定

    </script>

    <?php

    $conn = new mysqli("p:23.105.201.214", "phpserver", "123456", "train_system");
    mysqli_query($conn, "set names utf8");  // 半个小时 2020/12/17/20:18 解决

    if ($conn->connect_error) {
        die("error" . $conn->error);
    }


    $stmt = $conn->prepare("call CheckOrder(?)");
    $stmt->bind_param("i", $id);

    $stmt->execute();
    $stmt->bind_result($t0, $t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9, $t10, $t11, $t12, $t13, $t14, $t15);

    $result_array = [];

    while ($stmt->fetch()) {
        $result_array[] = new query_myOrder($t0, $t1, $t2, $t3, $t4, $t5, $t6, $t7, $t8, $t9, $t10, $t11, $t12, $t13, $t14, $t15);
    }

    $stmt->close();
    $conn->close();

    $table_head = "<table id = 'table_head'>
    
    <tr>
        <th> 车次 </th>
        <th> 车型 </th>
        <th> 出发站 </th>
        <th> 到达站 </th>
        <th> 发车日期 </th>
        <th> 出发时间 </th>
        <th> 到达时间 </th>
        <th> 座位类型 </th>
        <th> 座位号 </th>
        <th> 车厢 </th>
        <th> 检票口 </th>
        <th> 价格 </th>
        <th> 订单状态 </th>
        <th> 创建时间 </th>
        <th> 支付 </th>
        <th> 取消 </th> 
       
    </tr></table>";

    $table = "<table id = table_main>";

    for ($i = 0; $i < count($result_array); $i++) {
        $table .= "<tr>";
        $BianHao = $result_array[$i]->DingDanBianHao;
        $CheCi = $result_array[$i]->LieCheMing;
        $zhungtai = $result_array[$i]->DingDanZhuangTai;
        $price = $result_array[$i]->JiaGe;
        $FaCheRiQi = getDateAfter($result_array[$i]->DiJiTian);
        $table .= "<td style='cursor: pointer' onclick = checkTimeTable('$CheCi') >" . $result_array[$i]->LieCheMing . "</td>";
        $table .= "<td>" . $result_array[$i]->LieCheLeiXing . "</td>";
        $table .= "<td>" . $result_array[$i]->ChuFaZhan . "</td>";
        $table .= "<td>" . $result_array[$i]->DaoDaZhan . "</td>";
        $table .= "<td>" . $FaCheRiQi . "</td>";
        $table .= "<td>" . $result_array[$i]->FaCheShiJian . "</td>";
        $table .= "<td>" . $result_array[$i]->DiDaShiJian . "</td>";
        $table .= "<td>" . $result_array[$i]->ZuoWeiBianHao . "</td>";
        $table .= "<td>" . $result_array[$i]->ZuoWeiLeiXing . "</td>";
        $table .= "<td>" . $result_array[$i]->CheXiangHao . "</td>";
        $table .= "<td>" . $result_array[$i]->JianPiaoKou . "</td>";
        $table .= "<td>" . $result_array[$i]->JiaGe . "</td>";
        $table .= "<td>" . $result_array[$i]->DingDanZhuangTai . "</td>";
        $table .= "<td>" . $result_array[$i]->XiaDanShiJian . "</td>";
        $table .= "<td> <button class = 'zhifu' onclick=clickZhiFu('$BianHao','$zhungtai','$price')>支付</button> </td>";
        $table .= "<td> <button class = 'quxiao' onclick=clickQuXiao('$BianHao','$zhungtai')>取消</button> </td>";
    }

    $table .= "</table>";

    echo $table_head;
    echo $table;
    ?>


</div>

</body>

<style>
    button {
        width: 60%;
        height: 40px;
        border: none;
        border-radius: 12px;
    }

    .zhifu {
        background-color: #cd0a0a;
        color: white;
    }

    .quxiao {
        background-color: #44cd0a;
    }

</style>

<script>
    function clickZhiFu(BianHao, ZhuangTai, price) {
        if (ZhuangTai === "已下单") {
            let bool = confirm("确定支付吗？这将花费" + price + " !");
            if (bool) {
                let xmlhttp;
                if (window.XMLHttpRequest) {
                    //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        alert(xmlhttp.responseText);
                        location.reload();
                    }
                }

                let url = "./ZhiFuDingDan.php?BianHao=" + BianHao;

                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
        } else if (ZhuangTai === '已支付') {
            alert('已支付过!');
        } else {
            alert('订单已取消!');
        }
    }

    function clickQuXiao(BianHao, ZhuangTai) {
        if (ZhuangTai === "已取消" || ZhuangTai === "被撤销") {
            alert("订单已经取消了!");
        } else {
            let bool = confirm("你确定吗?这将取消你的订单!");
            if (bool) {
                let xmlhttp;
                if (window.XMLHttpRequest) {
                    //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // IE6, IE5 浏览器执行代码
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                        alert(xmlhttp.responseText);
                        location.reload();
                    }
                }

                let url = "./QuXiaoDingDan.php?BianHao=" + BianHao;

                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            }
        }
    }
</script>
