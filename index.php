<?php
header("Content-type: text/html; charset=utf-8");
require './php/functions.php';
require './php/classes.php';
session_start();
$user_ID_num = "un_log_in";
?>

<!DOCTYPE html>
<html lang="ch">

<head>
    <meta charset="UTF-8">
    <title>12307网络购票系统</title>
    <link rel="shortcut icon" href="favicon.png"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/select_box.css">
    <link rel="stylesheet" type="text/css" href="./js/lib/jquery-ui.min.css">
    <script src="./js/lib/jquery.js"></script>
    <script src="./js/input_autocom.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script src="./js/clickButton.js"></script>
    <script src="./js/other.js"></script>



</head>
<body>

<div id = 'head_region'>
    <div id = 'logo_figure'>
        <a href = ./index.php>
            <img src="./images/logo.png" width="400" height="100" alt = ''/>
        </a>
    </div>

    <div id = "Log_in_message" onclick= "clickLeftButton('DengLu')">
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
        <a id = '首页' href="index.php">首页</a>
        <a id = '登录' onclick="clickLeftButton('DengLu')" >登录</a>
        <a id = '车票' onclick="clickLeftButton('ChePiao')" >车票</a>
        <a id = '信息查询' onclick =  "clickLeftButton('ChangYongChaXun')">信息查询</a>
        <a id = '出行指南' onclick = "clickMyOrderButton('<?php echo $user_ID_num ?>')" >我的订单</a>
    </div>

    <script>
        const x = document.getElementById('首页');  // 首页颜色更深
        x.style.backgroundColor = '#0066ff';
    </script>

</div>

<div id = 'running_figures_board'>
    <!--左右按钮-->
    <div id = 'message_window'>
        <!--小信息窗口基本模块已完成，只剩剩下三个小网页的制作-->
        <div id = 'message_window_right'>
            <!--            <iframe id = 'small_frame' src = './inner_htmls/message_window/ticket.html' style="height:100%;width:100%;border:none" > </iframe>-->

            <div class = "message_window_right_boxs" id = "message_window_right_ChePiao">

                <div class='above' id = 'ChePiao_above'>

                    <div class='above_element' id='DanChen' onclick="click_above_ChePiao('DanChen')"> 单程</div>
                    <div class='above_element' id='HuanCheng' onclick="click_above_ChePiao('HuanCheng')"> 换乘</div>
                    <div class='above_element' id='LvChenTuiJian' onclick="click_above_ChePiao('LvChenTuiJian')"> 旅程推荐</div>

                </div>

                <div class = 'below' id = 'ChePiao_below'>
                    <div id = "ChuFaDian_box">
                        <label for="ChuFaDian">出发点</label>
                        <input type = "text" class = "text input_station" id = "ChuFaDian" value = "广州">
                    </div>

                    <div id = "DaoDaDi_box">
                        <label for="DaoDaDi">到达地</label>
                        <input type = "text" class = "text input_station" id = "DaoDaDi" value = "深圳">
                    </div>

                    <div id = "ChuFaRiQi_box">
                        <label for="ChuFaRiQi">出发日期</label><input type="date" class = "date" id="ChuFaRiQi">
                    </div>

<!--                    <div id = "FanChengRiQi_box">-->
<!--                        <label for="FanChengRiQi">返程日期</label><input type="date" class = "date" id="FanChengRiQi">-->
<!--                    </div>-->

                    <div>
                        <button class = "ChaXunButton" onclick="clickChaXun_ChePiao(getVal('ChuFaDian'), getVal('DaoDaDi'), getVal('ChuFaRiQi'))"> 查询 </button>
                    </div>

                </div>
                <script>
                    function right_return_to_norm_ChePiao(){
                        let array = document.getElementsByClassName("above_element");
                        for(let i = 0; i < array.length; i++){
                            array[i].style.color = "gray";
                            array[i].style.borderBottom = 'gray solid 2px';
                        }
                    }

                    function shift_panel_ChePiao(id){
                        switch (id){
                            case "DanChen" : document.getElementById("DaoDaDi_box").removeAttribute('hidden'); break;
                            case "HuanCheng" : document.getElementById("DaoDaDi_box").removeAttribute('hidden'); break;
                            case "LvChenTuiJian": document.getElementById("DaoDaDi_box").setAttribute("hidden", "true");break;
                        }
                    }

                    function click_above_ChePiao(id){
                        let x = document.getElementById(id);
                        if(x.style.color === "rgb(65, 137, 250)" ){
                            return;
                        }
                        right_return_to_norm_ChePiao();
                        x.style.color = "rgb(65, 137, 250)";
                        x.style.borderBottom = 'rgb(65, 137, 250) solid 2px';
                        exchange_small_window_ChePiao(id);
                    }

                    function exchange_small_window_ChePiao(id){
                        fadeOut("ChePiao_below");
                        setTimeout(function (){
                            shift_panel_ChePiao(id);
                            fadeIn("ChePiao_below");
                        }, 100);
                    }

                    function initialize_ChePiao(){
                        document.getElementById("ChuFaRiQi").value = currentDate;

                        right_return_to_norm_ChePiao();
                        let x = document.getElementById("DanChen");
                        x.style.color = "rgb(65, 137, 250)";
                        x.style.borderBottom = 'rgb(65, 137, 250) solid 2px';
                        //document.getElementById("FanChengRiQi_box").setAttribute("hidden", "true");
                    }

                    initialize_ChePiao();

                </script>

            </div>


            <div class = "message_window_right_boxs" id = "message_window_right_ChangYongChaXun">

                <div class='above' id = 'ChangYongChaXun_above'>

                    <div class='above_element' id='ZhengWanDian' onclick="click_above_CYCX('ZhengWanDian')">正晚点</div>
                    <div class='above_element' id='JianPiaoKou' onclick="click_above_CYCX('JianPiaoKou')">检票口</div>
                    <div class='above_element' id='QiShouShiJian' onclick="click_above_CYCX('QiShouShiJian')">起售时间</div>
                    <div class='above_element' id='TianQiChaXun' onclick="click_above_CYCX('TianQiChaXun')">天气查询</div>

                </div>

                <div class = 'below' id = 'ChangYongChaXun_below'>

                    <div class = "CYCX_below" id = "ChaXunLeiXing_box">
                        查询类型
                        <input type = "radio" class = "radio" id = "ChaXunLeiXing_DaoDa" name = "ChaXunLeiXing_result">
                        <label id = "radio_1" for="ChaXunLeiXing_DaoDa">到达站</label>
                        <input type = "radio" class = "radio" id = "ChaXunLeiXing_ChuFa" name = "ChaXunLeiXing_result">
                        <label id = "radio_2" for="ChaXunLeiXing_ChuFa">出发站</label>
                    </div>

                    <div class = "CYCX_below" id = "CheZhan_box">
                        <label for="CheZhan">车站</label>
                        <input type = "text" class = "text input_station" id = "CheZhan">
                    </div>

                    <div class = "CYCX_below" id = "ChengCheRiQi_box">
                        <label for="ChengCheRiQi">乘车日期</label>
                        <input type="date" class = "date" id="ChengCheRiQi">
                    </div>

                    <div class = "CYCX_below" id = "CheCi_box">
                        <label for="CheCi">车次</label>
                        <input type = "text" class = "text" id = "CheCi">
                    </div>

                    <div class = "CYCX_below" id = "ChengCheZhan_box">
                        <label for="ChengCheZhan">乘车站</label>
                        <input type = "text" class = "text input_station" id = "ChengCheZhan">
                    </div>

                    <div class = "CYCX_below" id = "QiShouRiQi_box">
                        <label for="QiShouRiQi">起售日期</label>
                        <input type="date" class = "date" id="QiShouRiQi">
                    </div>

                    <div class = "CYCX_below" id = "QiShouCheZhan_box">
                        <label for="QiShouZhan">起售站</label>
                        <input type = "text" class = "text input_station" id = "QiShouZhan">
                    </div>

                    <div class = "CYCX_below" id = "MuDiDi_box">
                        <label for="MuDiDi">目的地</label>
                        <input type = "text" class = "text input_station" id = "MuDiDi">
                    </div>

                    <div>
                        <button class = "ChaXunButton" onclick="alert('此版块尚未完善，可能未来会推出!')"> 查询 </button>
                    </div>


                </div>

            </div>

            <script>

                function hideAll_CYCX(){
                    let array = document.getElementsByClassName("CYCX_below");
                    for(let i = 0; i < array.length; i++){
                        array[i].setAttribute("hidden", "true");
                    }
                }

                function right_return_to_norm_CYCX(){
                    let array = document.getElementsByClassName("above_element");
                    for(let i = 0; i < array.length; i++){
                        array[i].style.color = "gray";
                        array[i].style.borderBottom = 'gray solid 2px';
                    }
                }

                function shift_panel_CYCX(id){
                    hideAll_CYCX();
                    switch (id){
                        case "ZhengWanDian" : {
                            document.getElementById("ChaXunLeiXing_box").removeAttribute("hidden");
                            document.getElementById("CheZhan_box").removeAttribute("hidden");
                            document.getElementById("CheCi_box").removeAttribute("hidden");
                            break;
                        }
                        case "JianPiaoKou" : {
                            document.getElementById("ChengCheRiQi_box").removeAttribute("hidden");
                            document.getElementById("CheCi_box").removeAttribute("hidden");
                            document.getElementById("ChengCheZhan_box").removeAttribute("hidden");
                            break;
                        }
                        case "QiShouShiJian" : {
                            document.getElementById("QiShouRiQi_box").removeAttribute("hidden");
                            document.getElementById("QiShouCheZhan_box").removeAttribute("hidden");
                            break;
                        }
                        case "TianQiChaXun" : {
                            document.getElementById("MuDiDi_box").removeAttribute("hidden");
                        }
                    }
                }

                function exchange_small_window_CYCX(id){
                    fadeOut("ChangYongChaXun_below");
                    setTimeout(function (){
                        shift_panel_CYCX(id);
                        fadeIn("ChangYongChaXun_below");
                    }, 100);
                }

                function click_above_CYCX(id){
                    let x = document.getElementById(id);
                    if(x.style.color === "rgb(65, 137, 250)" ){
                        return;
                    }
                    right_return_to_norm_CYCX();
                    x.style.color = "rgb(65, 137, 250)";
                    x.style.borderBottom = 'rgb(65, 137, 250) solid 2px';
                    exchange_small_window_CYCX(id);
                }



                function initialize_CYCX(){
                    right_return_to_norm_CYCX();
                    let x = document.getElementById("ZhengWanDian");
                    x.style.color = "rgb(65, 137, 250)";
                    x.style.borderBottom = 'rgb(65, 137, 250) solid 2px';
                    hideAll_CYCX();
                    document.getElementById("ChaXunLeiXing_box").removeAttribute("hidden");
                    document.getElementById("CheZhan_box").removeAttribute("hidden");
                    document.getElementById("CheCi_box").removeAttribute("hidden");
                }


            </script>

            <div class = "message_window_right_boxs" id = "message_window_right_DengLu">
                <div class='above' id = 'DengLu_above'>
                    <div class='above_element' id='DengLuZhangHao' onclick="click_above_DL('DengLuZhangHao')">登录账号</div>
                    <div class='above_element' id='ZhuCeZhangHao' onclick="click_above_DL('ZhuCeZhangHao')">注册账号</div>
                </div>

                <div class = 'below' id = 'DengLu_below'>

                    <div class = "DL_below" id = "ShenFenZhengHao_box">
                        <label for="ShenFenZhengHao">身份证号</label>
                        <input type = "text" class = "text" id = "ShenFenZhengHao" maxlength="18">
                    </div>

                    <div class = "DL_below" id = "YongHuMing_box">
                        <label for="YongHuMing">用户名</label>
                        <input type = "text" class = "text" id = "YongHuMing" maxlength="15">
                    </div>

                    <div class = "DL_below" id = "MiMa_box">
                        <label for="password">密码&nbsp&nbsp&nbsp</label>
                        <input type = "password" class = "password" id = "MiMa" maxlength="15">
                    </div>

                    <div class = "DL_below" id = "ShouJiHao_box">
                        <label for="ShouJiHao">手机号</label>
                        <input type = "text" class = "text" id = "ShouJiHao" maxlength="11">
                    </div>

                    <div class = "DL_below" id = "DengLuButton">
                        <button class = "ChaXunButton" onclick="clickDengLu()"> 登录 </button>
                    </div>

                    <div class = "DL_below" id = "ZhuCeButton">
                        <button class = "ChaXunButton" onclick="clickZhuCe()"> 快速注册 </button>
                    </div>

                </div>

            </div>

            <script>

                function hideAll_DL(){
                    let array = document.getElementsByClassName("DL_below");
                    for(let i = 0; i < array.length; i++){
                        array[i].setAttribute("hidden", "true");
                    }
                }

                function right_return_to_norm_DL(){
                    let array = document.getElementsByClassName("above_element");
                    for(let i = 0; i < array.length; i++){
                        array[i].style.color = "gray";
                        array[i].style.borderBottom = 'gray solid 2px';
                    }
                }

                function shift_panel_DL(id){
                    hideAll_DL();
                    if(id === "DengLuZhangHao"){
                        //document.getElementById("YongHuMing_box").removeAttribute("hidden");
                        document.getElementById("ShenFenZhengHao_box").removeAttribute("hidden");
                        document.getElementById("MiMa_box").removeAttribute("hidden");
                        document.getElementById("DengLuButton").removeAttribute("hidden");
                    }
                    else{
                        document.getElementById("YongHuMing_box").removeAttribute("hidden");
                        document.getElementById("MiMa_box").removeAttribute("hidden");
                        document.getElementById("ShenFenZhengHao_box").removeAttribute("hidden");
                        document.getElementById("ShouJiHao_box").removeAttribute("hidden");
                        document.getElementById("ZhuCeButton").removeAttribute("hidden");
                    }
                }

                function exchange_small_window_DL(id){
                    fadeOut("DengLu_below");
                    setTimeout(function (){
                        shift_panel_DL(id);
                        fadeIn("DengLu_below");
                    }, 100);
                }

                function click_above_DL(id){
                    let x = document.getElementById(id);
                    if(x.style.color === "rgb(65, 137, 250)" ){
                        return;
                    }
                    right_return_to_norm_DL();
                    x.style.color = "rgb(65, 137, 250)";
                    x.style.borderBottom = 'rgb(65, 137, 250) solid 2px';
                    exchange_small_window_DL(id);
                }


                function initialize_DL(){
                    right_return_to_norm_DL();
                    let x = document.getElementById("DengLuZhangHao");
                    x.style.color = "rgb(65, 137, 250)";
                    x.style.borderBottom = 'rgb(65, 137, 250) solid 2px';
                    hideAll_DL();
                    document.getElementById("ShenFenZhengHao_box").removeAttribute("hidden");
                    document.getElementById("MiMa_box").removeAttribute("hidden");
                    document.getElementById("DengLuButton").removeAttribute("hidden");
                }


            </script>

        </div>

        <div id = 'message_window_left'>
            <div class = 'selections' id = 'ChePiao' onclick=" clickLeftButton('ChePiao') ">车票</div>
            <div class = 'selections' id = 'ChangYongChaXun' onclick="clickLeftButton('ChangYongChaXun')">常用查询</div>
            <div class = 'selections' id = 'DengLu' onclick="clickLeftButton('DengLu')">登录</div>

            <script>

                function fadeOut(id){
                    let x = document.getElementById(id);
                    x.style.animation = 'fadeout_style 0.1s';
                    setTimeout(function(){
                        x.style.animation = "";
                        x.style.opacity = "0";
                    }, 70)
                }

                function fadeIn(id){
                    let x = document.getElementById(id);
                    x.style.animation = 'fadein_style 0.1s';
                    setTimeout(function(){
                        x.style.animation = "";
                        x.style.opacity = "100%";
                    }, 70)
                }


                function exchange_big_window(id_old, id_new){
                    let array = document.getElementsByClassName("message_window_right_boxs");
                    fadeOut(id_old);
                    setTimeout(function (){
                        for(let i = 0; i < array.length; i++){
                            if(array[i].id === id_new){
                                array[i].removeAttribute("hidden");
                            }
                            else array[i].setAttribute("hidden", "true");
                        }
                        switch(id_new){
                            case "message_window_right_ChePiao" : initialize_ChePiao(); break;
                            case "message_window_right_ChangYongChaXun" : initialize_CYCX(); break;
                            default : initialize_DL(); break;
                        }
                        fadeIn(id_new);
                    }, 100);
                }

                function clickLeftButton(id){
                    let x = document.getElementById(id);
                    let old_id;
                    let array = document.getElementsByClassName("selections");
                    for(let i = 0; i < array.length; i++){
                        if(array[i].style.backgroundColor === "white"){
                            old_id = array[i].id;
                        }
                    }

                    if(x.style.backgroundColor === "white") {
                        return;
                    }
                    else return_to_norm();
                    x.style.backgroundColor = 'white';
                    x.style.color = '#4189fa';
                    x.style.borderLeft = '#4189fa 3px solid';
                    exchange_big_window("message_window_right_" + old_id, "message_window_right_" + id);
                }

                function return_to_norm(){
                    let array = document.getElementsByClassName("selections");
                    for(let i = 0; i < array.length; i++){
                        array[i].style.backgroundColor = '#4189fa';
                        array[i].style.color = 'white';
                        array[i].style.borderLeft = 'white 3px solid';
                    }
                }

                function initial_selections(){
                    let array = document.getElementsByClassName("selections");
                    for(let i = 0; i < array.length; i++){
                        array[i].onmouseenter = function(){
                            if(this.style.backgroundColor !== 'white')
                                this.style.backgroundColor = '#416ffa';
                        }
                        array[i].onmouseleave = function(){
                            if(this.style.backgroundColor !== 'white')
                                this.style.backgroundColor = '#4189fa';
                        }
                    }
                    let x = document.getElementById("ChePiao");
                    x.style.backgroundColor = 'white';
                    x.style.color = '#4189fa';
                    x.style.borderLeft = '#4189fa 3px solid';
                    document.getElementById("message_window_right_ChangYongChaXun").setAttribute("hidden", "true");
                    document.getElementById("message_window_right_DengLu").setAttribute("hidden", "true");
                }
                initial_selections();
            </script>
        </div>
    </div>

    <div id = 'left_right_region'>

        <div id = "left_region">
            <img class = 'left_right_button' src = './images/running_figures/左按钮.svg' alt = '' width = 100 height = 100 onclick="left_button_onclick()">
        </div>


        <div id = "right_region">
            <img class = 'left_right_button' src = './images/running_figures/右按钮.svg' alt = '' width = 100 height = 100 onclick="right_button_onclick()">
        </div>

    </div>

    <ul id = 'running_list'>
        <li class = 'runnings'><img src = './images/running_figures/r2.jpg' alt = '' width = 1800 height = 600></li>
        <li class = 'runnings'><img  src = './images/running_figures/r1.jpg' alt = '' width = 1800 height = 600></li>
        <li class = 'runnings'><img  src = './images/running_figures/r3.jpg' alt = '' width = 1800 height = 600></li>
        <li class = 'runnings'><img src = './images/running_figures/r4.jpg' alt = ''  width = 1800 height = 600></li>
        <li class = 'runnings'><img src = './images/running_figures/r5.jpg' alt = ''  width = 1800 height = 600 ></li>
    </ul>

    <script>
        //让图片自己动

        let ismoving = false;

        function getKeyFrames(name) {           //获取keyFrames所在的animation
            let animation = {};
            let rule;
            let ss = document.styleSheets;
            for (let i = 0; i < ss.length; ++i) {
                for (let j = 0; j < ss[i].rules.length; ++j) {
                    rule = ss[i].rules[j];
                    if(rule.name === name && rule.type === CSSRule.KEYFRAMES_RULE){
                        animation.cssRule = rule;
                        animation.styleSheet = ss[i];
                        animation.index = j;
                    }
                }
            }
            return animation;
        }

        function resetKeyFrames(ElementID, keyFrameName, newKeyFrame, newAnimation){
            const return_animation = getKeyFrames(keyFrameName);
            return_animation.styleSheet.deleteRule(return_animation.index);
            return_animation.styleSheet.insertRule(newKeyFrame, return_animation.index);
            const tmp = document.getElementById(ElementID);
            //tmp.style.animation = "";
            tmp.style.animation = newAnimation;

            //tmp.style.display;
            //tmp.setAttribute('style','animation: '+ newAnimation);
        }

        function left_button_onclick() {
            if(ismoving) return;
            const x = document.getElementById('running_list');
            if(x.offsetLeft < -40) leftTurn1();
            else{   // 最左边跳到最右边
                const keyFramesName = 'running_list_move';
                const newKeyFrames =
                    `
                @keyframes running_list_move{
                    0%{left:-40px;}
                    100%{left:-7240px;}
                }
            `

                resetKeyFrames('running_list', keyFramesName, newKeyFrames, 'running_list_move 500ms');
                ismoving = true;
                setTimeout(function tmp1(){
                    x.removeAttribute('style');    // 实现重复点击按钮！
                    x.style.left = '-7240px';
                    ismoving = false;
                }, 450);    // 这里延时的时间要比动画时间略短，不然会有切割感
            }

        }

        function right_button_onclick(){
            if(ismoving) return;
            const x = document.getElementById('running_list');
            if(x.offsetLeft > -6440) rightTurn1();
            else{
                const keyFramesName = 'running_list_move';
                const newKeyFrames =
                    `
                @keyframes running_list_move{
                    0%{left:-7240px;}
                    100%{left:-40px;}
                }
            `
                resetKeyFrames('running_list', keyFramesName, newKeyFrames, 'running_list_move 500ms');
                ismoving = true;
                setTimeout(function tmp1(){
                    x.removeAttribute('style');    // 实现重复点击按钮！
                    x.style.left = '-40px';
                    ismoving = false;
                }, 450);    // 这里延时的时间要比动画时间略短，不然会有切割感
            }
        }

        function rightTurn1(){   // 终于做出平滑的左移一个了 感动
            const x = document.getElementById('running_list');
            const offset = x.offsetLeft;
            const keyFramesName = 'running_list_move';
            const newKeyFrames =
                `
                @keyframes running_list_move{
                    0%{left:` + offset + `px;}
                    100%{left: ` + (offset - 1800) + `px;}
                }
            `
            resetKeyFrames('running_list', keyFramesName, newKeyFrames, 'running_list_move 500ms');
            ismoving = true;
            setTimeout(function tmp1(){
                x.removeAttribute('style');
                x.style.left = '' + (offset - 1800) + 'px';
                ismoving = false;
            }, 450);    // 这里延时的时间要比动画时间略短，不然会有切割感
        }

        function leftTurn1(){   // 终于做出平滑的左移一个了 感动   // 右移，复制的左移
            const x = document.getElementById('running_list');
            const offset = x.offsetLeft;
            const keyFramesName = 'running_list_move';
            const newKeyFrames =
                `
                @keyframes running_list_move{
                    0%{left:` + offset + `px;}
                    100%{left: ` + (offset + 1800) + `px;}
                }
            `
            resetKeyFrames('running_list', keyFramesName, newKeyFrames, 'running_list_move 500ms');
            ismoving = true;
            setTimeout(function tmp1(){
                x.removeAttribute('style');    // 实现重复点击按钮！
                x.style.left = '' + (offset + 1800) + 'px';
                ismoving = false;
            }, 450);    // 这里延时的时间要比动画时间略短，不然会有切割感
        }

        setInterval(function(){
            right_button_onclick();
        }, 5000)

        //leftTurn1();



    </script>  <!-- 让图片动起来-->

</div>

</body>

</html>


