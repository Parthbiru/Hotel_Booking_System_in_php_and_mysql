<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <?php include '../../include/home Navbar/navbar.php'; ?>

    <style>
        form {
            width: 300px;
            margin: 0 auto;
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form h3 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #333;
        }

        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }

        form button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background-color:  #0056b3;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }

        form input[type="hidden"] {
            display: none;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";  
    $username = "root";         
    $password = "";             
    $dbname = "hotel_booking_system";       

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['email']) && isset($_GET['reset_token'])) {
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d");
        
        $query = "SELECT * FROM register_user WHERE `email`='" . $_GET['email'] . "' AND `resettoken`='" . $_GET['reset_token'] . "' AND `resettokenexprice`='$date'";
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                echo "
                <form method='POST'>
                    <h3>Create New Password</h3>
                    <input type='password' placeholder='Enter New password' name='Password'>
                    <button type='submit' name='updatepassword'>Update</button>
                    <input type='hidden' name='email' value='" . $_GET['email'] . "'>
                </form>";
            } else {
                echo "
                <script>
                    alert('Invalid or Expired link');
                    window.location.href = 'forget_password.php';
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Server down');
                window.location.href = 'forget_password.php';
            </script>";
        }
    }
    ?>

    <?php
    if (isset($_POST['updatepassword'])) {
        $password = password_hash($_POST['Password'], PASSWORD_BCRYPT);
        $update = "UPDATE `register_user` SET `password`='$password', `resettoken`=NULL, `resettokenexprice`=NULL WHERE `email`='" . $_POST['email'] . "'";
        
        if (mysqli_query($conn, $update)) {
            echo "
            <script>
                alert('Password changed successfully');
                window.location.href = 'forget password.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Server down, please try again later');
                window.location.href = 'forget password.php';
            </script>";
        }
    }
    ?>

</body>
<?php include '../../include/home Navbar/footer.php'; ?>

</html>
