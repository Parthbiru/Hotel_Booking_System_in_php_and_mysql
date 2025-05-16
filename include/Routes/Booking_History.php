<?php
session_start(); // Start the session to access session variables
include('../Api/db.php'); // Include the database connection

// Check if user is logged in by verifying the session 'email'
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$email = $_SESSION['email']; // Retrieve the email from session

// Prepare SQL query using a prepared statement to prevent SQL injection
$query = "SELECT * FROM hotels_bookings WHERE user_email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email); // Bind the email parameter
$stmt->execute(); // Execute the query

// Get the result of the query
$result = $stmt->get_result();

// Handle booking cancellation (if requested)
if (isset($_GET['cancel_booking_date'])) {
    $cancel_booking_date = $_GET['cancel_booking_date'];

    // Prepare the SQL query to update the status to 'canceled' (lowercase)
    $cancel_query = "UPDATE hotels_bookings SET status = 'canceled' WHERE booking_date = ? AND user_email = ?";
    $cancel_stmt = $conn->prepare($cancel_query);
    $cancel_stmt->bind_param("ss", $cancel_booking_date, $email); // Bind the date and user email

    // Execute the query and check if successful
    if ($cancel_stmt->execute()) {
        // Set session variable to show success alert
        $_SESSION['cancel_success'] = true;
        header("Location: booking_history.php");
        exit();
    } else {
        // Capture error and display message
        echo "Error updating booking status: " . $cancel_stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h2 {
            color: #0056b3;
            text-align: center;
            padding-top: 30px;
            font-size: 28px;
        }

        h3 {
            color: #333;
            text-align: center;
            font-size: 22px;
            margin-top: 10px;
        }

        .booking-history {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 280px;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            color:#0056b3;
            font-size: 20px;
            margin-bottom: 10px;
            text-align: center;
        }

        .card p {
            font-size: 14px;
            margin: 5px 0;
            color: #555;
        }

        .card .cancel-btn {
            display: block;
            margin-top: 15px;
            padding: 10px;
            background-color: #0056b3;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .card .cancel-btn:hover {
            background-color: #003d7a;
        }

        .card .info {
            display: flex;
            flex-direction: column;
            gap: 8px;
            margin-bottom: 20px;
        }

        .card .info p {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

    <h2>Welcome to Dashboard:<br> <?php echo htmlspecialchars($_SESSION['email']); ?></h2>
    <h3>Your Booking History</h3>

    <div class="booking-history">
        <?php 
        // Show success alert if the session variable is set
        if (isset($_SESSION['cancel_success']) && $_SESSION['cancel_success'] === true) {
            echo "
            <script>
                alert('Booking canceled successfully');
                window.location.href = 'booking_history.php'; // Redirect after alert
            </script>";
            unset($_SESSION['cancel_success']);
        }

        if ($result->num_rows > 0) {
            // Fetch each row and display it as a card
            while ($row = $result->fetch_assoc()) { 
        ?>
            <div class="card">
                <h3><?php echo htmlspecialchars($row['user_name']); ?></h3>
                <div class="info">
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($row['user_email']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($row['user_phone']); ?></p>
                    <p><strong>Hotel ID:</strong> <?php echo htmlspecialchars($row['hotel_id']); ?></p>
                    <p><strong>Room Type:</strong> <?php echo htmlspecialchars($row['room_type']); ?></p>
                    <p><strong>Total Price:</strong> <?php echo htmlspecialchars($row['total_price']); ?></p>
                    <p><strong>Check-in:</strong> <?php echo htmlspecialchars($row['checkin_date']); ?></p>
                    <p><strong>Check-out:</strong> <?php echo htmlspecialchars($row['checkout_date']); ?></p>
                    <p><strong>Booking Date:</strong> <?php echo htmlspecialchars($row['booking_date']); ?></p>
                </div>
                <a href="Booking_History.php?cancel_booking_date=<?php echo $row['booking_date']; ?>" class="cancel-btn">Cancel Booking</a>
            </div>
        <?php 
            }
        } else {
            echo "<p>No bookings found.</p>";
        }
        ?>
    </div>

    <?php
    $stmt->close();
    $conn->close();
    ?>

</body>
</html>
