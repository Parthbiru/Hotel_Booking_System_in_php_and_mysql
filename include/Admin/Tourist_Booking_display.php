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

$sql = "SELECT * FROM tour_bookings";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tour Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #002a80;
            color: white;
        }
        table td {
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
            color: #002a80;
        }
        .confirmation-message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: green;
        }
    </style>
</head>
<body>

    <h1>Tour Bookings - Admin View</h1>

    <?php
    if (isset($_SESSION['confirmationMessage'])) {
        echo $_SESSION['confirmationMessage'];
        unset($_SESSION['confirmationMessage']); 
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Destination</th>
                <th>Package Tier</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Travelers</th>
                <th>Arrival Date</th>
                <th>Arrival Time</th>
                <th>Special Requests</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['destination'] . "</td>";
                    echo "<td>" . $row['package_tier'] . "</td>";
                    echo "<td>" . $row['full_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['travelers'] . "</td>";
                    echo "<td>" . $row['arrival_date'] . "</td>";
                    echo "<td>" . $row['arrival_time'] . "</td>";
                    echo "<td>" . $row['special_requests'] . "</td>";
                    echo "<td>₹" . $row['total_price'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11' style='text-align: center;'>No bookings found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>
