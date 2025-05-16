
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Search Results</title>
    <style>
        /* Global Styles */
        body, h2, h3, p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #002a80;
            padding: 50px 20px;
        }

        /* Page Heading */
        .heading {
            font-size: 32px;
            font-weight: bold;
            color: white;
            margin-bottom: 30px;
            text-align: center;
            text-transform: uppercase;
        }

        /* Hotel Card Layout */
        .hotel {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 900px;
        }

        /* Hotel Image */
        .hotel-image-wrapper {
            flex-shrink: 0;
            width: 350px;
            height: 280px;
            overflow: hidden;
            border-radius: 10px;
        }

        .hotel-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .hotel-image-wrapper img:hover {
            transform: scale(1.05);
        }

        /* Hotel Information */
        .hotel-info {
            max-width: 500px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .hotel-name {
            font-size: 26px;
            font-weight: bold;
            color: #002a80;
            margin-bottom: 8px;
        }

        .hotel-detail {
            font-size: 16px;
            color: #002a80;
            margin: 5px 0;
        }

        /* Book Now Button */
        .book-btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #001d66;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            transition: all 0.3s ease-in-out;
            width: 160px;
        }

        .book-btn:hover {
            background-color: #001d66;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <!--<div class="heading">Hotel Search Results</div>-->
<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $city = $_POST['city'];
    $checkin_date = $_POST['check-in'];
    $checkout_date = $_POST['check-out'];

    if (empty($city) || empty($checkin_date) || empty($checkout_date)) {
        echo "<p style='color: white; text-align: center;'>Please fill in all fields.</p>";
    } else {
        $checkin = new DateTime($checkin_date);
        $checkout = new DateTime($checkout_date);
        $interval = $checkin->diff($checkout);
        $total_nights = $interval->days;

        $sql = "SELECT * FROM hotels WHERE city = '$city' AND available_rooms > 0";
        
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2 class='heading'>Hotels in $city</h2>";

            while ($row = mysqli_fetch_assoc($result)) {
                $price_per_night = $row['price'];
                $total_price = $price_per_night * $total_nights;

                echo "<div class='hotel'>";
                echo "<div class='hotel-image-wrapper'>";
                echo "<img src='../Admin/uploads/" . $row['image1'] . "' alt='Hotel Image'>";
                echo "</div>";

                echo "<div class='hotel-info'>";
                echo "<div class='hotel-name'>" . $row['name'] . "</div>";
                echo "<div class='hotel-detail'><strong>City:</strong> " . $row['city'] . "</div>";
                echo "<div class='hotel-detail'><strong>Location:</strong> " . $row['location'] . "</div>";
                echo "<div class='hotel-detail'><strong>Price per Night:</strong> ₹" . $price_per_night . "</div>";
                echo "<div class='hotel-detail'><strong>Room Type:</strong> " . $row['room_type'] . "</div>";
                echo "<div class='hotel-detail'><strong>Room Size:</strong> " . $row['room_size'] . " sq ft</div>";
                echo "<div class='hotel-detail' style='font-weight: bold; color: red;'><strong>Total Price for $total_nights Night(s):</strong> ₹" . $total_price . "</div>";

                echo "<h3 class='hotel-detail'><strong>Description:</strong></h3>";
                echo "<div class='hotel-detail'>" . nl2br($row['description']) . "</div>";

                echo "<h3 class='hotel-detail'><strong>Popular with Guests:</strong></h3>";
                echo "<div class='feature-item'>" . $row['popular_guests'] . "</div>";

                echo "<h3 class='hotel-detail'><strong>Room Features:</strong></h3>";
                echo "<div class='features'>";
                $features = explode(',', $row['room_features']);
                foreach ($features as $feature) {
                    echo "<span class='feature-item'>$feature</span>";
                }
                echo "</div>";

                echo "<h3 class='hotel-detail'><strong>Beds & Blanket:</strong></h3>";
                echo "<div class='feature-item'>" . $row['beds_and_blanket'] . "</div>";

                echo "<h3 class='hotel-detail'><strong>Facilities:</strong></h3>";
                echo "<div class='facilities'>";
                $facilities = explode(',', $row['facilities']);
                foreach ($facilities as $facility) {
                    echo "<span class='facility-item'>$facility</span>";
                }
                echo "</div>";

               
                //echo "<a href='/dynamic website/include/Api/Hotel_booking.php' class='book-btn'>Book Now</a>";
                // Inside the while loop for displaying hotels
                        
                        echo "<a href='/dynamic website/include/Api/Hotel_booking.php?hotel_id=" . urlencode($row['id']) . "&room_type=" . urlencode($row['room_type']) . "&price=" . urlencode($total_price) . "&checkin=" . urlencode($checkin_date) . "&checkout=" . urlencode($checkout_date) . "' class='book-btn'>Book Now</a>";
                        //
                        echo "<a href='../../include/Routes/view_More_Details.php' class='book-btn'>Package Book Now</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p style='color: white; text-align: center;'>No hotel found in $city. Try a different city.</p>";
        }

        mysqli_free_result($result);
    }
}
?>
</body>
</html>


