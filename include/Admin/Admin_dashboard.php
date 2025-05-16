<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      display: flex;
      overflow-x: hidden;
    }

    .sidebar {
      width: 250px;
      background-color: #002a80;
      color: white;
      height: 100vh;
      position: fixed;
      overflow: auto;
      padding-top: 20px;
      transform: translateX(-100%);
      animation: slideIn 0.5s forwards;
    }

    @keyframes slideIn {
      from {
        transform: translateX(-100%);
      }
      to {
        transform: translateX(0);
      }
    }

    
    .profile {
      text-align: center;
      padding: 20px;
      border-bottom: 1px solid #333;
    }

    .profile img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 10px;
      transition: transform 0.3s ease-in-out;
    }

    .profile img:hover {
      transform: scale(1.1);
    }

    .menu a {
      color: white;
      text-decoration: none;
      padding: 12px 20px;
      display: block;
      transition: all 0.3s ease;
    }

    .menu a:hover {
      background-color: #0048a0;
      transform: scale(1.05);
    }

    .submenu {
      display: none;
      list-style: none;
      padding-left: 20px;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }

    .submenu.show {
      display: block;
      opacity: 1;
    }

    /*.content {
      margin-left: 260px;
      padding: 20px;
      width: 100%;
      opacity: 0;
      animation: fadeIn 0.5s forwards;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      min-height: 100vh;
    }*/

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .logout {
      background: none;
      border: none;
      color: white;
      font-size: 18px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .logout:hover {
      transform: scale(1.1);
      color: red;
    }

    .submenu a {
      font-size: 14px;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <div class="profile">
      <img src="212660.jpg" alt="Profile Picture">
      <h3>Bhatiya</h3>
      <a href="logout.php" class="logout btn btn-danger btn-sm">Logout</a>

    </div>

    <ul class="list-unstyled menu">
      <li><a href="index.php"><i class="fas fa-home"></i> Dashboard Login</a></li>
      <!--<li><a href="Add Room.php"><i class="fas fa-bed"></i> Add Rooms</a></li>-->
      <li><a href="faciliti_add.php"><i class="fas fa-tools"></i> Add Facilities</a></li>
      <li><a href="Contact_us.php"><i class="fas fa-envelope"></i> Contact Us</a></li>
      <li><a href="help.php"><i class="fas fa-question-circle"></i> Inquiry</a></li>

      <li><a href="feedback.php"><i class="fas fa-thumbs-up"></i> Feedback</a></li>

      <li>
        <a href="#" class="toggle-submenu"><i class="fas fa-hotel"></i> Add Hotel <i class="fas fa-chevron-down float-end"></i></a>
        <ul class="submenu">
          <li><a href="Hotel_add.php">Add Hotel</a></li>
          <li><a href="Hotel_display.php">Update/Delete Hotel</a></li>
          <li><a href="Hotel_booking_detalis.php">Hotel Bookings_detalis</a></li>

        </ul>
      </li>
      <li><a href="search_tour_bookings.php"><i class="fas fa-search"></i> Search Tour package </a></li>

      <li><a href="Tourist_Booking_display.php"><i class="fas fa-suitcase"></i> Tourist Package Booking</a></li>
      <li>
        <a href="../Admin/Employee details/register.php"><i class="fas fa-users"></i> Employee Details</a></li>

    </ul>
  </div>

  <!--<div class="content" id="main-content">
    <h2>Welcome to Admin Dashboard</h2>
    <p>Select an option from the menu to get started.</p>
  </div>-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function () {
      $(".sidebar").css("transform", "translateX(0)");

      
      $(".toggle-submenu").click(function (event) {
        event.preventDefault();
        let submenu = $(this).next(".submenu");
        submenu.toggleClass("show");
        $(this).find("i.fa-chevron-down").toggleClass("fa-chevron-up");
      });
    });
  </script>
  

</body>
</html>
