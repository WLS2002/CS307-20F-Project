<?php

$train_name = $_GET['train_name'];
$station_name = $_GET['station_name'];
$nth_station = $_GET['nth_station'];
$arrive_time = $_GET['arrive_time'];
$depart_time = $_GET['depart_time'];

$conn = new mysqli("p:23.105.201.214", "phpserver", "123456", "train_system");
mysqli_query($conn, "set names utf8");  // 半个小时 2020/12/17/20:18 解决

if ($conn->connect_error) {
    die("error" . $conn->error);
}


$stmt = $conn->prepare("call AddStation(?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $train_name, $station_name, $nth_station, $arrive_time, $depart_time);

$stmt->execute();

$stmt->close();
$conn->close();

echo("添加成功!");