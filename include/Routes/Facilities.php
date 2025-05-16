<?php
session_start(); // Start session
?>

<?php
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "hotel_booking_system";       

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, description, icon_svg FROM Hotel_facilities";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php include '../../include/home Navbar/navbar.php'; ?>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f8f8;
}

.title {
    font-size: 27px;
    margin-top: 35px;
    margin-bottom: 35px;
    font-weight: bold;
    text-align: center;

    
}

.facilities-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}

.facility-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 18px;
    width: 210px;
    text-align: center;
    transition: 0.3s;
    border-top: 4px solid #000; 
}

.facility-card:hover {
    transform: translateY(-8px);
}

.facility-card:first-child {
    border-top: 4px solid green;
}

.facility-icon {
    font-size: 20px;
    margin-bottom: 10px;
}

.facility-title {
    font-size: 18px;
    font-weight: bold;
    margin: 10px 0;
}

.facility-description {
    font-size: 14px;
    color: #555;
}

    </style>
<body>

<h2 class="title">Our Facilities</h2>

<div class="facilities-container">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="facility-card">
            <div class="facility-icon"><?php echo $row['icon_svg']; ?></div> 
            <h3 class="facility-title"><?php echo htmlspecialchars($row['name']); ?></h3>
            <p class="facility-description"><?php echo htmlspecialchars($row['description']); ?></p>
        </div>
    <?php } ?>
</div>


</body>
<?php include '../../include/home Navbar/Footer.php'; ?>

</html>
