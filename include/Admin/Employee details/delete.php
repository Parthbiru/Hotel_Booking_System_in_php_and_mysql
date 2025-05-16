<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'hotel_booking_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$emp_id = $_GET['emp_id'];

$sql = "DELETE FROM employees_register WHERE emp_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $emp_id);

if ($stmt->execute()) {
    echo "<script>alert('Employee deleted successfully!'); window.location.href='admin_panel.php';</script>";
} else {
    echo "<script>alert('Error deleting employee!'); window.location.href='admin_panel.php';</script>";
}

$stmt->close();
$conn->close();
?>
