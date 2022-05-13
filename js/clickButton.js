var availableTags = [
    "北京",
    "北京南",
    "北京西",
    "广州南",
    "重庆北",
    "广州东",
    "上海",
    "上海南",
    "上海虹桥",
    "上海西",
    "天津",
    "天津南",
    "天津西",
    "长春",
    "长春西",
    "成都东",
    "成都南",
    "成都",
    "长沙南",
    "福州",
    "福州南",
    "贵阳",
    "广州",
    "哈尔滨",
    "哈尔滨西",
    "合肥",
    "呼和浩特东",
    "呼和浩特",
    "海口东",
    "海口",
    "杭州东",
    "杭州",
    "济南",
    "济南西",
    "兰州",
    "兰州西",
    "南昌",
    "南京",
    "南京南",
    "南宁",
    "石家庄",
    "沈阳",
    "沈阳北",
    "武汉",
    "乌鲁木齐南",
    "西安北",
    "西宁",
    "郑州",
    "安庆",
    "蚌埠",
    "北海",
    "百色",
    "包头东",
    "包头",
    "本溪",
    "苍南",
    "池州",
    "常州",
    "丹东",
    "敦化",
    "都江堰",
    "大连北",
    "大连",
    "达州",
    "恩施",
    "福鼎",
    "凤凰机场",
    "抚顺北",
    "桂林北",
    "桂林",
    "广州北",
    "赣州",
    "公主岭南",
    "汉口",
    "哈密",
    "海宁西",
    "黄石",
    "贺州",
    "金华南",
    "金华",
    "九江",
    "吉林",
    "集宁南",
    "江山",
    "江油",
    "金州",
    "开封",
    "昆山南",
    "六安",
    "利川",
    "龙岩",
    "洛阳龙门",
    "柳州",
    "辽中",
    "绵阳",
    "宁波",
    "南充",
    "盘锦",
    "郫县西",
    "青城山",
    "青岛",
    "齐齐哈尔",
    "泉州",
    "衢州",
    "瑞金",
    "山海关",
    "遂宁",
    "商丘",
    "上饶",
    "三亚",
    "邵阳",
    "十堰",
    "深圳",
    "苏州",
    "随州",
    "塘沽",
    "唐山北",
    "唐山",
    "武昌",
    "威海",
    "芜湖",
    "无锡",
    "温州南",
    "新会",
    "厦门北",
    "厦门",
    "襄阳",
    "徐州",
    "延安",
    "宜昌东",
    "亚龙湾",
    "营山",
    "烟台",
    "义乌",
    "阳新",
    "崖州",
    "永州",
    "淄博",
    "珠海",
    "珠海北",
    "镇江",
    "枣庄",
    "安达",
    "安德",
    "鳌江",
    "安陆",
    "鞍山西",
    "安亭北",
    "博鳌",
    "蚌埠南",
    "北戴河",
    "保定",
    "巴东",
    "宝华山",
    "北滘",
    "碧江",
    "鲅鱼圈",
    "赤壁北",
    "昌乐",
    "常平",
    "昌图西",
    "常州北",
    "滁州",
    "郴州西",
    "沧州西",
    "德安",
    "东方",
    "德惠西",
    "大庆东",
    "大庆西",
    "东升",
    "登沙河",
    "丹徒",
    "德阳",
    "丹阳",
    "丹阳北",
    "大英东",
    "定远",
    "德州东",
    "鄂州",
    "福安",
    "肥东",
    "奉化",
    "福清",
    "抚顺",
    "富县东",
    "扶余北",
    "谷城",
    "贵港",
    "高密",
    "共青城",
    "巩义南",
    "古镇",
    "冠豸山",
    "盖州西",
    "红安西",
    "合川",
    "汉川",
    "海城西",
    "红光镇",
    "涵江",
    "葫芦岛北",
    "花桥",
    "华山北",
    "惠山",
    "衡山西",
    "衡阳东",
    "湖州",
    "晋江",
    "江门",
    "角美",
    "金山北",
    "建始",
    "嘉善南",
    "九台南",
    "嘉兴南",
    "胶州北",
    "荆州",
    "金寨",
    "锦州南",
    "焦作",
    "昆山",
    "开原西",
    "灵宝西",
    "廊坊",
    "临海",
    "连江",
    "龙嘉",
    "陵水",
    "丽水",
    "庐山",
    "龙山镇",
    "李石寨",
    "滦县",
    "莱阳",
    "辽阳",
    "龙游",
    "罗源",
    "耒阳西",
    "兰州新区",
    "麻城北",
    "渑池南",
    "美兰",
    "汨罗东",
    "明珠",
    "宁德",
    "宁海",
    "南靖",
    "南朗",
    "南头",
    "南翔北",
    "蓬安",
    "瓢儿屯",
    "平果",
    "盘锦北",
    "莆田",
    "普湾",
    "郫县",
    "曲阜东",
    "琼海",
    "秦皇岛",
    "潜江",
    "全椒",
    "前山",
    "戚墅堰",
    "青田",
    "清远",
    "钦州东",
    "青州市",
    "瑞安",
    "瑞昌",
    "容桂",
    "双城北",
    "顺德",
    "顺德学院",
    "绅坊",
    "韶关",
    "水家湖",
    "松江南",
    "萨拉齐",
    "三门峡南",
    "三门县",
    "四平东",
    "绥中北",
    "苏州北",
    "宿州东",
    "苏州园区",
    "苏州新区",
    "泰安",
    "台安",
    "唐家湾",
    "泰康",
    "铜陵",
    "铁岭西",
    "图们北",
    "天门南",
    "太姥山",
    "潼南",
    "土溪",
    "桐乡",
    "田阳",
    "滕州东",
    "台州",
    "文昌",
    "潍坊",
    "瓦房店西",
    "温岭",
    "渭南北",
    "万宁",
    "武清",
    "无锡东",
    "无锡新区",
    "小榄",
    "仙林",
    "咸宁北",
    "犀浦东",
    "霞浦",
    "犀浦",
    "徐水",
    "杏树屯",
    "仙桃西",
    "襄阳东",
    "徐州东",
    "阳澄湖",
    "雁荡山",
    "于都",
    "英德西",
    "余杭",
    "永嘉",
    "营口东",
    "玉门",
    "云梦",
    "阳泉北",
    "乐清",
    "永修",
    "弋阳",
    "岳阳东",
    "中川机场",
    "正定",
    "肇东",
    "枝江北",
    "诸暨",
    "镇江南",
    "樟木头",
    "章丘",
    "中山北",
    "中山",
    "枣阳",
    "漳州",
    "株洲西",
    "郑州西",
    "安图西",
    "安阳东",
    "保定东",
    "白沟",
    "滨海",
    "滨海北",
    "宝鸡南",
    "北井子",
    "白马井",
    "璧山",
    "本溪新城",
    "宾阳",
    "白洋淀",
    "百宜",
    "霸州西",
    "巢湖东",
    "从江",
    "长临河",
    "长寿北",
    "潮汕",
    "长汀南",
    "长兴",
    "潮阳",
    "城子坦",
    "东安东",
    "东戴河",
    "丹东西",
    "东港北",
    "大孤山",
    "东莞",
    "大荔",
    "德清",
    "当涂东",
    "大通西",
    "德兴",
    "大冶北",
    "都匀东",
    "定州东",
    "大足南",
    "峨眉山",
    "鄂州东",
    "防城港北",
    "凤城东",
    "繁昌西",
    "丰都",
    "涪陵北",
    "福山镇",
    "福田",
    "抚州东",
    "抚州",
    "高安",
    "广安南",
    "高碑店东",
    "恭城",
    "贵定北",
    "葛店南",
    "贵定县",
    "广汉北",
    "桂林西",
    "光明城",
    "广宁",
    "广宁寺",
    "桂平",
    "古田北",
    "高台南",
    "古田会址",
    "贵阳北",
    "高邑西",
    "惠安",
    "鹤壁东",
    "珲春",
    "邯郸东",
    "惠东",
    "海东西",
    "洪洞西",
    "哈尔滨北",
    "合肥北城",
    "合肥南",
    "黄冈",
    "黄冈东",
    "横沟桥东",
    "黄冈西",
    "怀化南",
    "黄河景区",
    "花湖",
    "怀集",
    "黄流",
    "黄陵南",
    "鲘门",
    "虎门",
    "侯马西",
    "淮南东",
    "合浦",
    "华容东",
    "华容南",
    "黄石北",
    "黄山北",
    "贺胜桥东",
    "花山南",
    "海阳北",
    "花园口",
    "霍州东",
    "惠州南",
    "旌德",
    "尖峰",
    "蛟河西",
    "军粮城北",
    "将乐",
    "即墨北",
    "建宁县北",
    "江宁",
    "江宁西",
    "建瓯西",
    "酒泉南",
    "句容西",
    "绩溪北",
    "介休东",
    "泾县",
    "进贤南",
    "简阳南",
    "嘉峪关南",
    "缙云西",
    "晋中",
    "凯里南",
    "葵潭",
    "开阳",
    "隆安东",
    "来宾北",
    "绿博园",
    "隆昌北",
    "老城镇",
    "龙洞堡",
    "乐都南",
    "娄底南",
    "乐东",
    "离堆公园",
    "陆丰",
    "临汾西",
    "临高南",
    "滦河",
    "漯河西",
    "罗江东",
    "龙里北",
    "醴陵东",
    "灵石东",
    "乐山",
    "溧水",
    "洛湾三江",
    "莱西北",
    "溧阳",
    "柳园南",
    "鹿寨北",
    "临泽南",
    "马鞍山东",
    "明港东",
    "民乐",
    "牟平",
    "闽清北",
    "眉山东",
    "庙山",
    "门源",
    "孟庄",
    "南曹",
    "南城",
    "南昌西",
    "南芬北",
    "南丰",
    "南湖东",
    "内江北",
    "南江",
    "南江口",
    "南陵",
    "南宁东",
    "南平北",
    "南阳寨",
    "普安",
    "皮口",
    "普宁",
    "平南南",
    "彭山北",
    "萍乡北",
    "平遥古城",
    "彭州",
    "青白江东",
    "青岛北",
    "祁东",
    "青堆",
    "青莲",
    "齐齐哈尔南",
    "清水北",
    "青神",
    "岐山",
    "庆盛",
    "祁县东",
    "祁阳",
    "全州南",
    "棋子湾",
    "荣昌北",
    "荣成",
    "榕江",
    "饶平",
    "宋城路",
    "邵东",
    "三都县",
    "胜芳",
    "双峰北",
    "三江南",
    "双流机场",
    "双流西",
    "三明北",
    "山坡东",
    "鄯善北",
    "三水南",
    "韶山南",
    "三穗",
    "汕尾",
    "歙县北",
    "绍兴北",
    "邵阳北",
    "上虞北",
    "沈阳南",
    "深圳北",
    "神州",
    "深圳坪山",
    "石柱县",
    "桃村北",
    "田东北",
    "土地堂东",
    "太谷西",
    "吐哈",
    "吐鲁番北",
    "铜陵北",
    "泰宁",
    "铜仁南",
    "汤逊湖",
    "藤县",
    "太原南",
    "通远堡西",
    "文登东",
    "五府山",
    "威海北",
    "五龙背东",
    "乌龙泉南",
    "无为",
    "瓦屋山",
    "闻喜西",
    "武义北",
    "武夷山北",
    "武夷山东",
    "婺源",
    "武陟",
    "梧州南",
    "兴安北",
    "许昌东",
    "新都东",
    "襄汾西",
    "孝感北",
    "新化南",
    "新晃西",
    "新津",
    "新津南",
    "咸宁东",
    "咸宁南",
    "溆浦南",
    "湘潭北",
    "邢台东",
    "修武西",
    "新乡东",
    "新余北",
    "信阳东",
    "咸阳秦都",
    "仙游",
    "新郑机场",
    "迎宾路",
    "运城北",
    "永川东",
    "宜春",
    "岳池",
    "云浮东",
    "永福南",
    "永济北",
    "弋江",
    "于家堡",
    "延吉西",
    "永康南",
    "杨陵南",
    "郁南",
    "阳朔",
    "玉山南",
    "银滩",
    "永泰",
    "鹰潭北",
    "烟台南",
    "尤溪",
    "云霄",
    "宜兴",
    "余姚北",
    "诏安",
    "正定机场",
    "纸坊东",
    "庄河北",
    "芷江",
    "左岭",
    "驻马店西",
    "漳浦",
    "肇庆东",
    "庄桥",
    "钟山西",
    "资阳北",
    "张掖西",
    "资中北",
    "涿州东",
    "卓资东",
    "郑州东",
    "春申",
    "新桥",
    "车墩",
    "叶榭",
    "亭林",
    "金山园区",
    "金山卫",
]

function clickDengLu(){
    let password = document.getElementById("MiMa").value;
    let shenfenzheng = document.getElementById("ShenFenZhengHao").value;

    let xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState===4 && xmlhttp.status===200)
        {
            //alert(xmlhttp.responseText);
            if(xmlhttp.responseText !== "此身份证号未注册!" && xmlhttp.responseText !== "密码错误!"){
                alert("登录成功!");
                location.reload();
            }
            else alert(xmlhttp.responseText);
        }
    }

    xmlhttp.open("GET","./php/Log_in.php?password=" + password + "&idNumber=" + shenfenzheng,true);
    xmlhttp.send();
}

function checkShenFenZheng(shenfenzheng){
    if(shenfenzheng.length !== 18){
        return false;
    }

    for(let i = 0; i < shenfenzheng.length; i++){
        if(!(shenfenzheng.charAt(i) <= '9' && shenfenzheng.charAt(i) >= '0' || shenfenzheng.charAt(i) === 'x' || shenfenzheng.charAt(i) === 'X')){
            return false;
        }
    }

    let array = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
    let sum = 0;
    for(let i = 0; i < shenfenzheng.length - 1; i++){

        sum += Number(shenfenzheng.charAt(i)) * array[i];
    }

    sum = sum % 11;
    let last;
    switch (sum){
        case 0: last = 1; break;
        case 1: last = 0;break;
        case 2: last = -1;break;
        case 3: last = 9;break;
        case 4: last = 8;break;
        case 5: last = 7;break;
        case 6: last = 6;break;
        case 7: last = 5;break;
        case 8: last = 4;break;
        case 9: last = 3;break;
        case 10 : last = 2;break;
    }

    if(last === -1){
        if(shenfenzheng.charAt(17) !== 'X' && shenfenzheng.charAt(17) !== 'x') {
            return false;
        }
    }
    else if(Number(shenfenzheng.charAt(17)) !== last){
        return false;
    }
    return true;
}

function clickZhuCe(){

    let username = document.getElementById("YongHuMing").value;
    let password = document.getElementById("MiMa").value;
    let shenfenzheng = document.getElementById("ShenFenZhengHao").value;
    let phoneNumber = document.getElementById("ShouJiHao").value;


    if(username === ""){
        alert("未填写用户名!");
        return;
    }
    if(password === ""){
        alert("未填写密码!");
        return;
    }
    if(shenfenzheng === ""){
        alert("未填写身份证号!");
        return;
    }
    if(phoneNumber === ""){
        alert("未填写手机号!");
        return;
    }

    for(let i = 0; i <username.length; i++){
        if(!(username.charAt(i) <= 'Z' && username.charAt(i) >= 'A' || username.charAt(i) <= 'z' && username.charAt(i) >= 'a' || username.charAt(i) <= '9' && username.charAt(i) >= '0' || username.charCodeAt(i) > 255) ){
            alert("用户名应为数字或字母或中文字符，不应有其他字符!");
            return;
        }
    }
    /*if(username.length < 6 || username.length > 15){
        alert("用户名长度不合适，须不小于6且不大于15!");
        return;
    }*/

    if(password.length < 6){
        alert("密码过短， 应至少为6位!");
        return;
    }

    if(!checkShenFenZheng(shenfenzheng)) {
        alert("身份证号不正确!");
        return;
    }


    if(phoneNumber.length !== 11){
        alert("手机号不正确!");
        return;
    }

    for(let i = 0; i < phoneNumber.length; i++){
        if(!(phoneNumber.charAt(i) <= '9' && phoneNumber.charAt(i) >= '0')){
            alert("手机号不正确!");
            return;
        }
    }


    let xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState===4 && xmlhttp.status===200)
        {
            alert(xmlhttp.responseText);
        }
    }

    xmlhttp.open("GET","./php/ZhuCe.php?username=" + username + "&password=" + password + "&idNumber=" + shenfenzheng +"&phoneNumber=" + phoneNumber,true);
    xmlhttp.send();

}

function clickZhuXiao(){
    let xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState===4 && xmlhttp.status===200)
        {
            alert("已退出登录");
            location.reload();
        }
    }

    let url = "./ZhuXiao.php";
    if(getCurrentLocation() === 'index' || getCurrentLocation() === "")
        url = "./php/ZhuXiao.php";

    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}

function click_up_or_down(obj, a, b, id, location){

    let xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState===4 && xmlhttp.status===200)
        {
            return_to_norm_up_down();
            document.getElementById("table_main").innerHTML = xmlhttp.responseText;
            if(a === "up")
                obj.src = '../images/up_orange.svg'; // 传this过来，牛！
            else obj.src = '../images/down_orange.svg';
        }
    }

    let url = "./sort.php?type=" + a + "&sort_name=" + b + "&id=" +  id + "&location=" + location;

    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}

function return_to_norm_up_down(){
    let array_up = document.getElementsByClassName('up_triangle');
    let array_down = document.getElementsByClassName('down_triangle');
    for(let i = 0; i < array_down.length; i++){
        array_down[i].src = '../images/down_gray.svg';
        array_up[i].src = '../images/up_gray.svg';
    }
}

function clickChaXun_ChePiao(ChuFaDian, DaoDaDi, ChuFaRiQi){

    if(document.getElementById("DanChen").style.color === "rgb(65, 137, 250)"){ // 点击了单程下的查询按钮
       clickChaXun_ChePiao_DanCheng(ChuFaDian, DaoDaDi, ChuFaRiQi);
    }
    else if(document.getElementById("HuanCheng").style.color === "rgb(65, 137, 250)"){ // huancheng
        clickChaXun_ChePiao_HuanCheng(ChuFaDian, DaoDaDi, ChuFaRiQi);
    } else{
        clickChaXun_ChePiao_LvChenTuiJian(ChuFaDian, ChuFaRiQi);
    }

}

function clickChaXun_ChePiao_DanCheng(ChuFaDian, DaoDaDi, ChuFaRiQi){
    if(availableTags.indexOf(ChuFaDian) < 0){
        alert("出发点不是有效车站!");
        return;
    }
    if(availableTags.indexOf(DaoDaDi) < 0){
        alert("到达地不是有效车站!");
        return;
    }
    if(isNaN(Date.parse(ChuFaRiQi))){
        alert("不是有效的日期");
        return;
    }

    let url = "Query_ChePiao.php?ChuFaDi=" + ChuFaDian + "&DaoDaDi=" + DaoDaDi + "&Date=" + ChuFaRiQi;
    if(getCurrentLocation() === 'index' || getCurrentLocation() === "")
        url = "php/" + url;
    if(getCurrentLocation() === 'Query_ChePiao') // 如果已经在查询界面了，就不用打开新窗口
        window.location.href = url;
    else window.open(url);
}

function clickChaXun_ChePiao_HuanCheng(ChuFaDian, DaoDaDi, ChuFaRiQi){
    if(availableTags.indexOf(ChuFaDian) < 0){
        alert("出发点不是有效车站!");
        return;
    }
    if(availableTags.indexOf(DaoDaDi) < 0){
        alert("到达地不是有效车站!");
        return;
    }
    if(isNaN(Date.parse(ChuFaRiQi))){
        alert("不是有效的日期");
        return;
    }

    let url = "HuanCheng.php?ChuFaDi=" + ChuFaDian + "&DaoDaDi=" + DaoDaDi + "&Date=" + ChuFaRiQi;
    if(getCurrentLocation() === 'index' || getCurrentLocation() === "")
        url = "php/" + url;
    if(getCurrentLocation() === 'HuanCheng') // 如果已经在查询界面了，就不用打开新窗口
        window.location.href = url;
    else window.open(url);
}

function clickChaXun_ChePiao_LvChenTuiJian(ChuFaDian, ChuFaRiQi){
}
function clickAboveButtonFromQueries(){
    window.location.href = '../index.php';
}

function buyTickets(CheCi, departStation, arriveStation, Date, type, user_id, time, ticket_type, rest_ticket){
    if(user_id === "un_log_in"){
        alert("尚未登录，无法购买车票!");
        return;
    }

    let dayBetween = getDayBetween(currentDate, Date);
    if(dayBetween < 0){
        alert("无法购买过去的车票!");
        return;
    }
    else if(dayBetween > 14){
        alert("此车票尚未开始发售!");
        return;
    }

    if(rest_ticket <= 0){
        alert("告罄!");
        return;
    }

    let bool = confirm("车次 : " + CheCi + "\n出发站 : " + departStation + "\n到达站 : " + arriveStation + "\n日期 : " + Date + "\n时间 : " + time + "\n座位 : " + type + "\n确定订票吗？\n");
    if(!bool){
        return;
    }else butTicketsReal(ticket_type, user_id, type);
}

function butTicketsReal(ticket_type, user_id, type){
    let xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState===4 && xmlhttp.status===200)
        {
            alert(xmlhttp.responseText);
            location.reload();
        }
    }

    let url = "./buyTicket.php?ticket_type=" + ticket_type + "&id=" + user_id + "&type=" + type;

    xmlhttp.open("GET",url,true);
    xmlhttp.send();

}

function clickMyOrderButton(id){
    if(id === "un_log_in") {
        alert("请先登录!");
        return;
    }
    let url = 'myOrder.php';

    if(getCurrentLocation() === 'index' || getCurrentLocation() === "")
        url = "php/" + url;
    if(getCurrentLocation() === 'Query_ChePiao') // 如果已经在查询界面了，就不用打开新窗口
        window.location.href = url;
    else window.open(url);

}

function checkTimeTable(train_name, ticket_type){

    let url = "Train_time_table.php?train_name=" + train_name;
    if(getCurrentLocation() === 'index' || getCurrentLocation() === "")
        url = "php/" + url;
    if(getCurrentLocation() === 'Train_time_table') // 如果已经在查询界面了，就不用打开新窗口
        window.location.href = url;
    else window.open(url);
}



