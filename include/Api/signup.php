<?php
session_start();
?>
<?php

$captcha_error = '';
$registration_error = '';
$registration_success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_captcha = isset($_POST['captcha']) ? $_POST['captcha'] : '';


    if (strcasecmp($user_captcha, $_SESSION['captcha_code']) !== 0) { 
        $captcha_error = "CAPTCHA does not match. Please try again.";
    } else {
        
        $registration_success = true;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $address = $_POST['Address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $accept_terms = isset($_POST['accept-terms']) ? 1 : 0;


    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    $query = "SELECT * FROM register_user WHERE email = '$email'";
    $result = mysqli_query($conn, $query); 
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('This email is already registered.');
        window.location.href = 'signup.php';
        </script>";
        exit();
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    
    $query = "INSERT INTO register_user (first_name, last_name, address, email, phone, password, accept_terms) 
              VALUES ('$first_name', '$last_name', '$address', '$email', '$phone', '$hashed_password', '$accept_terms')";

    if (mysqli_query($conn, $query)) { 
        echo "<script>alert('Registration successful!');
         window.location.href = 'Login.php';</script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($conn); 
    }

    mysqli_close($conn);
}
?>