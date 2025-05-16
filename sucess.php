<?php
// Database connection
include('db.php'); // Replace with the correct path to your database connection file

// Get the unique_id from the URL query string
if (isset($_GET['unique_id']) && !empty($_GET['unique_id'])) {
    $unique_id = $_GET['unique_id'];

    // Use prepared statements to avoid SQL injection
    $sql = $conn->prepare("SELECT first_name, last_name, address, email, phone FROM u WHERE unique_id = ?");
    $sql->bind_param("s", $unique_id); // 's' indicates the parameter is a string
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // Fetch user data from the result
        $user = $result->fetch_assoc();
        $full_name = $user['first_name'] . " " . $user['last_name'];
        $address = $user['address'];
        $email = $user['email'];
        $phone = $user['phone'];
    } else {
        // If no user is found for the given unique_id
        die("User not found.");
    }
} else {
    die("Invalid access.");
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .success-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .success-container h2 {
            text-align: center;
            color: #003580; /* Changed to #003580 */
            font-size: 24px;
        }
        .success-container p {
            font-size: 18px;
            margin: 10px 0;
        }
        .user-info {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
        }
        .user-info p {
            margin: 5px 0;
        }
        .user-info p strong {
            color: #003580; /* Changed to #003580 */
        }
        .message-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .message-box p {
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="success-container">
    <h2>Registration Successful!</h2>
    <div class="user-info">
        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($full_name); ?></p>
        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phone); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
        <p><strong>Email ID:</strong> <?php echo htmlspecialchars($email); ?></p>
        <p><strong>Your Unique ID:</strong> <?php echo htmlspecialchars($unique_id); ?></p>
    </div>
</div>

<div class="message-box">
    <p><strong>Next Step:</strong> Please take a photo of the registration card and confirm your booking status by submitting it to the admin.</p>
</div>

</body>
</html>
<?php
include('../Api/db.php');
include('../Api/signup.php');

?>