      
<?php
error_reporting(0);
session_start();
$conn = mysqli_connect("localhost", "root", "", "users");
if (!$conn) {
  echo "Failed Connection " . mysqli_connect_error();
}
$alert = false;
$err = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $exists = false;

  if (($password == $cpassword) && $exists == false) {
    $exists = true;

    $sql = "select * from users where username ='$username'";
    $result = mysqli_query($conn, $sql);

    $user_data = mysqli_fetch_array($result);
    $result = false;

    if (!$user_data['username'] == $username) {

      if (!$password == NULL or !$cpassword == NULL) {
        echo var_dump($password);
        echo var_dump($cpassword);

        $sql = " INSERT INTO `users` (`username`, `password`, `date`, `email`) VALUES ('$username', '$password', current_timestamp(), '$email')";
        $result = mysqli_query($conn, $sql);
        header("location:welcome.php");
      } else {

        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Please...</strong> enter the password...
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div> ";
      }

      if ($result) {
        $alert = true;
      }
    } else {
      if ($username == NULL) {
        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Please..</strong> Enter the Username....
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div> ";
      } else {
        
        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
              <strong>Sorry ...</strong> Username is already exists...
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div> ";
      }
    }
  } else {
    $err = "Password does not match...";
  }
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <?php require '_nav.php' ?>
  <?php
  if ($alert) {

    echo "  <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Success</strong> Your account is now created ,and You can login now..
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div> ";
  }
  if ($err) {

    echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
             <strong>Error !</strong> '.$err.'
             <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
           </div> ";
  }
  ?>

  <div class="container ">
    <h1 class="text-center">Sign up to our website</h1>

    <form action="/login System/signup.php" method="post">
      <div class="mb-3 col-md-9 ">
        <label for="username" class="form-label">UserName</label>
        <input type="text" class="form-control" id="username" name="username">

        <label for="email" class="form-label">Email Id </label>
        <input type="email" class="form-control" id="email" name="email" required>

        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpBlock">

        <label for="cpassword" class="form-label">Confirm Password</label>
        <input type="password" name="cpassword" id="cpassword" class="form-control"
          aria-describedby="passwordHelpBlock">

      </div>
      <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>