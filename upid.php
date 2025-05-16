<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>
            alert('You need to be logged in to access this page!');
            window.location.href = '../form/Login.php';  // Replace with the correct path to your login page
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

$confirmationMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotel_id = $_POST['hotel_id'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $upi_id = $_POST['upi_id'];  // Get UPI ID from form

    $sql = "INSERT INTO hotels_bookings (user_name, user_email, user_phone, hotel_id, room_type, total_price, checkin_date, checkout_date, card_number, expiry_date, cvv, upi_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing the SQL query: " . $conn->error);
    }

    $stmt->bind_param("sssssdssssss", $name, $email, $phone, $hotel_id, $room_type, $price, $checkin, $checkout, $card_number, $expiry_date, $cvv, $upi_id);

    if ($stmt->execute()) {
        $confirmationMessage = "<p>Booking confirmed! Your booking has been successfully placed.</p>";

        $stmt = $conn->prepare("UPDATE hotels SET available_rooms = available_rooms - 1 WHERE id = ?");
        $stmt->bind_param("i", $hotel_id);

        if ($stmt->execute()) {
            $confirmationMessage .= "<p>Hotel room availability updated successfully.</p>";
        } else {
            $confirmationMessage .= "<p>Error updating room availability.</p>";
        }

        $stmt->close();
    } else {
        $confirmationMessage = "<p>Error confirming your booking. Please try again later.</p>";
    }
}

$hotel_id = isset($_GET['hotel_id']) ? $_GET['hotel_id'] : '';
$room_type = isset($_GET['room_type']) ? $_GET['room_type'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$checkin = isset($_GET['checkin']) ? $_GET['checkin'] : '';
$checkout = isset($_GET['checkout']) ? $_GET['checkout'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <?php include '../../include/home Navbar/navbar.php'; ?>
    
    <style>
        /* Add your styles here */
    </style>
</head>
<body>

    <?php if (!empty($confirmationMessage)): ?>
        <div class="confirmation-message">
            <?php echo $confirmationMessage; ?>
        </div>
    <?php endif; ?>

    <div class="booking-container">
        <div class="heading">Confirm Your Booking</div>

        <div class="booking-info">
            <p><strong>Hotel ID:</strong> <?php echo htmlspecialchars($hotel_id); ?></p>
            <p><strong>Room Type:</strong> <?php echo htmlspecialchars($room_type); ?></p>
            <p><strong>Total Price:</strong> ₹<?php echo htmlspecialchars($price); ?></p>
            <p><strong>Check-in Date:</strong> <?php echo htmlspecialchars($checkin); ?></p>
            <p><strong>Check-out Date:</strong> <?php echo htmlspecialchars($checkout); ?></p>
        </div>

        <form action="Hotel_booking.php" method="post">
            <input type="hidden" name="hotel_id" value="<?php echo htmlspecialchars($hotel_id); ?>">
            <input type="hidden" name="room_type" value="<?php echo htmlspecialchars($room_type); ?>">
            <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">
            <input type="hidden" name="checkin" value="<?php echo htmlspecialchars($checkin); ?>">
            <input type="hidden" name="checkout" value="<?php echo htmlspecialchars($checkout); ?>">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <h5>Credit/Debit Card Payment Option</h5>
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" required pattern="\d{16}" title="Card number should be 16 digits.">

            <label for="expiry_date">Expiry Date (MM/YY):</label>
            <input type="text" id="expiry_date" name="expiry_date" required pattern="\d{2}/\d{2}" title="Expiry date format should be MM/YY.">

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required pattern="\d{3}" title="CVV should be 3 digits.">

            <label for="upi_id">Enter Your UPI ID:</label>
            <input type="text" id="upi_id" name="upi_id" required>

            <input type="submit" value="Confirm Booking">

            <!-- Generate the UPI payment link and redirect -->
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $upi_id = $_POST['upi_id'];
                $amount = $price;  // Use the booking price

                // UPI link (replace the required fields with dynamic values)
                $upi_link = "upi://pay?pa={$upi_id}&pn=HotelBooking&tid=" . uniqid() . "&tr=" . uniqid() . "&tn=Booking%20Payment&am={$amount}&cu=INR";
            ?>
            <input type="button" value="Pay with Google Pay" onclick="window.location.href='<?php echo $upi_link; ?>'">
            <?php } ?>
        </form>
    </div>

</body>
<?php include '../../include/home Navbar/Footer.php'; ?>

</html>
When the user clicks the payment button, the link redirects them to the UPI app.



next code 

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'>
            alert('You need to be logged in to access this page!');
            window.location.href = '../form/Login.php';  // Replace with the correct path to your login page
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

$confirmationMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotel_id = $_POST['hotel_id'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $upi_id = $_POST['upi_id'];  // Get UPI ID from the form

    $sql = "INSERT INTO hotels_bookings (user_name, user_email, user_phone, hotel_id, room_type, total_price, checkin_date, checkout_date, card_number, expiry_date, cvv, upi_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing the SQL query: " . $conn->error);
    }

    $stmt->bind_param("sssssdssssss", $name, $email, $phone, $hotel_id, $room_type, $price, $checkin, $checkout, $card_number, $expiry_date, $cvv, $upi_id);

    if ($stmt->execute()) {
        $confirmationMessage = "<p>Booking confirmed! Your booking has been successfully placed.</p>";

        $stmt = $conn->prepare("UPDATE hotels SET available_rooms = available_rooms - 1 WHERE id = ?");
        $stmt->bind_param("i", $hotel_id);

        if ($stmt->execute()) {
            $confirmationMessage .= "<p>Hotel room availability updated successfully.</p>";
        } else {
            $confirmationMessage .= "<p>Error updating room availability.</p>";
        }

        $stmt->close();
    } else {
        $confirmationMessage = "<p>Error confirming your booking. Please try again later.</p>";
    }
}

$hotel_id = isset($_GET['hotel_id']) ? $_GET['hotel_id'] : '';
$room_type = isset($_GET['room_type']) ? $_GET['room_type'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$checkin = isset($_GET['checkin']) ? $_GET['checkin'] : '';
$checkout = isset($_GET['checkout']) ? $_GET['checkout'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <?php include '../../include/home Navbar/navbar.php'; ?>

    <style>
        /* Add your styles here */
    </style>
</head>
<body>

    <?php if (!empty($confirmationMessage)): ?>
        <div class="confirmation-message">
            <?php echo $confirmationMessage; ?>
        </div>
    <?php endif; ?>

    <div class="booking-container">
        <div class="heading">Confirm Your Booking</div>

        <div class="booking-info">
            <p><strong>Hotel ID:</strong> <?php echo htmlspecialchars($hotel_id); ?></p>
            <p><strong>Room Type:</strong> <?php echo htmlspecialchars($room_type); ?></p>
            <p><strong>Total Price:</strong> ₹<?php echo htmlspecialchars($price); ?></p>
            <p><strong>Check-in Date:</strong> <?php echo htmlspecialchars($checkin); ?></p>
            <p><strong>Check-out Date:</strong> <?php echo htmlspecialchars($checkout); ?></p>
        </div>

        <form action="Hotel_booking.php" method="post">
            <input type="hidden" name="hotel_id" value="<?php echo htmlspecialchars($hotel_id); ?>">
            <input type="hidden" name="room_type" value="<?php echo htmlspecialchars($room_type); ?>">
            <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">
            <input type="hidden" name="checkin" value="<?php echo htmlspecialchars($checkin); ?>">
            <input type="hidden" name="checkout" value="<?php echo htmlspecialchars($checkout); ?>">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>

            <h5>Credit/Debit Card Payment Option</h5>
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" required pattern="\d{16}" title="Card number should be 16 digits.">

            <label for="expiry_date">Expiry Date (MM/YY):</label>
            <input type="text" id="expiry_date" name="expiry_date" required pattern="\d{2}/\d{2}" title="Expiry date format should be MM/YY.">

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required pattern="\d{3}" title="CVV should be 3 digits.">

            <label for="upi_id">Enter Your UPI ID:</label>
            <input type="text" id="upi_id" name="upi_id" required>

            <input type="submit" value="Confirm Booking">

            <!-- Generate the UPI payment link and redirect -->
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $upi_id = $_POST['upi_id'];
                $amount = $price;  // Use the booking price

                // Generate UPI link
                $upi_link = "upi://pay?pa={$upi_id}&pn=HotelBooking&tid=" . uniqid() . "&tr=" . uniqid() . "&tn=Booking%20Payment&am={$amount}&cu=INR";

                // Redirect to UPI app
                echo "<a href='{$upi_link}' target='_blank'><input type='button' value='Pay with Google Pay'></a>";
            }
            ?>
        </form>
    </div>

</body>
<?php include '../../include/home Navbar/Footer.php'; ?>

</html>
