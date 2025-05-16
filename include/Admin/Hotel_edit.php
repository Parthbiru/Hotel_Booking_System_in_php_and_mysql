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

if (isset($_GET['hotel_id'])) {
    $hotel_id = intval($_GET['hotel_id']);
    $sql = "SELECT * FROM hotels WHERE id = '$hotel_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $hotel = $result->fetch_assoc();
    } else {
        echo "Hotel not found.";
        exit;
    }
} else {
    echo "Hotel ID is missing.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_hotel'])) {
    $hotel_id = isset($_POST['hotel_id']) ? intval($_POST['hotel_id']) : 0;
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : 0;
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $available_rooms = isset($_POST['available_rooms']) ? $_POST['available_rooms'] : 0;
    $room_type = isset($_POST['room_type']) ? $_POST['room_type'] : '';
    $room_size = isset($_POST['room_size']) && $_POST['room_size'] !== '' ? $_POST['room_size'] : NULL;
    $popular_guests = isset($_POST['popular_guests']) ? $_POST['popular_guests'] : '';
    $room_features = isset($_POST['room_features']) ? $_POST['room_features'] : '';
    $beds_and_blanket = isset($_POST['beds_and_blanket']) ? $_POST['beds_and_blanket'] : '';
    $facilities = isset($_POST['facilities']) ? $_POST['facilities'] : '';

    $price = is_numeric($price) ? $price : 0;
    $available_rooms = is_numeric($available_rooms) ? $available_rooms : 0;

    $upload_dir = "../Admin/uploads/";
    $image_paths = ["", "", "", ""];

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $key => $filename) {
            if ($key >= 4) break;

            $tmp_name = $_FILES['images']['tmp_name'][$key];
            $target_file = $upload_dir . basename($filename);
            $file_type = $_FILES['images']['type'][$key];

            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($file_type, $allowed_types)) {
                echo "<div class='error-msg'>Invalid file type for $filename. Only JPEG, PNG, and GIF are allowed.</div>";
                exit;
            }

            if ($_FILES['images']['size'][$key] > 2 * 1024 * 1024) {
                echo "<div class='error-msg'>File size exceeds the 2MB limit for $filename.</div>";
                exit;
            }

            if (move_uploaded_file($tmp_name, $target_file)) {
                $image_paths[$key] = basename($filename);
            } else {
                echo "<div class='error-msg'>Error uploading image: $filename</div>";
                exit;
            }
        }
    }

    if ($hotel_id <= 0) {
        echo "<div class='error-msg'>Hotel ID is missing or invalid.</div>";
        exit;
    }

    $sql = "UPDATE hotels SET 
            name = '$name', 
            city = '$city', 
            location = '$location', 
            price = '$price', 
            available_rooms = '$available_rooms', 
            description = '$description', 
            room_type = '$room_type', 
            room_size = " . ($room_size === NULL ? "NULL" : "'$room_size'") . ", 
            popular_guests = '$popular_guests', 
            room_features = '$room_features', 
            beds_and_blanket = '$beds_and_blanket', 
            facilities = '$facilities', 
            image1 = '{$image_paths[0]}', 
            image2 = '{$image_paths[1]}', 
            image3 = '{$image_paths[2]}', 
            image4 = '{$image_paths[3]}'
            WHERE id = '$hotel_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='success-msg'>Hotel details updated successfully!</div>";
    } else {
        echo "<div class='error-msg'>Error updating hotel: " . $conn->error . "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hotel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f6fa;
            color: #333;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        h2 {
            color: #2c3e50;
            margin-bottom: 25px;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color:  #002a80;
            outline: none;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input[type="file"] {
            padding: 5px;
        }

        button {
            background-color:  #002a80;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color:  #002a80;
        }

        .success-msg {
            background-color:  #002a80;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }

        .error-msg {
            background-color: #e74c3c;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            input[type="text"],
            input[type="number"],
            textarea {
                font-size: 14px;
            }

            button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Hotel</h2>

        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="hotel_id" value="<?php echo $hotel['id']; ?>">

            <div>
                <label for="name">Hotel Name:</label>
                <input type="text" name="name" value="<?php echo $hotel['name']; ?>" required>
            </div>

            <div>
                <label for="city">City:</label>
                <input type="text" name="city" value="<?php echo $hotel['city']; ?>" required>
            </div>

            <div>
                <label for="location">Location:</label>
                <input type="text" name="location" value="<?php echo $hotel['location']; ?>" required>
            </div>

            <div>
                <label for="price">Price:</label>
                <input type="number" name="price" value="<?php echo $hotel['price']; ?>" required>
            </div>

            <div>
                <label for="available_rooms">Available Rooms:</label>
                <input type="number" name="available_rooms" value="<?php echo $hotel['available_rooms']; ?>" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea name="description" required><?php echo $hotel['description']; ?></textarea>
            </div>

            <div>
                <label for="room_type">Room Type:</label>
                <input type="text" name="room_type" value="<?php echo $hotel['room_type']; ?>">
            </div>

            <div>
                <label for="room_size">Room Size:</label>
                <input type="text" name="room_size" value="<?php echo $hotel['room_size']; ?>">
            </div>

            <div>
                <label for="popular_guests">Popular Guests:</label>
                <input type="text" name="popular_guests" value="<?php echo $hotel['popular_guests']; ?>">
            </div>

            <div>
                <label for="room_features">Room Features:</label>
                <input type="text" name="room_features" value="<?php echo $hotel['room_features']; ?>">
            </div>

            <div>
                <label for="beds_and_blanket">Beds and Blanket:</label>
                <input type="text" name="beds_and_blanket" value="<?php echo $hotel['beds_and_blanket']; ?>">
            </div>

            <div>
                <label for="facilities">Facilities:</label>
                <input type="text" name="facilities" value="<?php echo $hotel['facilities']; ?>">
            </div>

            <div>
                <label>Update Images (Max 4):</label>
                <input type="file" name="images[]" multiple>
            </div>

            <button type="submit" name="update_hotel">Update Hotel</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>