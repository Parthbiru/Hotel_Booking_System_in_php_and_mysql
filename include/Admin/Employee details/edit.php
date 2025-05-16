<?php

session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit();
    }
$conn = new mysqli('localhost', 'root', '', 'hotel_booking_system');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$emp_id = $_GET['emp_id'];

$sql = "SELECT * FROM employees_register WHERE emp_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $emp_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $employee = $result->fetch_assoc();
} else {
    echo "Employee not found!";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $job_title = $_POST['job_title'];
    $joining_date = $_POST['joining_date'];

    $update_sql = "UPDATE employees_register SET name=?, surname=?, address=?, salary=?, job_title=?, joining_date=? WHERE emp_id=?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssssss", $name, $surname, $address, $salary, $job_title, $joining_date, $emp_id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Employee details updated successfully!'); window.location.href='Employee_data.php';</script>";
    } else {
        echo "<script>alert('Error updating employee details!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #002a80;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        textarea {
            height: 120px;
        }

        button {
            background-color: #002a80;
            color: white;
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0033cc;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #002a80;
            text-decoration: none;
            font-size: 16px;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Employee Details</h2>

        <form action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $employee['name']; ?>" required>

            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" value="<?php echo $employee['surname']; ?>" required>

            <label for="address">Address:</label>
            <textarea name="address" id="address" required><?php echo $employee['address']; ?></textarea>

            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" value="<?php echo $employee['salary']; ?>" required>

            <label for="job_title">Job Title:</label>
            <select name="job_title" id="job_title" required>
                <option value="Manager" <?php if ($employee['job_title'] == 'Manager') echo 'selected'; ?>>Manager</option>
                <option value="Assistant Manager" <?php if ($employee['job_title'] == 'Assistant Manager') echo 'selected'; ?>>Assistant Manager</option>
                <option value="Accountant" <?php if ($employee['job_title'] == 'Accountant') echo 'selected'; ?>>Accountant</option>
                <option value="HR" <?php if ($employee['job_title'] == 'HR') echo 'selected'; ?>>HR</option>
                <option value="Driver" <?php if ($employee['job_title'] == 'Driver') echo 'selected'; ?>>Driver</option>
                <option value="Training Staff" <?php if ($employee['job_title'] == 'Training Staff') echo 'selected'; ?>>Training Staff</option>
                <option value="Housekeeping" <?php if ($employee['job_title'] == 'Housekeeping') echo 'selected'; ?>>Housekeeping</option>
            </select>

            <label for="joining_date">Joining Date:</label>
            <input type="date" name="joining_date" id="joining_date" value="<?php echo $employee['joining_date']; ?>" required>

            <button type="submit">Update Employee</button>
        </form>

        <div class="back-link">
            <a href="Employee_data.php">Back to Employee Management</a>
        </div>
    </div>

</body>
</html>
