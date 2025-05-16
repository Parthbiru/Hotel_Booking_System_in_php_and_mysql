<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_booking_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_hotel'])) {
    $hotel_id = intval($_POST['hotel_id']);
    $name = $conn->real_escape_string($_POST['name']);
    $location = $conn->real_escape_string($_POST['location']);
    $price = floatval($_POST['price']);
    $description = $conn->real_escape_string($_POST['description']);

    if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
        $image_name = basename($_FILES['image']['name']);
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $upload_dir = "../Admin/uploads/";
        $target_file = $upload_dir . $image_name;

        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['image']['type'];
        if (!in_array($file_type, $allowed_types)) {
            echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
            exit;
        }

        $max_size = 2 * 1024 * 1024;
        if ($_FILES['image']['size'] > $max_size) {
            echo "File size exceeds the 2MB limit.";
            exit;
        }

        if (move_uploaded_file($image_tmp_name, $target_file)) {
            $sql = "UPDATE hotels SET name = ?, location = ?, price = ?, description = ?, image_path = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssdsdi", $name, $location, $price, $description, $image_name, $hotel_id);
            $stmt->execute();
        } else {
            echo "Error uploading the image.";
            exit;
        }
    } else {
        $sql = "UPDATE hotels SET name = ?, location = ?, price = ?, description = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsd", $name, $location, $price, $description, $hotel_id);
        $stmt->execute();
    }

    if ($stmt->affected_rows > 0) {
        echo "Hotel details updated successfully!";
    } else {
        echo "Error updating hotel.";
    }
}

if (isset($_GET['delete_hotel'])) {
    $hotel_id = intval($_GET['delete_hotel']);
    $sql = "DELETE FROM hotels WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $hotel_id);
    if ($stmt->execute()) {
        echo "Hotel deleted successfully!";
    } else {
        echo "Error deleting hotel: " . $conn->error;
    }
}

$sql = "SELECT * FROM hotels";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Update Hotels</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .hotel {
            background-color: #fff;
            margin: 20px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .hotel img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
        .hotel form {
            margin-top: 20px;
        }
        .hotel form input, .hotel form textarea {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .hotel form button {
            background-color: #002a80;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 9px;
            cursor: pointer;
        }
        .delete-button {
            background-color: #d9534f;
            color: #fff;
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Admin Panel - Update Hotels</h2>

    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="hotel">
                <img src="../Admin/uploads/<?php echo $row['image_path']; ?>" alt="Hotel Image">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="hotel_id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                    <input type="text" name="location" value="<?php echo $row['location']; ?>" required>
                    <input type="number" name="price" value="<?php echo $row['price']; ?>" required>
                    <textarea name="description" rows="3" required><?php echo $row['description']; ?></textarea>
                    <label>Update Image:</label>
                    <input type="file" name="image">
                    <button type="submit" name="update_hotel">Update</button>
                </form>
                <form method="GET" onsubmit="return confirm('Are you sure you want to delete this hotel?')">
                    <input type="hidden" name="delete_hotel" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="delete-button">Delete</button>
                </form>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No hotels found.</p>
    <?php endif; ?>

    <?php $conn->close(); ?>
</body>
</html>
