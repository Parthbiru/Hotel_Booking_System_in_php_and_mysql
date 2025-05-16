<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
$host = "localhost";
$dbname = "hotel_booking_system";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_room'])) {
    $location = $_POST['location'];
    $description = $_POST['description'];
    $room_name = $_POST['room_name'];
    $price = $_POST['price']; 
    $room_type = $_POST['room_type'];
    $room_size = $_POST['room_size'];
    $popular_guests = $_POST['popular_guests'];
    $room_features = $_POST['room_features'];
    $beds_and_blanket = $_POST['beds_and_blanket'];

    $photo = $_FILES['photo'];
    $photo_name = $photo['name'];
    $photo_tmp_name = $photo['tmp_name'];
    $photo_error = $photo['error'];

    if ($photo_error === 0) {
        $photo_ext = strtolower(pathinfo($photo_name, PATHINFO_EXTENSION));
        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($photo_ext, $allowed_exts)) {
            $new_photo_name = uniqid('', true) . '.' . $photo_ext;
            $upload_dir = 'uploads/';
            $upload_path = $upload_dir . $new_photo_name;
            
            if (move_uploaded_file($photo_tmp_name, $upload_path)) {
                $sql = "INSERT INTO rooms (location, description, room_name, price, room_type, room_size, popular_guests, room_features, beds_and_blanket, photo) 
                        VALUES ('$location', '$description', '$room_name', '$price', '$room_type', '$room_size', '$popular_guests', '$room_features', '$beds_and_blanket', '$new_photo_name')";
                
                if (mysqli_query($conn, $sql)) {
                    echo "Room added successfully!";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "Failed to upload the photo.";
            }
        } else {
            echo "Invalid file type. Only jpg, jpeg, png, and gif are allowed.";
        }
    } else {
        echo "There was an error uploading the photo.";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
    <a href="javascript:history.back()" class="back-button">
        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
    </a>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
       /* Global Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #003580;
    margin: 0;
    padding: 0;
}

.container {
    width: 70%;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #003580;
}

.form-section {
    margin-bottom: 15px;
}

label {
    font-size: 14px;
    color: #555;
    display: block;
    margin-bottom: 5px;
}

input[type="text"], input[type="file"], textarea, select {
    width: 100%;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
}

textarea {
    height: 100px;
}

input[type="submit"] {
    background-color: #003580;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #002a80;
}

.form-section select {
    height: 35px;
}

/*----------------------------*/
/* Back button styles */
.back-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}

.back-button:hover {
    background-color: #0056b3;
}

/*----------------------------*/
/* Mobile View (max-width 767px) */
@media (max-width: 767px) {
    body {
        font-size: 14px;
    }

    .container {
        width: 90%;
        margin: 20px auto;
    }

    h2 {
        font-size: 18px;
    }

    input[type="text"], input[type="file"], textarea, select, input[type="submit"] {
        font-size: 12px;
        padding: 10px;
    }

    .form-section {
        margin-bottom: 10px;
    }
}

/* Tablet View (768px to 1024px) */
@media (min-width: 768px) and (max-width: 1024px) {
    .container {
        width: 75%;
        margin: 30px auto;
    }

    h2 {
        font-size: 20px;
    }

    input[type="text"], input[type="file"], textarea, select, input[type="submit"] {
        font-size: 13px;
        padding: 12px;
    }

    .form-section {
        margin-bottom: 12px;
    }
}

/* Laptop View (1025px to 1280px) */
@media (min-width: 1025px) and (max-width: 1280px) {
    .container {
        width: 60%;
        margin: 40px auto;
    }

    h2 {
        font-size: 22px;
    }

    input[type="text"], input[type="file"], textarea, select, input[type="submit"] {
        font-size: 14px;
        padding: 14px;
    }

    .form-section {
        margin-bottom: 15px;
    }
}

/* Desktop View (1281px and above) */
@media (min-width: 1281px) {
    .container {
        width: 50%;
        margin: 50px auto;
    }

    h2 {
        font-size: 24px;
    }

    input[type="text"], input[type="file"], textarea, select, input[type="submit"] {
        font-size: 16px;
        padding: 16px;
    }

    .form-section {
        margin-bottom: 20px;
    }
}

    </style>
</head>
<body>
<?php include 'Admin_dashboard.php'; ?> 


<div class="container">
    <h2>Add Room</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-section">
            <label for="photo">Room Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>
        </div>

        <div class="form-section">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>
        </div>

        <div class="form-section">
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div class="form-section">
            <label for="room_name">Hotel Name:</label>
            <input type="text" id="room_name" name="room_name" required>
        </div>

        <div class="form-section">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required placeholder="Enter price">
        </div>

        <div class="form-section">
            <label for="room_type">Room Type:</label>
            <select id="room_type" name="room_type" required>
                <option value="Royal Suite">Royal Suite</option>
                <option value="Luxury Room">Luxury Room </option>
                <option value="Deluxe Room">Deluxe Room</option>
                <option value="Executive Suite">Executive Suite</option>

            </select>
        </div>

        <div class="form-section">
            <label for="room_size">Room Size (sq ft):</label>
            <input type="text" id="room_size" name="room_size" required>
        </div>

        <div class="form-section">
            <label for="popular_guests">Popular with Guests:</label>
            <input type="text" id="popular_guests" name="popular_guests" required>
        </div>

        <div class="form-section">
            <label for="room_features">Room Features:</label>
            <input type="text" id="room_features" name="room_features" required>
        </div>

        <div class="form-section">
            <label for="beds_and_blanket">Beds and Blanket:</label>
            <input type="text" id="beds_and_blanket" name="beds_and_blanket" required>
        </div>

        <div class="form-section">
            <input type="submit" name="add_room" value="Add Room">
        </div>
    </form>
</div>

</body>
</html>
