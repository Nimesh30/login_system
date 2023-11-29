<?php
$room = $_POST["room"];

if (strlen($room) > 20 or strlen($room) < 2) {

    $message = "please choose name  between 2 to 20 characters..";
    echo '<script language="javascript">';
    echo 'alert("' . $message . '");';
    echo 'window.location="http://localhost/login System/chatroom.php";';
    echo '</script>';
} else if (!ctype_alnum($room)) {

    $message = "Please choose name with alphabets or numbers..";
    echo '<script language="javascript">';
    echo 'alert("' . $message . '");';
    echo 'window.location="http://localhost/login System/chatroom.php";';
    echo '</script>';

} else {
    include 'dbconn.php';
}

$sql = "select *from rooms where roomname = '$room'  ";
$result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {

        $message = "Username is already exists.. Please choose another one...";
        echo '<script language="javascript">';
        echo 'alert("' . $message . '");';
        echo 'window.location="http://localhost/login System/chatroom.php";';
        echo '</script>';
    } else {

        $sql = "
            INSERT INTO `rooms` (`roomname`, `rtime`) VALUES ( '$room', current_timestamp)";
        echo "inserted....";
        if (mysqli_query($conn, $sql)) {
            $message = "Your Room is ready You can chat now ";
            echo '<script language="javascript">';
            echo 'alert("' . $message . '");';
            echo 'window.location="http://localhost/login System/rooms.php?roomname='.$room.'";';
            echo '</script>';
        }
    }









?>