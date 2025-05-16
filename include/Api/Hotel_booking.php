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

    $stmt = $conn->prepare("INSERT INTO hotels_bookings (user_name, user_email, user_phone, hotel_id, room_type, total_price, checkin_date, checkout_date, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssdsssss", $name, $email, $phone, $hotel_id, $room_type, $price, $checkin, $checkout, $card_number, $expiry_date, $cvv);

    if ($stmt->execute()) {
        $confirmationMessage = "<p>Booking confirmed! Your booking has been successfully Book!.</p>";

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
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    
    
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    flex-direction: column;
}

.confirmation-message {
    width: 100%;
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    text-align: center;
    border: 1px solid #c3e6cb;
    margin-bottom: 20px;
}

.booking-container {
    padding-top: 50px;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 500px;
    margin: 20px auto; 
}

.heading {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

.booking-info p {
    margin: 10px 0;
    font-size: 16px;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #002a80;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

h5 {
    font-size: 16px;
    margin-top: 20px;
}

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

        <form action="Hotel_booking.php" method="post" id="bookingForm">
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

    <h5>Credit/Debit Card Payment Option(DAMO)</h5>
    

    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number" required 
           pattern="^\d{16}$" title="Card number must be exactly 16 digits." 
           maxlength="16" oninput="validateCardNumber()">

    
    <label for="expiry_date">Expiry Date (MM/YY):</label>
    <input type="text" id="expiry_date" name="expiry_date" required 
           pattern="^(0[1-9]|1[0-2])\/([0-9]{2})$" 
           title="Expiry date must be in the format MM/YY (e.g., 12/25)." 
           maxlength="5" oninput="validateExpiryDate()">

    
    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required 
           pattern="^\d{3}$" title="CVV must be exactly 3 digits."
           maxlength="3" oninput="validateCVV()">

    <input type="submit" value="Confirm Booking">
</form>


    </div>
    <script>
    function validateCardNumber() {
        const cardNumber = document.getElementById('card_number');
        const pattern = /^\d{16}$/;
        
        if (!pattern.test(cardNumber.value)) {
            cardNumber.setCustomValidity("Card number must be exactly 16 digits.");
        } else {
            cardNumber.setCustomValidity("");
        }
    }

    function validateExpiryDate() {
        const expiryDate = document.getElementById('expiry_date');
        const pattern = /^(0[1-9]|1[0-2])\/([0-9]{2})$/;
        
        if (!pattern.test(expiryDate.value)) {
            expiryDate.setCustomValidity("Expiry date must be in the format MM/YY (e.g., 12/25).");
        } else {
            expiryDate.setCustomValidity("");
        }
    }


    function validateCVV() {
        const cvv = document.getElementById('cvv');
        const pattern = /^\d{3}$/;
        
        if (!pattern.test(cvv.value)) {
            cvv.setCustomValidity("CVV must be exactly 3 digits.");
        } else {
            cvv.setCustomValidity("");
        }
    }
</script>

</body>
<?php include '../../include/home Navbar/Footer.php'; ?>

</html>
