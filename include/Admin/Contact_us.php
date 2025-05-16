<?php
include('../Api/db.php'); 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['status'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $status = $conn->real_escape_string($_POST['status']);

    $sql = "UPDATE contact_Us SET status='$status' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Status updated successfully!'); window.location.href='Contact_us.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error updating status: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM contact_Us ORDER BY id ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Contact Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color:  #003580;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .pending {
            background-color: red;
            color: #333;
        }
        .active {
            background-color: #28a745;
            color: white;
        }
        select {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        button {
            background:  #003580;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background:  #003580;
        }
        .action-form {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>

    <h2>Admin Panel - Contact Messages</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Message</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['number']; ?></td>
                <td><?php echo $row['message']; ?></td>
                <td>
                    <span class="status-badge <?php echo strtolower($row['status']); ?>">
                        <?php echo $row['status']; ?>
                    </span>
                </td>
                <td>
                    <form method="POST" class="action-form">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <select name="status">
                            <option value="Pending" <?php if ($row['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                            <option value="Active" <?php if ($row['status'] == 'Active') echo 'selected'; ?>>Active</option>
                        </select>
                        <button type="submit">Update</button>
                    </form>
                </td>
            </tr>
        <?php } ?>

    </table>

</body>
</html>

<?php $conn->close(); ?>
