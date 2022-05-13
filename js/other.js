
let date = new Date();
var currentDate = date.getFullYear().toString() + "-" + (date.getMonth() + 1).toString() + "-" + date.getDate().toString();

function getVal(id){
    return document.getElementById(id).value;
}

function getCurrentLocation(){
    let a = location.href;
    let b = a.split("/");
    let c = b.slice(b.length-1, b.length).toString(String).split(".");
    c = c.slice(0, 1);
    return c[0];
}


function getDayBetween(date1, date2){
    let lastTime = new Date(date1);
    let endTime = new Date(date2);
    let between = endTime - lastTime;
    return Math.floor(between/(24*3600*1000));
}

function checkInsertTime(time, beginTime, endTime){
    beginTime = new Date("2002/03/09 "+beginTime+":20").getTime();
    endTime = new Date("2002/03/09 "+endTime+":20").getTime();
    time = new Date("2002/03/09 "+ time+":20").getTime();
    return time > beginTime && time < endTime;
}