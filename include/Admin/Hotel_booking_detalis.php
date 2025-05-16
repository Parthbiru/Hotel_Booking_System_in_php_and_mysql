<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM hotels_bookings";
$result = $conn->query($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $booking_id = $_POST['booking_id'];
    $new_status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE hotels_bookings SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $booking_id);

    if ($stmt->execute()) {
        header("Location: Hotel_booking_detalis.php?success=1");
        exit();
    } else {
        echo "<p>Error updating status.</p>";
    }
}

if (isset($_POST['delete_booking'])) {
    $booking_id = $_POST['booking_id'];
    $delete_stmt = $conn->prepare("DELETE FROM hotels_bookings WHERE id = ?");
    $delete_stmt->bind_param("i", $booking_id);

    if ($delete_stmt->execute()) {
        header("Location: Hotel_booking_detalis.php?deleted=1");
        exit();
    } else {
        echo "<p>Error deleting booking.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Booking Management</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: center; }
        th { background-color: #002a80; color: white; }
        .action-btn { padding: 6px 12px; border: none; cursor: pointer; font-size: 14px; }
        .update-btn { background-color: #002a80; color: white; }
        .delete-btn { background-color: #f44336; color: white; }
        .edit-btn { background-color: #ffa500; color: white; }
        select, input { padding: 6px; margin-right: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Admin - Booking Management</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Room Type</th>
                <th>Total Price</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Status</th>
                <th>Change Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['user_email']; ?></td>
                    <td><?php echo $row['user_phone']; ?></td>
                    <td><?php echo $row['room_type']; ?></td>
                    <td>₹<?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['checkin_date']; ?></td>
                    <td><?php echo $row['checkout_date']; ?></td>
                    <td><?php echo ucfirst($row['status']); ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                            <select name="status" required>
                                <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                <option value="complete" <?php if ($row['status'] == 'complete') echo 'selected'; ?>>Complete</option>
                                <option value="canceled" <?php if ($row['status'] == 'canceled') echo 'selected'; ?>>Canceled</option>
                            </select>
                            <input type="submit" name="update_status" class="action-btn update-btn" value="Update">
                        </form>
                    </td>
                    <td>
                        <form action="edit_booking.php" method="GET" style="display:inline;">
                            <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                            <input type="submit" class="action-btn edit-btn" value="Edit">
                        </form>

                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="delete_booking" class="action-btn delete-btn" value="Delete" onclick="return confirm('Are you sure you want to delete this booking?');">
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
