<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    </style>
</head>

<body>

    <form method="post">

        <div class="mb-3 col-md-13 ">

            <label for="username" class="form-label">Email Id </label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Send OTP</button><br>

        <!-- <a href="otp.php"  class="btn btn-primary">Send OTP</a> -->

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>




<?php
// Function to generate OTP
// session_start();

// function connectToDatabase()
// {
//     $conn = mysqli_connect("localhost", "root", "", "users");
//     if (!$conn) {
//         die("Failed Connection " . mysqli_connect_error());
//     }
//     return $conn;
// }

// function generateOTP($length = 6)
// {
//     $characters = '0123456789';
//     $otp = '';
//     $max = strlen($characters) - 1;

//     for ($i = 0; $i < $length; $i++) {
//         $otp .= $characters[mt_rand(0, $max)];
//     }

//     return $otp;
// }


// function generateToken($length = 40)
// {
//     return bin2hex(random_bytes($length));
// }


// function updateUserResetToken($conn, $userId, $token, $expiration)
// {
//     // Prepare the statement
//     $sql = "UPDATE users SET reset_token = ?, token_expiration = ? WHERE sno = ?";
//     $stmt = mysqli_prepare($conn, $sql);

//     if (!$stmt) {
//         return "Error preparing statement: " . mysqli_error($conn);
//     }

//     // Bind parameters
//     mysqli_stmt_bind_param($stmt, 'ssi', $token, $expiration, $userId);

//     // Execute the statement
//     $exec = mysqli_stmt_execute($stmt);

//     // Check execution status
//     if ($exec) {
//         return "Token updated successfully!";
//     } else {
//         return "Error updating token: " . mysqli_stmt_error($stmt);
//     }
// }



// function sendOTPByEmail($to_email, $subject, $conn)
// {

//     // $sql = "SELECT sno FROM users WHERE email = ?";
//     // $stmt = mysqli_prepare($conn, $sql);

//     // if (!$stmt) {
//     //     return "Error preparing statement: " . mysqli_error($conn);
//     // }

//     // mysqli_stmt_bind_param($stmt, 's', $to_email);
//     // mysqli_stmt_execute($stmt);
//     // mysqli_stmt_bind_result($stmt, $userId);


//     $sql = "SELECT * FROM users WHERE email = '$to_email'";
//     $result = mysqli_query($conn, $sql);

//     if (!$result) {
//         die("Error: " . mysqli_error($conn)); // Display the MySQL error message
//     }

//     $row = mysqli_fetch_array($result);
//     // $sno = $row['sno'];
//     // $email = $row['email'];
//     // echo $sno;
//     // echo $email;

//     // if (mysqli_num_rows($result) > 0) {
//     //     while ($row = mysqli_fetch_assoc($result)) {
//     //         $sno = $row['sno'];
//     //         $email = $row['password'];
//     //         echo $sno;
//     //         echo $email;
//     //     }
//     // } else {
//     //     echo "User with this email does not exist.";
//     // }

//     // mysqli_free_result($result); // Free the result set
//     // mysqli_close($conn); // Close the connection


//     $num = mysqli_num_rows($result);

//     if ($num == 1) {

//         $sno = $row['sno'];
//         $email = $row['email'];
//         echo $sno;
//         echo $email;
//         $_SESSION['sno'] = $sno;

//         // Usage
//         $token = generateToken();
//         $expiration = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expiration in 1 hour


//         $result = updateUserResetToken($conn, $sno, $token, $expiration);

//         // $resetLink = "http://example.com/reset-password?token=$token";
//         $resetLink = "http://localhost/login%20System/otp.php?token=$token";

//         $message = "Hello,\n\nPlease click on the link below to reset your password:\n$resetLink\n\nIf you didn't request this, you can safely ignore this email.";

//         if (mail($to_email, $subject, $message)) {
//             echo "Link send to your mail to forgot password";
//         } else {
//             echo 'Failed to send OTP. Please try again.';
//         }


//     } else {
//         echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
//         <strong>Please..</strong> Enter sufficient Username or Password..
//         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
//       </div> ";
//     }




//     // mysqli_close($conn);





//     // if (mail($to_email, $subject, $message)) {
//     //     echo 'An OTP has been sent to your email.';

//     //     // Usage
//     //     $userId = 46; // Replace with the actual user ID
//     //     $token = generateToken();
//     //     $expiration = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token expiration in 1 hour

//     //     // Escape the token for security (if needed)
//     //     $token = mysqli_real_escape_string($conn, $token);

//     //     // Call the function
//     //     $result = updateUserResetToken($conn, $userId, $token, $expiration);

//     //     echo $result;
//     //     header("location:otp.php");
//     // } else {
//     //     echo 'Failed to send OTP. Please try again.';
//     // }

// }



// $to_email = $_POST['email'];
// $subject = 'Your OTP Code';
// $otp = generateOTP();
// $_SESSION['email'] = $to_email;
// $message = 'Your OTP code is: ' . $otp;
// $conn = connectToDatabase();


// if (!empty($to_email)) {
//     sendOTPByEmail($to_email, $subject, $conn);
//     // mysqli_close($conn);
// } else {
//     echo "Email address is empty.";
// }


?>






<?php
session_start();

function connectToDatabase()
{
    $conn = mysqli_connect("localhost", "root", "", "users");
    if (!$conn) {
        die("Failed Connection " . mysqli_connect_error());
    }
    return $conn;
}

function generateOTP($length = 6)
{
    $characters = '0123456789';
    $otp = '';
    $max = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[mt_rand(0, $max)];
    }

    return $otp;
}

function generateToken($length = 40)
{
    return bin2hex(random_bytes($length));
}

function updateUserResetToken($conn, $userId, $token, $expiration)
{
    $sql = "UPDATE users SET reset_token = ?, token_expiration = ? WHERE sno = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        return "Error preparing statement: " . mysqli_error($conn);
    }

    mysqli_stmt_bind_param($stmt, 'ssi', $token, $expiration, $userId);
    $exec = mysqli_stmt_execute($stmt);

    if ($exec) {
        return "Token updated successfully!";
    } else {
        return "Error updating token: " . mysqli_stmt_error($stmt);
    }
}

function sendOTPByEmail($to_email, $subject, $conn)
{
    $sql = "SELECT * FROM users WHERE email = '$to_email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_array($result);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        $sno = $row['sno'];
        $_SESSION['sno'] = $sno;

        $token = generateToken();
        $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

        $result = updateUserResetToken($conn, $sno, $token, $expiration);

        $resetLink = "http://localhost/login%20System/otp.php?token=$token";
        $message = "Hello,\n\nPlease click on the link below to reset your password:\n$resetLink\n\nIf you didn't request this, you can safely ignore this email.";

        if (mail($to_email, $subject, $message)) {
            echo 'An OTP has been sent to your email.';
            echo $result;
            echo "Link send to your mail to forgot password";
        } else {
            echo 'Failed to send OTP. Please try again.';
        }
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Please..</strong> Enter sufficient Username or Password..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
}

$to_email = $_POST['email'];
$subject = 'Your OTP Code';
$otp = generateOTP();
$_SESSION['email'] = $to_email;
$message = 'Your OTP code is: ' . $otp;
$conn = connectToDatabase();

if (!empty($to_email)) {
    sendOTPByEmail($to_email, $subject, $conn);
} else {
    echo "Email address is empty.";
}
?>
