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
    <title>Search User by Phone Number</title>
    <link rel="stylesheet" href="styles.css"> <!-- Optional for styling -->
    <style>
        /* Global styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        /* Container to center content */
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 20px;
        }

        /* Header styles */
        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            color: #0056b3;
            font-weight: 600;
        }

        /* Form styles */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Input and label styling */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="tel"] {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="tel"]:focus {
            border-color: #0056b3;
            outline: none;
        }

        button[type="submit"] {
            padding: 14px;
            background-color: #0056b3;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"]:hover {
            background-color: #00408d;
        }

        /* User details styling */
        .user-details {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .user-details h3 {
            font-size: 22px;
            color: #0056b3;
            margin-bottom: 15px;
        }

        .user-details p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .user-details strong {
            color: #0056b3;
        }

        /* Error message styling */
        p.no-result {
            color: #d9534f;
            font-weight: bold;
            text-align: center;
            font-size: 18px;
        }

        /* Optional table for User Details */
        .details-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .details-table th,
        .details-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .details-table th {
            background-color: #0056b3;
            color: white;
        }

        .details-table td {
            background-color: #f9f9f9;
        }

        .details-table tr:hover {
            background-color: #f1f1f1;
        }

        /* Download button styling */
        .download-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color:#002a80;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .download-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Search User by Phone Number</h2>
        <form method="POST" action="search_tour_bookings.php">
            <div class="form-group">
                <label for="searchPhone">Phone Number:</label>
                <input type="tel" id="searchPhone" name="searchPhone" placeholder="Enter phone number to search" required>
            </div>
            <button type="submit" class="btn">Search</button>
        </form>

        <?php

        $servername = "localhost";  
        $username = "root";         
        $password = "";             
        $dbname = "hotel_booking_system";       
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $searchPhone = $_POST['searchPhone'];

            $searchPhone = mysqli_real_escape_string($conn, trim($searchPhone));


            $query = "SELECT `id`, `destination`, `package_tier`, `full_name`, `email`, `phone`, `travelers`, `arrival_date`, `arrival_time`, `special_requests`, `total_price`, `booking_date` FROM `tour_bookings` WHERE phone = '$searchPhone'"; // Updated query
            
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);

                echo "<div class='user-details'>";
                echo "<h3>User Details:</h3>";

                echo "<p><strong>Name:</strong> " . (isset($user['full_name']) ? htmlspecialchars($user['full_name']) : 'N/A') . "</p>";
                echo "<p><strong>Email:</strong> " . (isset($user['email']) ? htmlspecialchars($user['email']) : 'N/A') . "</p>";
                echo "<p><strong>Phone:</strong> " . (isset($user['phone']) ? htmlspecialchars($user['phone']) : 'N/A') . "</p>";
                echo "<p><strong>Destination:</strong> " . (isset($user['destination']) ? htmlspecialchars($user['destination']) : 'N/A') . "</p>";
                echo "<p><strong>Package Tier:</strong> " . (isset($user['package_tier']) ? htmlspecialchars($user['package_tier']) : 'N/A') . "</p>";
                echo "<p><strong>Number of Travelers:</strong> " . (isset($user['travelers']) ? htmlspecialchars($user['travelers']) : 'N/A') . "</p>";
                echo "<p><strong>Arrival Date:</strong> " . (isset($user['arrival_date']) ? htmlspecialchars($user['arrival_date']) : 'N/A') . "</p>";
                echo "<p><strong>Arrival Time:</strong> " . (isset($user['arrival_time']) ? htmlspecialchars($user['arrival_time']) : 'N/A') . "</p>";
                echo "<p><strong>Special Requests:</strong> " . (isset($user['special_requests']) ? htmlspecialchars($user['special_requests']) : 'N/A') . "</p>";
                echo "<p><strong>Total Price:</strong> ₹" . (isset($user['total_price']) ? htmlspecialchars($user['total_price']) : 'N/A') . "</p>";
                echo "<p><strong>Booking Date:</strong> " . (isset($user['booking_date']) ? htmlspecialchars($user['booking_date']) : 'N/A') . "</p>";
                echo "</div>";

                echo "<button class='download-btn' onclick='downloadCSV()'>Download Booking Details</button>";
            } else {
                echo "<p class='no-result'>No user found with that phone number.</p>";
            }
        }
        ?>
    </div>

    <script>
        function downloadCSV() {
            const userDetails = document.querySelector('.user-details').innerText;

            // Convert the details to CSV format
            const csvContent = "data:text/csv;charset=utf-8," + userDetails.replace(/\n/g, ',').replace(/<strong>/g, '').replace(/<\/strong>/g, '');

            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "booking_details.csv");
            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);
        }
    </script>
</body>
</html>