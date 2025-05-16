<?php
session_start(); // Start session
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            background-size: cover;
            background-position: center;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #002a80;
            color: white;
            padding: 15px 20px;
        }

        .logo h1 {
            margin: 0;
            font-size: 20px;
        }

        .logo p {
            margin: 0;
            font-size: 12px;
            color: #ffc107;
        }

        /* Hamburger icon styles */
        .hamburger {
            display: none;
            cursor: pointer;
            flex-direction: column;
            gap: 10px;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
        }

        .hamburger span {
            display: block;
            width: 30px;
            height: 3px;
            background-color: white;
            border-radius: 5px;
        }

        .menu {
            display: flex;
        }

        .menu a button {
            background-color: transparent;
            border: none;
            color: white;
            padding-top: 48px;
            margin-top: 5px;
            margin-left: 2px;
            cursor: pointer;
        }

        .menu a button:hover {
            text-decoration: underline;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            background-color: #002a80;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            display: inline-block;
        }

        nav ul li a:hover {
            background-color: #003580;
            border-radius: 5px;
        }

        .hero {
            text-align: center;
            background-color: #002a80;
            color: white;
            padding: 30px 50px;
        }

        .hero h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .hero h4 {
            font-size: 15px;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .about-us {
            padding: 20px;
            background-color: #ffffff;
            color: #333;
            text-align: center;
        }

        .about-us h3 {
            font-size: 24px;
            margin-top: 30px;
        }

        .about-us p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        footer {
            text-align: center;
            background-color: #002a80;
            color: white;
            padding: 10px 0;
        }

        footer a {
            color: #ffc107;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            .card {
                width: 90%;
            }

            .hero h2 {
                font-size: 24px;
            }

            .search form input {
                width: 100%;
            }

            .menu {
                display: none;
                position: absolute;
                top: 60px;
                right: 1%;
                background-color: #002a80;
                border-radius: 8px;
                padding: 10px;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
                width: 200px;
                text-align: center;
            }

            .menu.active {
                display: block;
            }

            nav ul {
                flex-direction: column;
                align-items: center;
            }

            nav ul li {
                margin: 10px 0;
            }

            .hamburger {
                display: flex;
            }
        }


      </style>
    <title>About Us - Bhatiya Hotel</title>
    <header class="header">
        <div class="logo">
            <h1>AP Hotel</h1>
            <p>Developer by Bhatiya Group</p>
        </div>

    <div class="hamburger" id="hamburger">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="700" height="800">
    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" fill="white"/>
</svg>

    </div>
    <div class="menu">
        <a href="../form/Login.php"><button>Sign in</button></a>
        <br>
        <a href="../form/signup.php"><button>Create an account</button></a>
        <a href="../form/need.php"><button>Need help?</button></a>

    </div>
</header>
    <!--<nav>
        <ul>
            <li><a href="./Home.php">Home</a></li>
            <li><a href="Routes/rooms.php">Rooms</a></li>
            <li><a href="Routes/Facilities.php">Facilities</a></li>
            <li><a href="Routes/contact us.php">Contact Us</a></li>
            <li><a href="Routes/Aboutus.php">About Us</a></li>
        </ul>
    </nav>-->


    <!--boostrap--->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #002a80; ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="../Home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="../Routes/rooms.php">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="../Routes/Facilities.php">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="../Routes/contact us.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="../Routes/Aboutus.php">About US</a>
        </li>
          <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="../Routes/feedback.php">FeedBack</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<section class="hero">
    <h2>Find your next stay</h2>
    <p>Search low prices on hotels, homes and much more...</p>
</section>

<section class="about-us">
    <h3>Our Mission</h3>
    <p>At Bhatiya Hotel, we strive to provide top-notch hospitality services and ensure that each guest has a memorable experience. Our hotels are designed to offer comfort, luxury, and convenience at an affordable price. Whether you're here for business or leisure, we have everything you need for an unforgettable stay.</p>

    <h3>Our Story</h3>
    <p>Founded in 2000, Bhatiya Hotel began with the goal of providing travelers with a personalized and luxurious experience. Over the years, we have expanded our reach to several locations across the country, offering a diverse range of amenities and services tailored to meet the needs of all our guests. Our commitment to excellence remains the cornerstone of our success.</p>

    <h3>Why Choose Us?</h3>
    <p>With Bhatiya Hotel, you can expect top-quality accommodations, exceptional customer service, and prime locations. Our dedicated staff works around the clock to ensure that your stay is as comfortable and enjoyable as possible. Choose Bhatiya Hotel for your next trip, and let us make your stay unforgettable!</p>
</section>
<script>
    // JavaScript for hamburger toggle menu
    document.addEventListener("DOMContentLoaded", function () {
        const hamburger = document.getElementById('hamburger');
        const menu = document.querySelector('.menu');
        
        hamburger.addEventListener('click', function() {
            menu.classList.toggle('active');
            hamburger.classList.toggle('open');
        });
    });
</script>
<?php include '../../include/home Navbar/Footer.php'; ?>


</body>
</html>
