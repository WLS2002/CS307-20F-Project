<?php

$train_name = $_GET['train_name'];
$station_name = $_GET['station_name'];

$conn = new mysqli("p:23.105.201.214", "phpserver", "123456", "train_system");
mysqli_query($conn, "set names utf8");  // 半个小时 2020/12/17/20:18 解决

if ($conn->connect_error) {
    die("error" . $conn->error);
}


$stmt = $conn->prepare("call DeleteStation(?, ?)");
$stmt->bind_param("ss", $train_name, $station_name);

$stmt->execute();

$stmt->close();
$conn->close();

echo("删除成功!");