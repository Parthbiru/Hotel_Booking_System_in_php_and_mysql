<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #002a80;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #002a80;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #002a80;
        }

        p {
            margin-top: 10px;
            font-size: 14px;
        }

        a {
            color: #002a80;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Employee Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <button type="submit">Login</button>
        </form>

        <p>Not registered yet? <a href="register.php">Register here</a></p>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli('localhost', 'root', '', 'hotel_booking_system');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT name, password FROM employees_register WHERE name = ?");
    
        if ($stmt === false) {
            die('MySQL prepare error: ' . $conn->error); 
        }

        $stmt->bind_param("s", $username); 
        $stmt->execute(); 
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($name, $hashed_password);
            $stmt->fetch(); 
            
            if (password_verify($password, $hashed_password)) {
                $_SESSION['name'] = $name;
                echo "<script>alert('Login Successful!'); window.location.href='Employee_data.php';</script>";
            } else {
                echo "<script>alert('Invalid Password!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('No User Found!'); window.history.back();</script>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
