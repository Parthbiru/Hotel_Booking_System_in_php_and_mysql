<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday Booking - Bhatiya Hotel</title>
    
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
            display: none; /* Hide it by default */
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
            margin-left: 10px;
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
            padding: 30px 10px;
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

        .search-bar {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-bar input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
        }

        .search-bar button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #ff6200;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #e55a00;
        }

        .destinations {
            text-align: center;
            padding: 20px;
        }

        .destinations h3 {
            font-size: 22px;
            margin-bottom: 100px;
            color: #002a80;
        }

        .search {
            background-color:white;
            padding: 20px;
            border-radius: 30px;
            color: white;
            width: 80%;
            margin: 10px auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            border: 3.5px solid #f6ac6f;
        }

        .search form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            
        }

        .search form label {
            font-size: 16px;
            color: black;
            
        }

        .search form input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
            box-sizing: border-box;
            border: 3.5px solid orange;
        }

        .search form button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #003580;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search form button:hover {
            background-color: #e55a00;
        }

        .carousel-container {
            width: 75%;
            overflow: hidden;
            margin: 50px auto;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 10px;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            color: #003580;
        }

        .card-img {
            width: 280px;
            height: 200px;
            object-fit: cover;
            border-radius: 30px;
            padding-left: 10px;
            padding-top: 15px;

        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #003580;
        }

        .card-location {
            font-size: 1.25rem;
            color: #003580;
            margin-bottom: 15px;
        }

        .view-more {
            display: inline-block;
            padding: 10px 20px;
            background-color: #003580;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s;
        }

        .view-more:hover {
            background-color: #002a80;
        }

        .carousel-controls {
            text-align: center;
            margin-top: 20px;
        }

        .prev-btn,
        .next-btn {
            padding: 10px 20px;
            background-color: #003580;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            margin: 0 10px;
        }

        .prev-btn:hover,
        .next-btn:hover {
            background-color: #002a80;
        }

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
</head>

<body>
    <header class="header">
        <div class="logo">
            <h1>AP Hotel</h1>
            <p>Developer by Bhatiya Group</p>
        </div>

    <div class="hamburger" id="hamburger">
        <!-- Add the SVG icon here -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="700" height="800">
    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" fill="white"/>
</svg>

    </div>
    <div class="menu">
        <a href="form/Login.php"><button>Sign in</button></a>
        <br>
        <a href="form/signup.php"><button>Create an account</button></a>
        <a href="form/need.php"><button>Need help?</button></a>

    </div>
</header>

    <nav>
        <ul>
            <li><a href="./Home.php">Home</a></li>
            <li><a href="Routes/rooms.php">Rooms</a></li>
            <li><a href="Routes/Facilities.php">Facilities</a></li>
            <li><a href="Routes/contact us.php">Contact Us</a></li>
            <li><a href="Routes/Aboutus.php">About Us</a></li>
        </ul>
    </nav>
    

    <section class="hero">
        <h2>Find your next stay</h2>
       <h4> Search low prices on hotels, homes and much more...</h4>
    </section>

    <section class="search">
        <form action="Routes/search_results.php" method="POST">
            <label for="city">Enter City Name:</label>
            <input list="cities" id="city" name="city" placeholder="More places than you could ever go (but you can try!)" required>
            <datalist id="cities">
                <option value="Goa">
                <option value="Ooty">
                <option value="Mumbai">
                <option value="New Delhi">
                <option value="Bangalore">
                <option value="Munnar">
                <option value="Rishikesh">
                <option value="North Goa">
                <option value="Manali">
                <option value="TajMahal">
            </datalist>

            <label for="check-in">Check-in Date:</label>
            <input type="date" id="check-in" name="check-in" required>

            <label for="check-out">Check-out Date:</label>
            <input type="date" id="check-out" name="check-out" required>

            <button type="submit">Search</button>
        </form>
    </section>

    <main>
        <section class="destinations">
            <h3>Discover our hottest destinations</h3>
        </section>
    </main>

    <div class="carousel-container">
        <div class="carousel">
            <!-- Add all your card content below -->
            <div class="card">
                <img src="hotel image/11.jpeg" alt="Goa Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Goa</h3>
                    <p class="card-location">Location: Goa</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/12.jpeg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Ooty</h3>
                    <p class="card-location">Location: Ooty</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/13.jpeg" alt="Mumbai Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Mumbai</h3>
                    <p class="card-location">Location: Mumbai</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/14.jpeg" alt="New Delhi Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">New Delhi</h3>
                    <p class="card-location">Location: New Delhi</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div>
            <!-- Add more cards as needed -->
            <div class="card">
                <img src="hotel image/15.jpeg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Bangalore</h3>
                   <!-- <p class="card-price">₹ 7,000</p>-->
                    <p class="card-location">Location: Bangalore</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/16.jpeg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Munnar</h3>
                    <p class="card-price">₹ 7,000</p>
                    <p class="card-location">Location: Munnar</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div>
            
            <div class="card">
                <img src="hotel image/17.jpg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Rishikesh</h3>
                    <p class="card-price">₹ 7,000</p>
                    <p class="card-location">Location: Rishikesh</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/18.jpg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">North Goa</h3>
                    <p class="card-price">₹ 7,000</p>
                    <p class="card-location">Location: North Goa</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/19.jpg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Manali</h3>
                    <p class="card-price">₹ 7,000</p>
                    <p class="card-location">Location: Manali</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div><div class="card">
                <img src="hotel image/10.jpg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Agra</h3>
                    <p class="card-price">₹ 7,000</p>
                    <p class="card-location">Location: Ooty</p>
                    <a href="rooms.php" class="view-more">View More Details</a>
                </div>
            </div>


        </div>
    </div>

    <div class="carousel-controls">
        <button class="prev-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"></path></svg>
        </button>
        <button class="next-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"></path></svg>
        </button>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const carousel = document.querySelector('.carousel');
            const cards = document.querySelectorAll('.card');
            let index = 0;

            function moveToNextCard() {
                const cardWidth = cards[0].offsetWidth;
                if (index < cards.length - 1) {
                    index++;
                } else {
                    index = 0;
                }
                carousel.style.transform = `translateX(-${index * cardWidth}px)`;
            }

            function moveToPrevCard() {
                const cardWidth = cards[0].offsetWidth;
                if (index > 0) {
                    index--;
                } else {
                    index = cards.length - 1;
                }
                carousel.style.transform = `translateX(-${index * cardWidth}px)`;
            }

            prevBtn.addEventListener('click', moveToPrevCard);
            nextBtn.addEventListener('click', moveToNextCard);

            setInterval(moveToNextCard, 4000);
        });

        
    </script>
    <script>
    // JavaScript for hamburger toggle menu
    document.addEventListener("DOMContentLoaded", function () {
        const hamburger = document.getElementById('hamburger');
        const menu = document.querySelector('.menu');
        
        hamburger.addEventListener('click', function() {
            // Toggle the active class on the menu
            menu.classList.toggle('active');
        });
    });
</script>

</body>

</html>












