<?php
session_start();
$username = $_GET["username"];
$password = $_GET["password"];
$idNumber = $_GET["idNumber"];
$phoneNumber = $_GET["phoneNumber"];


$conn = new mysqli("p:23.105.201.214", "phpserver", "123456", "train_system", 3306);
mysqli_query($conn, "set names utf8");  // 半个小时 血的教训 2020/12/17/20:18 解决

if($conn -> connect_error){
    die("error" . $conn ->error);
}

$stmt = $conn -> prepare("select id_card_num from user where id_card_num = ?");
$stmt -> bind_param("s", $idNumber);
$stmt -> bind_result($result1);
$stmt -> execute();
if($stmt -> fetch()){
    $stmt -> close();
    $conn -> close();
    die("此身份证号已被注册，注册失败!");
}
$stmt -> close();

/* 加密 */

$password = crypt($password, 'ls');


$stmt = $conn -> prepare("insert into user ( username, phone_number, id_card_num, password) values ( ?, ?, ?, ?)");
$stmt -> bind_param("ssss",$username, $phoneNumber, $idNumber, $password);

if($stmt -> execute())
    echo("注册成功！");
else echo "Error!";

$stmt -> close();
$conn -> close();

