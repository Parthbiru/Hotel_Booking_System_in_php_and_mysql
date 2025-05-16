<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        /* Style the form container */
        
form {
    text-align: center;

    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    font-family: Arial, sans-serif;
}

/* Style the heading */
h2 {
    
    text-align: center;
    font-size: 1.8em;
    color: #333;
    margin-bottom: 20px;
}

/* Style the label */
form label {
    display: block;
    margin-bottom: 20px;
    font-size: 1.5em;
    color: #555;
}

/* Style the input field */
form input[type="email"] {
    width: 100%;
    padding: 15px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 20px;
    box-sizing: border-box;
}

/* Style the button */
form button {
    width: 100%;
    padding: 10px;
    background-color: #0056b3;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Button hover effect */
form button:hover {
    background-color:  #0056b3;
}

/* Add spacing and alignment */
form input[type="email"], form button {
    margin-top: 10px;
}

/* Responsive design for mobile devices */
@media screen and (max-width: 480px) {
    form {
        width: 90%;
    }
}

        </style>
</head>
<?php include '../../include/home Navbar/navbar.php'; ?>

<body>
    <br>
    <br>
    <h2>Reset Your Password</h2>
    <form action="forget password.php" method="POST">
        <label for="email">Enter your email address to reset your password:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" name="send-reset-link">Send Reset Link</button>
    </form>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";  
    $username = "root";         
    $password = "";             
    $dbname = "hotel_booking_system";       

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    function sendMail($email, $reset_token) {
        require '../../include/pHpmailer/PHPMailer.php';
        require '../../include/pHpmailer/SMTP.php';
        require '../../include/pHpmailer/Exception.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = ''; // Replace with your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Recipients
            $mail->setFrom('22702anmolsinghbhatiya@gmail.com', 'Bhatiya Groups');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password reset link for Bhatiya Hotel';
            $mail->Body = "We received a request to reset your password!<br>
                           Click the link below:<br>
                           <a href='http://localhost/dynamic website/include/form/updatepassword.php?email=$email&reset_token=$reset_token'>
                           Reset password </a>";
            $mail->AltBody = 'Reset link: http://localhost/dynamic website/include/form/updatepassword.php?email=$email&reset_token=$reset_token';

            $mail->SMTPDebug = 3; 
            $mail->Debugoutput = 'html';

            $mail->send();
            return true;
        } catch (Exception $e) {
            return "Mailer Error: " . $mail->ErrorInfo;
        }
    }

    if (isset($_POST['send-reset-link'])) {
        $email = $_POST['email'];

        $stmt = $conn->prepare("SELECT * FROM register_user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            if ($result->num_rows == 1) {
                if (function_exists('random_bytes')) {
                    $reset_token = bin2hex(random_bytes(16));
                } else {
                    $reset_token = bin2hex(openssl_random_pseudo_bytes(16));
                }

                date_default_timezone_set('Asia/Kolkata');
                $date = date("Y-m-d");

                $stmt = $conn->prepare("UPDATE register_user SET resettoken = ?, resettokenexprice = ? WHERE email = ?");
                $stmt->bind_param("sss", $reset_token, $date, $email);

                if ($stmt->execute()) {
                    $mailResult = sendMail($email, $reset_token);
                    if ($mailResult === true) {
                        echo "
                        <script>
                            alert('Password reset link sent to your email.');
                            window.location.href = 'forget password.php';
                        </script>";
                    } else {
                        echo "
                        <script>
                            alert('Error sending email: " . addslashes($mailResult) . "');
                            window.location.href = 'forget password.php';
                        </script>";
                    }
                } else {
                    echo "
                    <script>
                        alert('Error updating token: " . $conn->error . "');
                        window.location.href = 'forget password.php';
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Invalid email entered.');
                    window.location.href = 'forget password.php';
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Cannot run database query: " . $conn->error . "');
                window.location.href = 'forget password.php';
            </script>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>

</body>
<?php include '../../include/home Navbar/Footer.php'; ?>

</html>