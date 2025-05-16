<?php
session_start(); // Start session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms</title>
    <?php include '../../include/home Navbar/navbar.php'; ?>

    
    <style>
        * {
           
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: #333;
         
        }

        h1 {
            text-align: center;
            color: white;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .room-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 10px;
            justify-items: center; 
            margin-top: 30px;
        }

        .room-card {
            display: flex;
            flex-direction: column; 
            justify-content: space-between;
            width: 100%; 
            max-width: 450px; 
            border-radius: 15px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s ease-in-out;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .room-card img {
            width: 100%;
            height: 270px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .room-details {
            flex: 1;
        }

        .room-card h3 {
            color: #003580;
            font-size: 1.5em;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .room-card .price {
            font-size: 1.4em;
            font-weight: bold;
            color: #002a80;
            margin-top: 7px;
        }

        .room-card ul {
            list-style-type: none;
            margin: 7px 0;
            padding-left: 0;
        }

        .room-card ul li {
            margin-bottom: 4px;
            font-size: 1em;
            color: #555;
        }

        .room-card h4 {
            margin-top: 10px;
            font-size: 1.1em;
            color: #003580;
            font-weight: 600;
        }

        .room-card .buy-now-btn {
            background-color: #003580;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.2em;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 15px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .room-card .buy-now-btn:hover {
            background-color: white;
            color: #003580;
            border: 2px solid #003580;
        }

        @media (max-width: 1024px) {
            .room-container {
                grid-template-columns: repeat(2, 1fr); /* 2 */
            }

            .room-card img {
                height: 200px;
            }

            .room-card h3 {
                font-size: 1.4em;
            }
        }

        
        @media (max-width: 768px) {
            .room-container {
                grid-template-columns: repeat(1, 1fr); 
            }

            .room-card img {
                height: 180px;
            }

            h1 {
                font-size: 2em;
            }

            .room-card h3 {
                font-size: 1.2em;
            }

            .room-card .price {
                font-size: 1.2em;
            }

            .room-card .buy-now-btn {
                font-size: 1em;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.6em;
            }

            .room-card h3 {
                font-size: 1.1em;
            }

            .room-card .price {
                font-size: 1.1em;
            }

            .room-card .buy-now-btn {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>

<h1>Available Rooms</h1>

<div class="room-container">
    <?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'hotel_booking_system';

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM rooms";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $amenities = explode(", ", $row['popular_guests']);
            $features = explode(", ", $row['room_features']);
            $photo_path = !empty($row['photo']) ? '../Admin/uploads/' . $row['photo'] : 'images/default_room_image.jpg';
            ?>
            <div class="room-card">
                <img src="<?php echo $photo_path; ?>" alt="Room Photo">
                <div class="room-details">
                    <h3><?php echo $row['room_name']; ?></h3>
                    <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
                    <p><strong>Room Size:</strong> <?php echo $row['room_size']; ?> sq ft</p>
                    <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
                    <p class="price"><strong>Price:</strong> ₹<?php echo number_format($row['price'], 2); ?></p>

                    <h4>Amenities:</h4>
                    <ul>
                        <?php foreach ($amenities as $amenity) { echo "<li>$amenity</li>"; } ?>
                    </ul>

                    <h4>Room Features:</h4>
                    <ul>
                        <?php foreach ($features as $feature) { echo "<li>$feature</li>"; } ?>
                    </ul>

                    <form action="purchase.php" method="post">
                        <input type="hidden" name="room_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="buy-now-btn">Buy Now</button>
                    </form>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>No rooms available.</p>";
    }

    mysqli_close($conn);
    ?>
</div>

</body>
<?php include '../../include/home Navbar/Footer.php'; ?>

</html>