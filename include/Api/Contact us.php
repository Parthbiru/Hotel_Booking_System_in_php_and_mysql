<?php
include('../Api/db.php'); 

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['Number'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_Us (name, email, number, message, status) 
            VALUES ('$name', '$email', '$number', '$message', 'Pending')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='../Home.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='../Home.php';</script>";
    }
}

mysqli_close($conn);
?>
K