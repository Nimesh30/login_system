<?php
include 'dbconn.php';

$msg = $_POST['text'];
$room = $_POST['room'];
$ip = $_POST['ip'];

$sql = "INSERT INTO `messages` ( `msg`, `room`, `ip`, `rtime`) VALUES ( '$msg', '$room ', ' $ip ', current_timestamp());";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
?>