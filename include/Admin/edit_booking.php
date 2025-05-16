<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$booking_id = null;

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
}

if ($booking_id) {
    $stmt = $conn->prepare("SELECT * FROM hotels_bookings WHERE id = ?");
    $stmt->bind_param("i", $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_booking'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $room_type = $_POST['room_type'];
    $total_price = $_POST['total_price'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE hotels_bookings SET user_name = ?, user_email = ?, user_phone = ?, room_type = ?, total_price = ?, checkin_date = ?, checkout_date = ?, status = ? WHERE id = ?");
    $stmt->bind_param("ssssssssi", $user_name, $user_email, $user_phone, $room_type, $total_price, $checkin_date, $checkout_date, $status, $booking_id);

    if ($stmt->execute()) {
        header("Location: Hotel_booking_detalis.php?updated=1");
        exit();
    } else {
        echo "<p>Error updating booking.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 800px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; }
        h2 { color: #333; }
        label { display: block; margin: 8px 0; }
        input, select { width: 100%; padding: 8px; margin: 8px 0; }
        .submit-btn { background-color: #002a80; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        .submit-btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Booking</h2>

    <?php if (isset($booking)): ?>
        <form action="" method="POST">
            <label for="user_name">User Name</label>
            <input type="text" name="user_name" id="user_name" value="<?php echo $booking['user_name']; ?>" required>

            <label for="user_email">Email</label>
            <input type="email" name="user_email" id="user_email" value="<?php echo $booking['user_email']; ?>" required>

            <label for="user_phone">Phone</label>
            <input type="text" name="user_phone" id="user_phone" value="<?php echo $booking['user_phone']; ?>" required>

            <label for="room_type">Room Type</label>
            <select name="room_type" id="room_type" required>
                <option value="Royal Suite" <?php if ($booking['room_type'] == 'Royal Suite') echo 'selected'; ?>>Royal Suite</option>
                <option value="Luxury Room" <?php if ($booking['room_type'] == 'Luxury Room') echo 'selected'; ?>>Luxury Room</option>
                <option value="Deluxe Room" <?php if ($booking['room_type'] == 'Deluxe Room') echo 'selected'; ?>>Deluxe Room</option>
                <option value="Executive Suite" <?php if ($booking['room_type'] == 'Executive Suite') echo 'selected'; ?>>Executive Suite</option>

            </select>

            <label for="total_price">Total Price</label>
            <input type="text" name="total_price" id="total_price" value="<?php echo $booking['total_price']; ?>" required>

            <label for="checkin_date">Check-in Date</label>
            <input type="date" name="checkin_date" id="checkin_date" value="<?php echo $booking['checkin_date']; ?>" required>

            <label for="checkout_date">Check-out Date</label>
            <input type="date" name="checkout_date" id="checkout_date" value="<?php echo $booking['checkout_date']; ?>" required>

            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="pending" <?php if ($booking['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                <option value="complete" <?php if ($booking['status'] == 'complete') echo 'selected'; ?>>Complete</option>
                <option value="canceled" <?php if ($booking['status'] == 'canceled') echo 'selected'; ?>>Canceled</option>
            </select>

            <input type="submit" name="update_booking" class="submit-btn" value="Update Booking">
        </form>
    <?php else: ?>
        <p>Booking not found.</p>
    <?php endif; ?>
</div>

</body>
</html>
