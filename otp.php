<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Otp Varification</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>


  <form method="post">
    <div class="mb-3 col-md-13 my-6">
      <!-- <input type="number" name="otp" id="otp" class="form-control" placeholder="Enter New Password "
        aria-describedby="passwordHelpBlock" required> -->

      <label for="password" class="form-label">New Password</label>
      <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpBlock"
        required>

      <label for="cpassword" class="form-label">Confirm New Password</label>
      <input type="password" name="cpassword" id="cpassword" class="form-control" aria-describedby="passwordHelpBlock"
        required>

      <button type="submit" name="submit" class="btn btn-primary">Done</button>
    </div>

  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>


<?php

// session_start();
// // Connect to the database
// $conn = mysqli_connect("localhost", "root", "", "users");
// if (!$conn) {
//   return "Failed Connection " . mysqli_connect_error();
// }

// function validateResetToken($token)
// {
//   $conn = mysqli_connect("localhost", "root", "", "users");
// if (!$conn) {
//   return "Failed Connection " . mysqli_connect_error();
// }

//   // Sanitize the token
//   $token = mysqli_real_escape_string($conn, $token);

//   // Query to check if the token exists in the database
//   $sql = "SELECT sno FROM users WHERE reset_token = '$token'";
//   $result = mysqli_query($conn, $sql);

//   if ($result && mysqli_num_rows($result) > 0) {
//     // Token exists in the database
//     mysqli_close($conn); // Close the database connection
//     return true;
//   } else {
//     // Token doesn't exist or is invalid
//     mysqli_close($conn); // Close the database connection
//     return false;
//   }
// }



// if (isset($_POST['submit'])) {
//   $conn = mysqli_connect("localhost", "root", "", "users");
// if (!$conn) {
//   return "Failed Connection " . mysqli_connect_error();
// }
//   $password = $_POST["password"];
//   $cpassword = $_POST["cpassword"];
//   // Usage
//   $tokenFromURL = $_GET['token'] ?? '';
//   if (($password == $cpassword)) {

//     if (!empty($tokenFromURL)) {
//       $isValidToken = validateResetToken($tokenFromURL);

//       if ($isValidToken) {
//          // Or perform the reset action
//         // Hash the new password (recommended for security)
//         // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
//         // $userId = $_SESSION['sno'];
//         $sno = $_SESSION['sno'];
//         // Update the user's password in the database
//         $sql = "UPDATE users SET password = '$password' WHERE sno = $sno";
//         $result = mysqli_query($conn, $sql);

//         if ($result !== false && mysqli_affected_rows($conn) > 0) {
//           echo "Password updated successfully.";
//           // Token exists in the database
//           mysqli_close($conn); // Close the database connection
//           return true;
//       } else {
//           echo "Failed to update password.";
//           // Token doesn't exist or is invalid
//           mysqli_close($conn); // Close the database connection
//           return false;
//       }

//       } else {
//         echo "Invalid token. Cannot proceed with password reset.";
//       }
//     } else {
//       echo "Token not found in the URL.";
//     }
//   }
// } else {
//   $err = "Password does not match...";
// }



?>


<?php
// session_start();

function validateResetToken($conn, $token)
{
    $token = mysqli_real_escape_string($conn, $token);
    $sql = "SELECT sno FROM users WHERE reset_token = '$token'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        mysqli_free_result($result);
        return true; // Token exists in the database
    } else {
        return false; // Token doesn't exist or is invalid
    }
}

function updatePassword($conn, $password, $sno)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = '$hashedPassword' WHERE sno = $sno";
    $result = mysqli_query($conn, $sql);

    return $result !== false && mysqli_affected_rows($conn) > 0;
}

if (isset($_POST['submit'])) {
    $conn = mysqli_connect("localhost", "root", "", "users");
    if (!$conn) {
        die("Failed Connection " . mysqli_connect_error());
    }

    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $tokenFromURL = $_GET['token'] ?? '';

    if ($password === $cpassword) {
        if (!empty($tokenFromURL)) {
            if (validateResetToken($conn, $tokenFromURL)) {
                $sno = $_SESSION['sno'] ?? null;

                if ($sno) {
                    if (updatePassword($conn, $password, $sno)) {
                        echo "Password updated successfully.";
                        header("location:login.php");
                    } else {
                        echo "Failed to update password.";
                    }
                } else {
                    echo "Invalid user session.";
                }
            } else {
                echo "Invalid token. Cannot proceed with password reset.";
            }
        } else {
            echo "Token not found in the URL.";
        }
    } else {
        $err = "Password does not match...";
    }

    mysqli_close($conn);
}
?>
