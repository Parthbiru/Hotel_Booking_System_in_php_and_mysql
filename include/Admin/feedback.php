<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'hotel_booking_system');

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}


$message = "";
$message_type = "success"; 

if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    
    
    $new_status = ($action == 'activate') ? 'active' : 'inactive';
    
    $stmt = $conn->prepare("UPDATE feedback SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $new_status, $id);
    
    if ($stmt->execute()) {
        $message = "Feedback status updated successfully!";
    } else {
        $message = "Error: " . $conn->error;
        $message_type = "error"; 
    }
    
    $stmt->close();
}

$result = $conn->query("SELECT * FROM feedback");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Feedback Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            color: #333;
            padding: 20px;
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

        button {
            padding: 5px 10px;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .activate-button {
            background-color: #28a745; 
        }

        .deactivate-button {
            background-color: #dc3545; 
        }

        button:hover {
            opacity: 0.8;
        }

        a {
            text-decoration: none;
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            background-color:#dc3545;
            color: white;
            border-radius: 5px;
            text-align: center;
            display: none;
        }

        .message.error {
            background-color: #28a745; 
        }
    </style>
</head>
<body>

<h2>Admin Feedback Management</h2>

<?php if ($message): ?>
    <div class="message <?php echo $message_type; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Feedback</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['comment']); ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <?php if ($row['status'] == 'inactive'): ?>
                        <a href="?action=activate&id=<?php echo $row['id']; ?>">
                            <button class="activate-button">Read</button>
                        </a>
                    <?php else: ?>
                        <a href="?action=deactivate&id=<?php echo $row['id']; ?>">
                            <button class="deactivate-button">Unread</button>
                        </a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<script>
    window.onload = function() {
        var message = document.querySelector('.message');
        if (message) {
            message.style.display = 'block'; 
            setTimeout(function() {
                message.style.opacity = '0'; 
                setTimeout(function() {
                    message.style.display = 'none'; 
                }, 1000); 
            }, 1000); 
        }
    }
</script>

</body>
</html>

