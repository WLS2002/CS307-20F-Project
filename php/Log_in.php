<?php
header("Content-type: text/html; charset=utf-8");
require './functions.php';
require './classes.php';
session_start();
$password = $_GET["password"];
$idNumber = $_GET["idNumber"];

$conn = new mysqli("p:23.105.201.214", "phpserver", "123456", "train_system");
mysqli_query($conn, "set names utf8");  // 半个小时 血的教训 2020/12/17/20:18 解决

if($conn -> connect_error){
    die("error" . $conn ->error);
}

$stmt = $conn -> prepare("select id_card_num from user where id_card_num = ?");
$stmt -> bind_param("s", $idNumber);
$stmt -> bind_result($result1);
$stmt -> execute();

if(!$stmt -> fetch()){
    $stmt -> close();
    $conn -> close();
    die("此身份证号未注册!");
}

$stmt -> close();

/*
$conn -> close();
$conn = new mysqli("23.105.201.214", "phpserver", "123456", "train_system");
mysqli_query($conn, "set names utf8");  // 半个小时 血的教训 2020/12/17/20:18 解决*/

$stmt = $conn -> prepare("select username, IsDBA from user where id_card_num = ? and password = ?");

$password = crypt($password, 'ls');

$stmt -> bind_param("ss", $idNumber, $password);
$stmt -> execute();
$stmt -> bind_result($result1, $result2);
if(!$stmt -> fetch()){
    $stmt -> close();
    $conn -> close();
    die("密码错误!");
}
else {
    echo $result1;
    $_SESSION["current_user"] = new users($result1, $idNumber, $result2);
}

$stmt -> close();
$conn -> close();
