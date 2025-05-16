<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>
            alert('You need to be logged in to access this page!');
            window.location.href = '../form/Login.php';  // Replace with the correct path to your login page
          </script>";
    exit();  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            color: #333;
            justify-content: center;
            align-items: center;
            height: 100vh;
            animation: fadeIn 1s ease-in;
        }

       
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 5px solid #ddd;
            border-radius: 10px;
            background-color: #ffffff;
            color: #333;
            animation: slideIn 0.5s ease-out;
        }

       
        textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button {
            padding-left:10px;
            padding: 10px 10px;
            background-color:  #0056b3;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #004080;
            transform: scale(1.05);
        }

       
    </style>
</head>
<body>

<?php include '../../include/home Navbar/navbar.php'; ?>


<div>
    <br><br>
    <form action="feedback.php" method="POST">
        <textarea name="feedback" placeholder="Enter your feedback..." required></textarea>
        <button type="submit">Submit Feedback</button>
    </form>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['feedback'])) {
    $feedback = $_POST['feedback'];

    
    $sql = "INSERT INTO feedback (comment, status) VALUES ('$feedback', 'inactive')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Thank you for your feedback!'); window.location.href='../home.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

</body>
<?php include '../../include/home Navbar/Footer.php'; ?>
</html>
