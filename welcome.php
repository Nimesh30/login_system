<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
  header("location:login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome --
    <?php echo $_SESSION['username'] ?>
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

 <style>
/*  
 body {
  min-height: 90vh;
  position: relative;
  margin: 0;
  padding-bottom: 90px; //height of the footer
  box-sizing: border-box;
  align-items: center;
  
} */

footer {
  position: absolute;
  bottom: 0;
  height: 90px;
  background-color: burlywood;
  width: 100%;
}
</style>
  </head>

<body class="d-flex flex-column min-vh-100">
  <?php require '_nav.php' ?>

  <h2 class="text-center my-4">Welcome
    <?php echo $_SESSION['username'] ?> to our Website....
  </h2>


  <h4 class="mb-0 text-center"><a href="logout.php">log Out.. </a></h4>
  <footer class="bg-body-tertiary text-center text-lg-start" class="mt-auto">
   <div class="container p-4">
      <div class="row">
       <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Footer text</h5>
           <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
            voluptatem veniam, est atque cumque eum delectus sint!
          </p>
        </div>
         <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Footer text</h5>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
            voluptatem veniam, est atque cumque eum delectus sint!
          </p>
        </div>
      </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2023 Copyright:
      <a class="text-body" href="https://mdbootstrap.com/">chatroom.com</a>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>