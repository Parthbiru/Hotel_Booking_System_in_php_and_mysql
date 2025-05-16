<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Employee Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #002a80;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button, .action-link {
            background-color: #002a80;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }

        .action-link:hover, button:hover {
            background-color: #0033cc;
        }

        a {
            color: #002a80;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .action-link {
            display: inline-block;
            margin-right: 10px;
        }
    </style>

    <div class="container">
        <h2>Employee Management</h2>

        <?php
        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'hotel_booking_system');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch all employees from the database
        $sql = "SELECT emp_id, name, surname, address, salary, job_title, joining_date FROM employees_register";
        $result = $conn->query($sql);

        // Check if records are found
        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Address</th>
                        <th>Salary</th>
                        <th>Job Title</th>
                        <th>Joining Date</th>
                        <th>Actions</th>
                    </tr>";

            // Display data in table rows
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['emp_id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['surname'] . "</td>
                        <td>" . $row['address'] . "</td>
                        <td>" . $row['salary'] . "</td>
                        <td>" . $row['job_title'] . "</td>
                        <td>" . $row['joining_date'] . "</td>
                        <td>
                            <a href='edit.php?emp_id=" . $row['emp_id'] . "' class='action-link'>Edit</a>
                            <a href='delete.php?emp_id=" . $row['emp_id'] . "' class='action-link' onclick='return confirm(\"Are you sure you want to delete this employee?\")'>Delete</a>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No employees found.</p>";
        }

        $conn->close();
        ?>

        <a href="register.php"><button>Register New Employee</button></a>
    </div>

</body>
</html>
