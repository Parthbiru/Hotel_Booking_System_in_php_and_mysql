<?php
session_start();  

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>
            alert('You need to be logged in to access this page!');
            window.location.href = '../form/Login.php'; 
          </script>";
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

$priceMap = array(
    "Goa" => array("Basic" => 4500, "Standard" => 6000, "Premium" => 9000),
    "Ooty" => array("Basic" => 5000, "Standard" => 7000, "Premium" => 10000),
    "Mumbai" => array("Basic" => 5500, "Standard" => 7500, "Premium" => 11000),
    "New Delhi" => array("Basic" => 6000, "Standard" => 8000, "Premium" => 12000),
    "Bangalore" => array("Basic" => 5000, "Standard" => 7000, "Premium" => 10000),
    "Munnar" => array("Basic" => 5500, "Standard" => 7500, "Premium" => 11000),
    "Rishikesh" => array("Basic" => 4500, "Standard" => 6500, "Premium" => 9500),
    "North Goa" => array("Basic" => 5000, "Standard" => 7000, "Premium" => 10000),
    "Manali" => array("Basic" => 6000, "Standard" => 8000, "Premium" => 12000),
    "Agra" => array("Basic" => 5000, "Standard" => 7000, "Premium" => 10000),
    "Amritsar" => array("Basic" => 4500, "Standard" => 6000, "Premium" => 9000)
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = isset($_POST['destination']) ? $_POST['destination'] : '';
    $packageTier = isset($_POST['packageTier']) ? $_POST['packageTier'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $travelers = isset($_POST['travelers']) ? (int)$_POST['travelers'] : 0;
    $arrivalDate = isset($_POST['arrivalDate']) ? $_POST['arrivalDate'] : '';
    $arrivalTime = isset($_POST['arrivalTime']) ? $_POST['arrivalTime'] : '';
    $requests = isset($_POST['requests']) ? $_POST['requests'] : '';

    if (empty($destination) || empty($packageTier) || empty($name) || empty($email) || empty($phone) || $travelers < 1 || empty($arrivalDate) || empty($arrivalTime)) {
        $_SESSION['confirmationMessage'] = '<div class="confirmation-message" style="color: red;">Please fill in all required fields.</div>';
    } elseif (!isset($priceMap[$destination]) || !isset($priceMap[$destination][$packageTier])) {
        $_SESSION['confirmationMessage'] = '<div class="confirmation-message" style="color: red;">Invalid destination or package tier.</div>';
    } else {
        // Calculate total price
        $pricePerPerson = $priceMap[$destination][$packageTier];
        $totalPrice = $pricePerPerson * $travelers;

        // Determine package start date
        $arrivalDateTime = new DateTime("$arrivalDate $arrivalTime");
        $cutoffTime = new DateTime("$arrivalDate 08:00:00");
        $packageStartDate = $arrivalDateTime < $cutoffTime ? $arrivalDateTime : $arrivalDateTime->modify('+1 day');
        $formattedStartDate = $packageStartDate->format('F j, Y');

        
        $sql = "INSERT INTO tour_bookings (destination, package_tier, full_name, email, phone, travelers, arrival_date, arrival_time, special_requests, total_price) 
                VALUES ('$destination', '$packageTier', '$name', '$email', '$phone', $travelers, '$arrivalDate', '$arrivalTime', '$requests', $totalPrice)";

        if ($conn->query($sql) === TRUE) {
            // Set success message in session
            $_SESSION['confirmationMessage'] = "<div class='confirmation-message'>Thank you! Your booking for $destination ($packageTier) has been submitted successfully.<br>Your package will start from $formattedStartDate. Total Price: ₹$totalPrice</div>";

            
            header("Location: " . $_SERVER['PHP_SELF']);
            exit; 
        } else {
            $_SESSION['confirmationMessage'] = "<div class='confirmation-message' style='color: red;'>Error: " . $conn->error . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Now - Tour Package</title>
    <?php include '../../include/home Navbar/navbar.php'; ?> 

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #004494;
        }

        .confirmation-message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: green;
        }

        .price-display {
            text-align: center;
            font-size: 18px;
            margin: 15px 0;
            color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
    // Display confirmation message at the top of the page
    if (isset($_SESSION['confirmationMessage'])) {
        echo $_SESSION['confirmationMessage'];
        unset($_SESSION['confirmationMessage']); // Unset after displaying
    }
    ?>

    <div class="container">
        <h1>Book Your Tour Package</h1>
        <form id="bookingForm" method="POST" action="">
            <div class="form-group">
                <label for="destination">Destination:</label>
                <select id="destination" name="destination" required>
                    <option value="">Select Destination</option>
                    <?php foreach (array_keys($priceMap) as $dest): ?>
                        <option value="<?php echo $dest; ?>" <?php echo (isset($_POST['destination']) && $_POST['destination'] == $dest) ? 'selected' : ''; ?>><?php echo $dest; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="packageTier">Package Tier:</label>
                <select id="packageTier" name="packageTier" required>
                    <option value="">Select Package Tier</option>
                    <option value="Basic" <?php echo (isset($_POST['packageTier']) && $_POST['packageTier'] == 'Basic') ? 'selected' : ''; ?>>Basic</option>
                    <option value="Standard" <?php echo (isset($_POST['packageTier']) && $_POST['packageTier'] == 'Standard') ? 'selected' : ''; ?>>Standard</option>
                    <option value="Premium" <?php echo (isset($_POST['packageTier']) && $_POST['packageTier'] == 'Premium') ? 'selected' : ''; ?>>Premium</option>
                </select>
            </div>

            <div id="priceDisplay" class="price-display">
                Price: <span id="packagePrice">₹0</span>
            </div>

            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo htmlspecialchars(isset($_POST['name']) ? $_POST['name'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo htmlspecialchars(isset($_POST['email']) ? $_POST['email'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" value="<?php echo htmlspecialchars(isset($_POST['phone']) ? $_POST['phone'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="travelers">Number of Travelers:</label>
                <input type="number" id="travelers" name="travelers" min="1" placeholder="Enter number of travelers" value="<?php echo htmlspecialchars(isset($_POST['travelers']) ? $_POST['travelers'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="arrivalDate">Arrival Date:</label>
                <input type="date" id="arrivalDate" name="arrivalDate" min="<?php echo date('Y-m-d'); ?>" value="<?php echo htmlspecialchars(isset($_POST['arrivalDate']) ? $_POST['arrivalDate'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="arrivalTime">Arrival Time:</label>
                <input type="time" id="arrivalTime" name="arrivalTime" value="<?php echo htmlspecialchars(isset($_POST['arrivalTime']) ? $_POST['arrivalTime'] : ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="requests">Special Requests:</label>
                <textarea id="requests" name="requests" placeholder="Any special requests?"><?php echo htmlspecialchars(isset($_POST['requests']) ? $_POST['requests'] : ''); ?></textarea>
            </div>

            <button type="submit" class="btn">Book Now</button>
        </form>
    </div>

    <script>
        var priceMap = <?php echo json_encode($priceMap); ?>;
        var destinationSelect = document.getElementById("destination");
        var packageTierSelect = document.getElementById("packageTier");
        var priceDisplay = document.getElementById("packagePrice");

        function updatePrice() {
            var destination = destinationSelect.value;
            var packageTier = packageTierSelect.value;

            if (destination && packageTier && priceMap[destination] && priceMap[destination][packageTier]) {
                var price = priceMap[destination][packageTier];
                priceDisplay.textContent = "₹" + price;
            } else {
                priceDisplay.textContent = "₹0";
            }
        }

        destinationSelect.addEventListener("change", updatePrice);
        packageTierSelect.addEventListener("change", updatePrice);

        updatePrice();
    </script>
</body>
<?php include '../../include/home Navbar/Footer.php'; ?>

</html>
