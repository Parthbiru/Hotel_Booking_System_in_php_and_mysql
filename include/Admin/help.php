<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Need Help Queries</title>
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

.header {
    background-color: #003580;
    color: white;
    padding: 20px;
    text-align: center;
}

.header h1 {
    margin: 0;
    font-size: 2.5rem;
}

.header p {
    font-size: 1.1rem;
    margin: 10px 0;
}

.container {
    width: 80%;
    margin: 30px auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.admin-dashboard {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.admin-dashboard th,
.admin-dashboard td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

.admin-dashboard th {
    background-color: #003580;
    color: white;
}

.admin-dashboard tr:nth-child(even) {
    background-color: #f9f9f9;
}

.admin-dashboard tr:hover {
    background-color: #f1f1f1;
}

p {
    font-size: 1.1rem;
    text-align: center;
    color: #666;
}

@media (max-width: 768px) {
    .container {
        width: 90%;
        padding: 15px;
    }

    .header h1 {
        font-size: 2rem;
    }

    .header p {
        font-size: 1rem;
    }

    .admin-dashboard th, .admin-dashboard td {
        padding: 8px;
    }
}


    </style>
</head>
<body>
    <header class="header">
        <h1>Admin Dashboard</h1>
        <p>Manage user queries and feedback</p>
    </header>

    <main class="container">
        <h2>All Submitted Queries</h2>

    </main>
    <?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "hotel_booking_system";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, email, message, submitted_at FROM need_help";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='admin-dashboard'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Submitted At</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . nl2br($row["message"]) . "</td>";  
        echo "<td>" . $row["submitted_at"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No queries found.</p>";
}

mysqli_close($conn);
?>


</body>
</html>
