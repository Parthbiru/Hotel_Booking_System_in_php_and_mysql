<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Need Help - Bhatiya Hotel</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .header {
            background-color: #003580;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
            color: #ffc107;
        }

        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .faq {
            margin-bottom: 30px;
        }

        .faq h2 {
            color: #003580;
            font-size: 20px;
        }

        .faq p {
            font-size: 16px;
            line-height: 1.6;
        }

        .contact {
            margin-bottom: 30px;
        }

        .contact h2 {
            color: #003580;
            font-size: 20px;
        }

        .contact p {
            font-size: 16px;
        }

        .contact a {
            color: #003580;
            text-decoration: none;
        }

        .contact a:hover {
            text-decoration: underline;
        }

        .form-section {
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
        }

        .form-section h2 {
            color: #003580;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .form-section form label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #003580;
        }

        .form-section form input,
        .form-section form textarea,
        .form-section form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-section form button {
            background-color: #003580;
            color: white;
            cursor: pointer;
            border: none;
        }

        .form-section form button:hover {
            background-color: #002a80;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Need Help?</h1>
        <p>We're here to assist you with your queries!</p>
    </header>

    <main class="container">
        <section class="faq">
            <h2>Frequently Asked Questions</h2>
            <p><strong>Q1: How do I book a room?</strong><br>
                A: Navigate to the home page, use the search section to find available rooms, and complete the booking process.</p>
            <p><strong>Q2: Can I cancel or modify my booking?</strong><br>
                A: Yes, you can manage your bookings in the "My Bookings" section after signing in.</p>
            <p><strong>Q3: How do I contact customer support?</strong><br>
                A: You can reach us via the contact details listed below or use the query form provided.</p>
        </section>

        <section class="contact">
            <h2>Contact Us</h2>
            <p><strong>Email:</strong> <a href="mailto:support@bhatiyahotel.com">support@bhatiyahotel.com</a></p>
            <p><strong>Phone:</strong> +91-1234567890</p>
            <p><strong>Address:</strong> Bhatiya Hotel, Main Street, Valsad, Gujarat, India</p>
        </section>

        <section class="form-section">
            <h2>Submit Your Query</h2>
            <form action="" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" placeholder="Your Query" required></textarea>

                <button type="submit">Submit</button>
            </form>
        </section>
    </main>
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

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    $sql = "INSERT INTO need_help (name, email, message, submitted_at) 
            VALUES ('$name', '$email', '$message', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Thank you for your query! We will get back to you shortly.');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


</body>

</html>
