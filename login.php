<?php
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
  echo "Failed Connection " . mysqli_connect_error();
}

$login = false;
$err = false;

if (isset($_POST['submit'])) {
  $username = $_POST["username"];
  $password = $_POST["password"];


  $sql = "select * from users where username ='$username'";
  $result = mysqli_query($conn, $sql);

  // $num = mysqli_num_rows($result);
  $row = mysqli_fetch_array($result);

  if (mysqli_num_rows($result) > 0) {
    // $storedHashedPassword = $row['password']; // Assuming 'password' is the column storing hashed passwords
    // $dbpass = $row["password"];
    // $dbuser = $row["username"];



    if ($row["password"] == $password) {

      // Passwords match, user is authenticated
      $_SESSION["username"] = $username;
      $_SESSION["loggedin"] = true;
      $_SESSION['email'] = $email; // Store user data in session
      header("Location:welcome.php"); // Redirect to the dashboard or any authenticated page
      exit();
    } else {
      // Invalid password
      echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Error !</strong> Invalid Credintial
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div> ";
    }

  } else {

    if ($row["username"] != $username) {
      // if (password_verify($password, $storedHashedPassword)) {
        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error !</strong> Username does not exists....
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div> ";
    } else {
      echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Error !</strong> Insufficient argument....
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div> ";
    }
  }

  // if ($num == 1) {
  //   session_start();
  //   $_SESSION["username"] = $username;
  //   $login = true;
  //   header("Location: welcome.php");
  //   exit();
  // } else {
  //   echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  //   <strong>Please..</strong> Enter correct Username or Password..
  //   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  // </div> ";
  // }

}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <?php require '_nav.php' ?>
  <?php
  if ($login) {
    echo "  <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success</strong> Your account is now created ,and You can login now..
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div> ";
  }
  if ($err) {

    echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Error !</strong> password does not match
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div> ";
  }
  ?>

  <div class="container ">
    <h1 class="text-center">Login to our website</h1>

    <form method="post">
      <div class="mb-3 col-md-13 ">
        <label for="username" class="form-label">UserName</label>
        <input type="text" class="form-control" id="username" name="username">

        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpBlock">

      </div>
      <button type="submit" name="submit" class="btn btn-primary">Login</button>
      <a href="forget.php" class="btn btn-primary">Forgot Password</a>

    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>