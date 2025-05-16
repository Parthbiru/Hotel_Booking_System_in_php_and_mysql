<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:  #002a80;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select, textarea, button {
            margin-bottom: 15px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type="date"], input[type="number"] {
            max-width: 250px;
        }

        button {
            background-color:  #002a80;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
        }

        button:hover {
            background-color:  #002a80;
        }

        p {
            text-align: center;
        }

        a {
            color: #002a80;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
    
    <div class="container">
        <h2>Employee Registration</h2>
        <form action="register.php" method="POST">
            <label for="emp_id">Employee ID:</label>
            <input type="text" name="emp_id" id="emp_id" required><br>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>

            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" required><br>

            <label for="address">Address:</label>
            <textarea name="address" id="address" required></textarea><br>

            <label for="salary">Salary:</label>
            <input type="number" name="salary" id="salary" required><br>

            <label for="job_title">Job Title:</label>
            <select name="job_title" id="job_title" required>
                <option value="Manager">Manager</option>
                <option value="Assistant Manager">Assistant Manager</option>
                <option value="Accountant">Accountant</option>
                <option value="HR">HR</option>
                <option value="Driver">Driver</option>
                <option value="Training Staff">Training Staff</option>
                <option value="Housekeeping">Housekeeping</option>
            </select><br>

            <label for="joining_date">Joining Date:</label>
            <input type="date" name="joining_date" id="joining_date" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <button type="submit">Register</button>
        </form>

        <p>Already registered? <a href="login.php">Login here</a></p>
    </div>

    <?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn = new mysqli('localhost', 'root', '', 'hotel_booking_system');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $emp_id = $_POST['emp_id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $address = $_POST['address'];
        $salary = $_POST['salary'];
        $job_title = $_POST['job_title'];
        $joining_date = $_POST['joining_date'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO employees_register (emp_id, name, surname, address, salary, job_title, joining_date, password) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die('MySQL prepare error: ' . $conn->error);
        }

        $stmt->bind_param("ssssssss", $emp_id, $name, $surname, $address, $salary, $job_title, $joining_date, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Employee Registered Successfully!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: Employee ID already exists!'); window.history.back();</script>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>

</body>
</html>
