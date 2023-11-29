<?php

include 'dbconn.php';
$roomname = $_GET['roomname'];


$sql = "select *from rooms where roomname = '$roomname'  ";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) == 0) {

    $message = "This room is not available...first you should create a room ";
    echo '<script language="javascript">';
    echo 'alert("' . $message . '");';
    echo 'window.location="http://localhost/login System/chatroom.php";';
    echo '</script>';

}
?>



<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        body {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
        }

        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }

        .anyclass {
            height: 350px;
            overflow-y: scroll;
        }

        .exit{
            margin-left: 80%;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center link-body-emphasis text-decoration-none">
            <span class="fs-4">Chat Room</span>
        </a>

        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto ">
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="#">Home</a>
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="#">About</a>
            <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="#">Contact Us </a>
          
        </nav>
    </div>


    <h2>Chat Messages
        <?php echo "From  " . $roomname ?>
    </h2>

    <div class="container">
        <div class="anyclass">

        </div>
    </div>



    <input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Add Message">
    <button class="btn btn-primary btn-default" name="submitmsg" id="submitmsg">Send</button>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            // Function to fetch and display messages
            function fetchMessages() {
                $.post('htcont.php', { room: '<?php echo $roomname ?>' }, function (data, status) {
                    $('.anyclass').html(data); // Display fetched messages
                });
            }

            // Execute a function when the user presses a key on the keyboard
            $('#usermsg').keypress(function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    $('#submitmsg').click(); // Trigger the "Send" button click on Enter
                }
            });

            // Click event for the "Send" button
            $('#submitmsg').click(function () {
                var clientmsg = $('#usermsg').val();
                $.post('postmsg.php', {
                    text: clientmsg,
                    room: '<?php echo $roomname ?>',
                    ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>'
                }, function (data, status) {
                    fetchMessages(); // Fetch and display all messages after sending
                });

                $('#usermsg').val(''); // Clear the input field after sending
            });

            // Fetch messages initially on page load
            fetchMessages();
        });
    </script>

    <!-- <script>
    $(document).ready(function () {
        // Function to fetch and display messages
        function fetchMessages() {
            $.post('htcont.php', { room: '<?php echo $roomname ?>' }, function (data, status) {
                $('.anyclass').html(data); // Display fetched messages
            });
        }

        // Fetch messages on initial page load
        fetchMessages();

        $('#submitmsg').click(function () {
            var clientmsg = $('#usermsg').val();
            $.post('postmsg.php', {
                text: clientmsg,
                room: '<?php echo $roomname ?>',
                ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>'
            }, function (data, status) {
                $('.anyclass').html(data); // Display sent message
                $('#usermsg').val(''); // Clear the input field after sending
                fetchMessages(); // Fetch and display all messages after sending
            });
        });

        $('#usermsg').keypress(function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                $('#submitmsg').click();
            }
        });
    });
</script> -->

<a href="chatroom.php" class="btn btn-default btn-primary exit">Exit </a>
</body>

</html>