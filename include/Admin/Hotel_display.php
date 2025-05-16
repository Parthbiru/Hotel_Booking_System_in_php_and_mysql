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

if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM hotels WHERE id = '$delete_id'";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<div class='success-msg'>Hotel deleted successfully!</div>";
    } else {
        echo "<div class='error-msg'>Error deleting hotel: " . $conn->error . "</div>";
    }
}

// Fetch all hotel data
$sql = "SELECT * FROM hotels";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Hotels</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
    }

    body {
        background-color: #f5f6fa;
        color: #333;
        padding: 10px;
        line-height: 1.6;
    }

    h2 {
        color: #2c3e50;
        margin-bottom: 30px;
        text-align: center;
        font-size: 2rem;
    }

    .container {
        max-width: 250%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 140%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 15px;
        overflow: hidden;
        margin-top: 20px;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
        font-size: 0.9rem;
    }

    th {
        background-color: #2c3e50;
        color: white;
        font-weight: 500;
        text-transform: uppercase;
        font-size: 0.85rem;
    }

    tr:nth-child(even) {
        background-color: #f8f9fd;
    }

    tr:hover {
        background-color: #f1f3f5;
        transition: background-color 0.2s ease;
    }

    img {
        max-width: 150px;
        max-height: 100px;
        border-radius: 4px;
        margin: 4px;
        object-fit: cover;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .actions a {
        text-decoration: none;
        padding: 8px 12px;
        border-radius: 4px;
        font-size: 0.9rem;
        transition: opacity 0.2s ease;
    }

    .actions a[href*="Hotel_edit"] {
        background-color: #3498db;
        color: white;
    }

    .actions a[href*="delete_id"] {
        background-color: #e74c3c;
        color: white;
    }

    .actions a:hover {
        opacity: 0.8;
    }

    .success-msg {
        background-color: #2ecc71;
        color: white;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 4px;
        text-align: center;
        font-size: 0.95rem;
    }

    .error-msg {
        background-color: #e74c3c;
        color: white;
        padding: 12px;
        margin-bottom: 20px;
        border-radius: 4px;
        text-align: center;
        font-size: 0.95rem;
    }

    @media (max-width: 768px) {
        body {
            padding: 10px;
        }

        .container {
            padding: 10px;
        }

        table {
            display: block;
            overflow-x: auto;
        }

        th, td {
            min-width: 150px;
            font-size: 0.8rem;
        }

        .actions {
            flex-direction: column;
            gap: 5px;
        }

        .actions a {
            padding: 6px 10px;
            font-size: 0.8rem;
        }

        img {
            max-width: 60px;
            max-height: 50px;
        }
    }
    
</style>
</head>
<body>
    <div class="container">
        <h2>Hotel Management</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Available Rooms</th>
                    <th>Description</th>
                    <th>Room Type</th>
                    <th>Room Size</th>
                    <th>Popular with Guests</th>
                    <th>Room Features</th>
                    <th>Beds and Blanket</th>
                    <th>Facilities</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($hotel = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $hotel['id'] . "</td>";
                        echo "<td>" . $hotel['name'] . "</td>";
                        echo "<td>" . $hotel['city'] . "</td>";
                        echo "<td>" . $hotel['location'] . "</td>";
                        echo "<td>" . $hotel['price'] . "</td>";
                        echo "<td>" . $hotel['available_rooms'] . "</td>";
                        echo "<td>" . $hotel['description'] . "</td>";
                        echo "<td>" . $hotel['room_type'] . "</td>";
                        echo "<td>" . $hotel['room_size'] . "</td>";
                        echo "<td>" . $hotel['popular_guests'] . "</td>";
                        echo "<td>" . $hotel['room_features'] . "</td>";
                        echo "<td>" . $hotel['beds_and_blanket'] . "</td>";
                        echo "<td>" . $hotel['facilities'] . "</td>";

                        echo "<td>";
                        for ($i = 1; $i <= 4; $i++) {
                            if (!empty($hotel["image$i"])) {
                                echo "<img src='../Admin/uploads/" . $hotel["image$i"] . "' alt='Hotel Image $i'>";
                            }
                        }
                        echo "</td>";
                        
                        echo "<td class='actions'>";
                        echo "<a href='Hotel_edit.php?hotel_id=" . $hotel['id'] . "'>Edit</a>";
                        echo "<a href='?delete_id=" . $hotel['id'] . "' onclick='return confirm(\"Are you sure you want to delete this hotel?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='15'>No hotels found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>