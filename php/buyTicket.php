<?php
$ticket_type = $_GET['ticket_type'];
$user_id = $_GET['id'];
$type = $_GET['type'];

//$ticket_type = 193691;
//$user_id = "2";
//$type = "硬卧";

$conn = new mysqli("p:23.105.201.214", "phpserver", "123456", "train_system");
mysqli_query($conn, "set names utf8");

if($conn -> connect_error){
    die("error" . $conn ->error);
}

$stmt = $conn -> prepare("call reserve_ticket_with_no_select(?,?,?)");
$stmt -> bind_param("iss", $ticket_type,$type, $user_id);

$stmt -> execute();

echo "OK! 订票成功，请到\"我的订单\"中查看并支付!";


$stmt -> close();
$conn -> close();




