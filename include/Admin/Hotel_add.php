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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_hotel'])) {
    $name = $_POST['name'];
    $city = $_POST['city']; 
    $location = $_POST['location'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $available_rooms = $_POST['available_rooms']; 
    $room_type = $_POST['room_type'];
    $room_size = $_POST['room_size'];
    $popular_guests = $_POST['popular_guests'];
    $room_features = $_POST['room_features'];
    $beds_and_blanket = $_POST['beds_and_blanket'];
    $facilities = $_POST['facilities'];

    $upload_dir = "uploads/";
    $image_paths = ["", "", "", ""]; // Default values for 4 images

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $key => $filename) {
            if ($key >= 4) break; // Limit to 4 images

            $tmp_name = $_FILES['images']['tmp_name'][$key];
            $target_file = $upload_dir . basename($filename);
            $file_type = $_FILES['images']['type'][$key];

            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($file_type, $allowed_types)) {
                echo "Invalid file type for $filename. Only JPEG, PNG, and GIF are allowed.";
                exit;
            }

            if ($_FILES['images']['size'][$key] > 2 * 1024 * 1024) {
                echo "File size exceeds the 2MB limit for $filename.";
                exit;
            }

            if (move_uploaded_file($tmp_name, $target_file)) {
                $image_paths[$key] = basename($filename);
            } else {
                echo "Error uploading image: $filename";
                exit;
            }
        }
    }

    $sql = "INSERT INTO hotels 
            (name, city, location, price, available_rooms, description, 
            room_type, room_size, popular_guests, room_features, 
            beds_and_blanket, facilities, image1, image2, image3, image4) 
            VALUES 
            ('$name', '$city', '$location', '$price', '$available_rooms', '$description', 
            '$room_type', '$room_size', '$popular_guests', '$room_features', 
            '$beds_and_blanket', '$facilities', 
            '{$image_paths[0]}', '{$image_paths[1]}', '{$image_paths[2]}', '{$image_paths[3]}')";

    if ($conn->query($sql) === TRUE) {
        echo "New hotel inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Hotel Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #002a80;
        }

        .form-container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container fieldset {
            border: 2px solid #002a80;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .form-container legend {
            font-weight: bold;
            color: #002a80;
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        .form-container input,
        .form-container textarea,
        .form-container select,
        .form-container button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container button {
            background-color: #002a80;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border: none;
        }

        .form-container button:hover {
            background-color: #001d66;
        }
    </style>
</head>
<body>
    <h2>Insert Hotel Details</h2>
    <div class="form-container">
        <form action="Hotel_add.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Hotel Information</legend>

                <label for="name">Hotel Name:</label>
                <input type="text" name="name" id="name" required>

                <label for="city">City:</label>
                <input type="text" name="city" id="city" required>

                <label for="location">Hotel Location:</label>
                <input type="text" name="location" id="location" required>

                <label for="price">Price per Night:</label>
                <input type="number" name="price" id="price" required>

                <label for="available_rooms">Available Rooms:</label>
                <input type="number" name="available_rooms" id="available_rooms" required>

                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="3" required></textarea>

                <label for="images">Upload Hotel Images:</label>
                <input type="file" name="images[]" id="images" accept="image/*" multiple required>
            </fieldset>

            <fieldset>
                <legend>Room Details</legend>

                <label for="room_type">Room Type:</label>
                <select id="room_type" name="room_type" required>
                    <option value="Royal Suite">Royal Suite</option>
                    <option value="Luxury Room">Luxury Room</option>
                    <option value="Deluxe Room">Deluxe Room</option>
                    <option value="Executive Suite">Executive Suite</option>
                </select>

                <label for="room_size">Room Size (sq ft):</label>
                <input type="number" id="room_size" name="room_size" required>

                <label for="popular_guests">Popular with Guests:</label>
                <input type="text" id="popular_guests" name="popular_guests" required>

                <label for="room_features">Room Features:</label>
                <input type="text" id="room_features" name="room_features" required>

                <label for="beds_and_blanket">Beds and Blanket:</label>
                <input type="text" id="beds_and_blanket" name="beds_and_blanket" required>

                <label for="facilities">Facilities:</label>
                <input type="text" id="facilities" name="facilities" required>
            </fieldset>

            <button type="submit" name="add_hotel">Insert Hotel</button>
        </form>
    </div>
</body>
</html>
