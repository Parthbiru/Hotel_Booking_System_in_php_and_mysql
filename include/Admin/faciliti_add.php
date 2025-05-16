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

$id = "";
$name = "";
$description = "";
$icon_svg = "";
$update = false;

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $icon_svg = $_POST['icon_svg'];

    $query = "INSERT INTO Hotel_facilities (name, description, icon_svg) VALUES ('$name', '$description', '$icon_svg')";
    mysqli_query($conn, $query);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = mysqli_query($conn, "SELECT * FROM Hotel_facilities WHERE id=$id");
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $description = $row['description'];
        $icon_svg = $row['icon_svg'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $icon_svg = $_POST['icon_svg'];

    $query = "UPDATE Hotel_facilities SET name='$name', description='$description', icon_svg='$icon_svg' WHERE id=$id";
    mysqli_query($conn, $query);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM Hotel_facilities WHERE id=$id");
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

if (isset($_GET['details'])) {
    $id = $_GET['details'];
    $result = mysqli_query($conn, "SELECT * FROM Hotel_facilities WHERE id=$id");
    $row = $result->fetch_assoc();
    echo "<h2>Facility Details</h2>";
    echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
    echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
    echo "<p><strong>Icon:</strong> " . htmlspecialchars_decode($row['icon_svg']) . "</p>";
    echo "<a href='" . $_SERVER['PHP_SELF'] . "'>Back</a>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Facilities</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            background: white;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background:  #002a80;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background: #218838;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #002a80;
            color: white;
        }
        tr:hover {
            background: #f1f1f1;
        }
        .actions a {
            padding: 5px 10px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            margin: 2px;
        }
        .edit {
            background: #ffc107;
        }
        .details {
            background: #17a2b8;
        }
        .delete {
            background: #dc3545;
        }
    </style>
</head>
<body>
    
    <h2><?php echo $update ? "Edit Facility" : "Add New Facility"; ?></h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Facility Name" required><br>
        <textarea name="description" placeholder="Description" required><?php echo $description; ?></textarea><br>
        <textarea name="icon_svg" placeholder="SVG Icon Code" required><?php echo $icon_svg; ?></textarea><br>
        <button type="submit" name="<?php echo $update ? 'update' : 'add'; ?>"><?php echo $update ? 'Update' : 'Add'; ?></button>
    </form>

    <h2>Facilities List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM Hotel_facilities");
        while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td class="actions">
                <a href="?edit=<?php echo $row['id']; ?>" class="edit">Edit</a>
                <a href="?details=<?php echo $row['id']; ?>" class="details">Details</a>
                <a href="?delete=<?php echo $row['id']; ?>" class="delete" onclick="return confirm('Are you sure you want to delete this facility?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
