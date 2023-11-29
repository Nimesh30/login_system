<?php
error_reporting(0);
if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true) {
  $loggedin = true;
} else {
  $loggedin = false;
}
echo '
     <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
     <div class="container-fluid">
     <a class="navbar-brand">login system</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav me-auto mb-2 mb-lg-0"> ';
if ($loggedin) {
  echo '<li class="nav-item"><a class="nav-link" href="/login System/welcome.php">Home</a></li>';
  echo '<li class="nav-item"><a class="nav-link" href="/login System/chatroom.php">ChatRoom</a></li>';
}
if (!$loggedin) {

  echo ' <li class="nav-item"><a class="nav-link" href="/login System/login.php">Login</a></li>';
  echo '<li class="nav-item"><a class="nav-link" href="/login System/signup.php">Sign Up</a></li>';

}

if ($loggedin) {
  echo ' <li class="nav-item"><a class="nav-link" href="/login System/logout.php">Log Out</a>
               </li>';
}
echo '
            </ul>
            </div>
            </div>
       </nav>
';


?>