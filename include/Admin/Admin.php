<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Sidebar Styles */
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            height: 100vh;
            background: #1c1f26;
            color: white;
            transition: all 0.3s;
            padding-top: 20px;
            position: fixed;
        }
        #sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }
        #sidebar a:hover {
            background: #343a40;
        }
        #sidebar .active {
            background: #007bff;
        }
        .sidebar-collapsed {
            margin-left: -250px;
        }
        /* Main Content */
        #main-content {
            flex-grow: 1;
            padding: 20px;
            margin-left: 250px;
            transition: margin-left 0.3s;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="d-flex">
    <div id="sidebar">
        <h4 class="text-center">Admin Panel</h4>
        <a href="index.php" class="active">Dashboard</a>
        <a href="Add Room.php">Rooms</a>
        <a href="faciliti_add.php">Add Facilities</a>
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="w-100">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="btn btn-dark" id="toggleSidebar">☰</button>
                <a class="navbar-brand ms-2" href="#">Dashboard</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                       <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container mt-4">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Manage your hotel booking system from here.</p>
        </div>
    </div>
</div>

<!-- Sidebar Toggle Script -->
<script>
    document.getElementById("toggleSidebar").addEventListener("click", function() {
        document.getElementById("sidebar").classList.toggle("sidebar-collapsed");
        let mainContent = document.getElementById("main-content");
        if (document.getElementById("sidebar").classList.contains("sidebar-collapsed")) {
            mainContent.style.marginLeft = "0";
        } else {
            mainContent.style.marginLeft = "250px";
        }
    });
</script>

</body>
</html>
