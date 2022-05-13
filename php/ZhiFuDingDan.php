<?php

$DingDanHao = $_GET['BianHao'];
$conn = new mysqli("p:23.105.201.214", "phpserver", "123456", "train_system");
mysqli_query($conn, "set names utf8");  // 半个小时 2020/12/17/20:18 解决

if($conn -> connect_error){
    die("error" . $conn ->error);
}


$stmt = $conn -> prepare("call PayTicket(?)");
$stmt -> bind_param("s", $DingDanHao);

$stmt -> execute();

$stmt -> close();
$conn -> close();

echo ("支付成功!");