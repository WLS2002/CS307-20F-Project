<?php
header("Content-type: text/html; charset=utf-8");
require './functions.php';
require './classes.php';
session_start();

$user_ID_num = 'un_log_in';
$train_name = $_GET['train_name'];
//$train_name = 'C1005';
?>

<head>
    <meta charset="UTF-8">
    <title>列车时间表</title>

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
        width :1200px;  /* 整体宽度拉满 */
    }

    tr{
        height: 50px;
    }

    td{
        text-align: center;
        width: 7.69%;
        font-size: 20px;
    }

    tr:nth-child(odd){
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
        z-index: 10;
    }
    #table_main{
        position: absolute;
        top:335px;
    }

    .query_box{
        z-index: 40;
        height: 60%;
        font-size: 20px;
    }

    .query_button{
        position: relative;
        width: 50%;
        background-color: #ff3100;
    }

    #query_info{
        font-size: 30px;
        text-align: center;
        line-height: 70px;
    }

    #query_info div{
        width :33%;
        float : left;
        font-size: 25px;
    }

    #query_info div label{
        position: relative;
        left : 10%;
        line-height: 100%;
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
        echo "<div onclick='function tmp(){ clickAboveButtonFromQueries(); clickZhuXiao() }' style = 'cursor : pointer;
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
        <a id = '出行指南' onclick = "clickMyOrderButton('<?php echo $user_ID_num ?>')" >我的订单</a>
    </div>

    <script>
        const x = document.getElementById('信息查询');  // 首页颜色更深
        x.style.backgroundColor = '#0066ff';
    </script>

</div>

<div id = 'query_info' style = "position: relative; width : 1600px; height: 100px; top : 15px; margin: auto;">
    <div>
        时间表 :  <?php echo $train_name ?>
    </div>

    <div>
        <button class = "ChaXunButton query_box query_button" id = 'DBAButton1' onclick="clickActionButton('delete')"> 删除车站 </button>
    </div>

    <div>
        <button class = "ChaXunButton query_box query_button" id = 'DBAButton2' onclick="clickActionButton('add')"> 增添车站 </button>
    </div>

    <?php
    function getIsDBA(){
        if(!array_key_exists('current_user', $_SESSION)){
            return 0;
        }
        return $_SESSION['current_user']->IsDBA;
    }
    ?>

    <script>

        if( '<?php echo getIsDBA() ?>' === '1'){
            showTwoButtons();
        }else hideTwoButtons();

        function hideTwoButtons(){
            document.getElementById('DBAButton1').setAttribute('hidden', 'true');
            document.getElementById('DBAButton2').setAttribute('hidden', 'true');
        }

        function showTwoButtons(){
            document.getElementById('DBAButton1').removeAttribute('hidden');
            document.getElementById('DBAButton2').removeAttribute('hidden');

        }


    </script>

</div>

<div id = 'query_table' style = " width: 1200px; margin : auto; overflow-y: auto" >
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

    $conn = new mysqli("p:23.105.201.214", "phpserver", "123456", "train_system");
    mysqli_query($conn, "set names utf8");  // 半个小时 2020/12/17/20:18 解决

    if($conn -> connect_error){
        die("error" . $conn ->error);
    }


    $stmt = $conn -> prepare("call ListAllStationsOfATrain(?)");
    $stmt -> bind_param("s", $train_name);

    $stmt -> execute();
    $stmt -> bind_result($t0,$t1, $t2, $t3, $t4, $t5, $t6, $t7);

    $result_array = [];

    while($stmt -> fetch()){
        $result_array[] = new query_train_time_table($t0, $t1, $t2, $t3, $t4, $t5, $t6, $t7);
    }

    $stmt -> close();
    $conn -> close();

    $table_head = "<table id = 'table_head'>
    
    <tr>
        <th> 车次 </th>
        <th> 站序 </th>
        <th> 站点名 </th>
        <th> 抵达时间 </th>
        <th> 离开时间 </th>
        <th> 第几日 </th>
    </tr></table>";

    $table = "<table id = table_main>";

    $max_nth_station = 0;

    $station_names_in_php = [];
    $arrive_times_in_php = [];
    $depart_times_in_php = [];
    for($i = 0; $i < count($result_array); $i++){
        $arrive_time = $result_array[$i]->arrive_time == null ? "起点站" :  $result_array[$i]->arrive_time;
        $depart_time = $result_array[$i]->depart_time == null ? "终点站" :  $result_array[$i]->depart_time;
        $table.="<tr>";
        $table.="<td>".$result_array[$i]->train_name ."</td>";
        $table.="<td>".$result_array[$i]->nth_station ."</td>";
        $table.="<td>".$result_array[$i]->station_name ."</td>";
        $table.="<td>". $arrive_time ."</td>";
        $table.="<td>". $depart_time ."</td>";
        $table.="<td>". $result_array[$i]->nth_day ."</td>";
        $max_nth_station = $result_array[$i]->nth_station;
        $table.='</tr>';
        $station_names_in_php[] = $result_array[$i]->station_name;
        $arrive_times_in_php[] = $arrive_time;
        $depart_times_in_php[] = $depart_time;
    }

    $table.="</table>";

    echo $table_head;
    echo $table;
    ?>


</div>

<div id = secrete_input_window>
    <div id = 'shadow'> </div>

    <div id = 'secrete_box'>

        <div class = 'delete_element'>
            <label for="delete_index"> 选择删除的站点(站序) </label><select id = "delete_index">
            </select>
        </div>

        <div class = 'add_element'>
            <label for="add_index"> 选择增添站点的位置(站序)  </label><select id = "add_index">
            </select>
        </div>

        <div class = 'add_element'>
            <label> 到站时间 :
                <input type='time' id = 'arrive_time'>
            </label>
        </div>

        <div class = 'add_element'>
            <label> 出站时间 :
                <input type='time' id = 'depart_time'>
            </label>
        </div>

        <div class = 'add_element'>
            <label for='KuaYueTianShu'>插入站点名</label>
            <input type = "text" id = 'KuaYueTianShu' class = "text input_station">
        </div>


        <div>
            <button id = 'cancel' onclick="clickCancel()"> 取消 </button>
            <button id = 'confirm' onclick="clickConfirm()"> 确定 </button>
        </div>

    </div>

</div>


</body>

<!--输入框样式-->
<style>

    #shadow{
        position: absolute;
        top:0;
        left: 0;
        height: 100%;
        z-index: 100;
        width: 100%;
        background-color: #212121;
        opacity: 90%;
        display: none;
    }

    #secrete_box{
        width: 50%;
        height : 30%;
        background : #fff;
        z-index: 200;
        position: fixed;
        left:25%;
        top: 35%;
        border-radius : 12px;
        display: none;
    }

    #secrete_box span{
        font-size: 25px;
        position: relative;
        margin: auto;
        display: none;
    }

    #secrete_box div{
        position: relative;
        float: top;
        top:5%;
        width: 100%;
        /*height: 30%;*/
        font-size: 25px;
        left :2%;
    }


    .add_element{
        height: 20%;
    }

    .delete_element{
        height: 50%;
    }

    #cancel{
        position: relative;
        width: 40%;
        height: 60px;
        background-color: #a3a3a3;
        border-bottom: none;
        border-radius : 12px;
        color: white;
        font-size: 16px;
        top:13%;
        left : 0;
    }

    #confirm{
        position: relative;
        width: 40%;
        height: 60px;
        background-color: #49aaff;
        border-bottom: none;
        border-radius : 12px;
        color: white;
        font-size: 16px;
        top:13%;
        left : 15%;
    }

    #cancel:hover{
        background-color: #767676;
    }



    #confirm:hover{
        background-color: #1591fc;
    }


    #secrete_box div select{
        font-size: 25px;
    }

    #secrete_box div input{
        height: 70%;
        width: 40%;
        background-color: #e3e3e3;
        border: none;
        font-size: 25px;
        text-align: center;
        border-radius : 12px;
    }


</style>

<script>
    addOptions();

    var length;
    var station_names;
    var arrive_times;
    var depart_times;


    function addOptions(){
        length = parseInt('<?php echo $max_nth_station ?>');

        let select1 = document.getElementById('delete_index');
        let select2 = document.getElementById('add_index');


        if(length >= 2) {
            for (let i = 2; i < length; i++) {
                select1.options.add(new Option(i.toString(),i.toString()));
            }
            for (let i = 2; i <= length; i++) {
                select2.options.add(new Option(i.toString(), i.toString()));
            }
        }

        station_names = eval(<?php echo json_encode($station_names_in_php);?>);
        arrive_times = eval(<?php echo json_encode($arrive_times_in_php);?>);
        depart_times = eval(<?php echo json_encode($depart_times_in_php);?>);


    }

    function clickActionButton(type){
        document.getElementById('shadow').style.display = "block";
        document.getElementById('secrete_box').style.display = "block";

        if(type === 'delete'){
            document.getElementById('secrete_box').style.height = '20%';
            changeAddElements('none');
            changeDeleteElements('block');
        }else{
            document.getElementById('secrete_box').style.height = '60%';
            changeAddElements('block');
            changeDeleteElements('none');
        }
    }

    function clickCancel(){
        document.getElementById('shadow').style.display = "none";
        document.getElementById('secrete_box').style.display = "none";

    }

    function changeDeleteElements(type){
        let array = document.getElementsByClassName('delete_element');
        for(let i = 0; i < array.length; i++)
            array[i].style.display = type;
    }

    function changeAddElements(type){
        let array = document.getElementsByClassName('add_element');
        for(let i = 0; i < array.length; i++)
            array[i].style.display = type;
    }

    function clickConfirm(){
        if(document.getElementById('secrete_box').style.height === '20%'){
            DeleteStation();
        }else AddStation();
    }

    function DeleteStation(){
        let station_index = getVal('delete_index');
        let station_name = station_names[station_index - 1];


        let bool = confirm("你确定吗？这将删除" + '<?php echo $train_name?>' + "中的" + station_name + "站点!");
        if(!bool){
            return;
        }

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

        let url = "./DeleteStation.php?train_name=" + '<?php echo $train_name?>' + "&station_name=" + station_name;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }

    function AddStation(){
        let index = getVal('add_index');
        let time_arrive = getVal('arrive_time');
        let time_depart = getVal('depart_time');
        let station_name = getVal('KuaYueTianShu');

        if(time_arrive === "" || time_depart === ""){
            alert("插入时间错误!");
            return;
        }

        if(!checkInsertTime(time_arrive, depart_times[index - 2], depart_times[index - 1])){
            alert("插入时间错误!");
            return;
        }

        if(time_arrive.charAt(0) === '0'){
            time_arrive = time_arrive.substr(1);
        }

        if(time_depart.charAt(0) === '0'){
            time_depart = time_depart.substr(1);
        }

        if(availableTags.indexOf(station_name) < 0){
            alert("不是有效车站!");
            return;
        }

        let bool = confirm("你确定吗？这将在车次" + '<?php echo $train_name?>' + "中增加" + station_name + "站点!");
        if(!bool){
            return;
        }

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

        let url = "./AddStation.php?train_name=" + '<?php echo $train_name?>' + "&station_name=" + station_name + "&nth_station=" + index + "&arrive_time=" + time_arrive + "&depart_time=" + time_depart;
        xmlhttp.open("GET", url, true);
        xmlhttp.send();

    }


</script>