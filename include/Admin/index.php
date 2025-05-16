<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hotel_booking_system"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM admin_login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($password === $row['password']) { 
            $_SESSION['username'] = $username;

            header("refresh:2;url=Admin_dashboard.php");
            $login_message = "Login Successful! Redirecting...";
            $redirecting = true;
        } else {
            $login_message = 'Invalid username or password!';
            $redirecting = false;
        }
    } else {
        $login_message = 'Invalid username or password!';
        $redirecting = false;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #003580;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        .container {
            width: 400px;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #003580;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #002a80;
            color: white;
            border: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
        }

        button:hover {
            background-color: #001a5d;
        }

        .alert {
            background-color: #dc3545;
            color: white;
            padding: 10px;
            margin-top: 15px;
            border-radius: 8px;
            text-align: center;
        }

        /* Loading screen */
        .loading-screen {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 53, 128, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            font-size: 22px;
            font-weight: bold;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, 0.3);
            border-top: 5px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-top: 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    <script>
        function showLoadingScreen() {
            document.getElementById('login-container').style.display = 'none';
            document.getElementById('loading-screen').style.display = 'flex';
        }
    </script>

</head>
<body>

    <?php if (!empty($login_message) && $redirecting): ?>
        <div id="loading-screen" class="loading-screen">
            <p><?php echo $login_message; ?></p>
            <div class="spinner"></div>
        </div>
    <?php else: ?>
        <div id="login-container" class="container">
            <h2>Admin Login</h2>

            <?php if (!empty($login_message)): ?>
                <div class="alert"><?php echo $login_message; ?></div>
            <?php endif; ?>

            <form method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    <?php endif; ?>

</body>
</html>
