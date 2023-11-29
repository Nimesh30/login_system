<?php 

  $conn = mysqli_connect("localhost","root","","chatroom");
  
   if (!$conn) {
    die("Failed to connect..". mysqli_connect_error());
   }
?>