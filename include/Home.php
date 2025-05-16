<?php
session_start();
?>
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
            padding-top:48px;
            margin-top:5px;
            margin-left: 20px;
            cursor: pointer;
        }

        .menu a button:hover {
            /*text-decoration: underline;*/
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
         /*   margin-bottom: 100px; */
         margin-bottom: 10px
            color: #002a80;
        }

        .search {
            background-color:white;
            padding: 20px;
            border-radius: 30px;
            color: white;
            width: 82%;
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
            padding-right: 10px;

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

        /* Chatbot Styles */
        .chatbot-container {
            position: fixed;
            bottom: 25px;
            right: 20px;
            width: 300px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .chatbot-header {
            background-color:#002a80;
            color: white;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            font-weight: bold;
        }

        .chatbot-body {
            padding: 10px;
            max-height: 200px;
            overflow-y: auto;
        }

        .chatbot-footer {
            display: flex;
            padding:20px;
            border-top: 1px solid #ddd;
        }

        .chatbot-footer input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }

        .chatbot-footer button {
            background-color:#002a80;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .chatbot-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #002a80;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .message {
            margin-bottom: 10px;
        }

        .message.user {
            text-align: right;
        }

        .message.bot {
            text-align: left;
        }

        .message.user span {
            background-color: #0056b3;
            color: white;
            padding: 8px;
            border-radius: 10px;
            display: inline-block;
        }

        .message.bot span {
            background-color: #f1f1f1;
            color: #333;
            padding: 8px;
            border-radius: 10px;
            display: inline-block;
        }

        
    </style>
</head>

<body>
    
    <header class="header">
        <!--<div class="logo">
            <h1>Bhatiya Hotel</h1>
            <p>Developer by Bhatiya Group</p>
        </div>
    <div class="hamburger" id="hamburger">-->
        <!-- Add the SVG icon here -->
        <!--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="700" height="800">
    <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" fill="white"/>
</svg>
    </div>
    <div class="menu">
        <a href="form/Login.php"><button>Sign in</button></a>
        <br>
        <a href="form/signup.php"><button>Create an account</button></a>
        <a href="form/need.php"><button>Need help?</button></a>
        <a href="form/need.php"><button>booking</button></a>

    </div>
</header>-->

    <div class="logo">
        <h1>Bhatiya Hotel</h1>
        <p>Developed by Bhatiya Group</p>
    </div>

    <div class="hamburger" id="hamburger">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="700" height="800">
            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z" fill="white"/>
        </svg>
    </div>

    <div class="menu">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="Routes/Booking_History.php"><button>Booking History</button></a>
            <a href="form/need.php"><button>Need Help?</button></a>
            <br>
            <a href="./logout.php"><button>Logout</button></a> 
        <?php else: ?>
            <a href="form/Login.php"><button>Sign in</button></a>
            <br>
            <a href="form/signup.php"><button>Create an Account</button></a>
            <a href="form/need.php"><button>Need help?</button></a>
        <?php endif; ?>
    </div>
</header>

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
          <a class="nav-link text-white" aria-current="page" href="./Home.php">Home</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="Routes/rooms.php">Rooms</a>
        </li>-->
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="Routes/Facilities.php">Facilities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="Routes/contact us.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="Routes/Aboutus.php">About US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" aria-current="page" href="Routes/feedback.php">FeedBack</a>
        </li>
      </ul>
    </div>
  </div>
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
                <option value="Amritsar">

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
            <div class="card">
                <img src="hotel image/11.jpeg" alt="Goa Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Goa</h3>
                    <p class="card-location">Location: Goa</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/12.jpeg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    
                    <h3 class="card-title">Ooty</h3>
                    <p class="card-location">Location: Ooty</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                    <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/22.jpg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Amritsar</h3>
                    <p class="card-location">Location:punjab</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                    <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/13.jpeg" alt="Mumbai Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Mumbai</h3>
                    <p class="card-location">Location: Mumbai</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/14.jpeg" alt="New Delhi Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">New Delhi</h3>
                    <p class="card-location">Location: New Delhi</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/15.jpeg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Bangalore</h3>
                    <p class="card-location">Location: Bangalore</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/16.jpeg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Munnar</h3>
                    <!--<p class="card-price">₹ 7,000</p>-->
                    <p class="card-location">Location: Munnar</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/17.jpg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Rishikesh</h3>
                    <!--<p class="card-price">₹ 7,000</p>-->
                    <p class="card-location">Location: Rishikesh</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/18.jpg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">North Goa</h3>
                   <!-- <p class="card-price">₹ 7,000</p>-->
                    <p class="card-location">Location: North Goa</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/19.jpg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Manali</h3>
                    <!--<p class="card-price">₹ 7,000</p>-->
                    <p class="card-location">Location: Manali</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
                </div>
            </div>
            <div class="card">
                <img src="hotel image/10.jpg" alt="Ooty Hotel" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Agra</h3>
                    <!--<p class="card-price">₹ 7,000</p>-->
                    <p class="card-location">Location: Agra</p>
                    <p class="tourist-guide">Tourist Guide Available</p>
                <p class="package">7-Day Package Available</p>
                    <a href="../include/Routes/view_More_Details.php" class="view-more">View More Details</a>
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

    <button class="chatbot-toggle" onclick="toggleChatbot()">💬</button>

    <div class="chatbot-container" id="chatbotContainer">
        <div class="chatbot-header">
            Tour Package Assistant
        </div>
        <div class="chatbot-body" id="chatbotBody">
            <div class="message bot">
                <span>Welcome to Bhatiya Hotel! How can I assist you ? 😊</span>
                <Span>Booking Payment Cancal Thankyou amenities Room Checkin special request Location Weather</span>
            </div>
        </div>
        <div class="chatbot-footer">
            <input type="text" id="chatbotInput" placeholder="Type your question...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
    

    <script>
        
        // Get today's date
    const today = new Date();
    const formattedDate = today.toISOString().split('T')[0]; // Formats the date as YYYY-MM-DD

    // Set the min attribute to today's date for both check-in and check-out
    document.getElementById("check-in").setAttribute("min", formattedDate);
    document.getElementById("check-out").setAttribute("min", formattedDate);
        
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

        function toggleChatbot() {
            const chatbot = document.getElementById('chatbotContainer');
            chatbot.style.display = chatbot.style.display === 'block' ? 'none' : 'block';
        }

        function sendMessage() {
            const input = document.getElementById('chatbotInput');
            const message = input.value.trim();
            if (!message) return;

            const chatbotBody = document.getElementById('chatbotBody');
            const userMessage = document.createElement('div');
            userMessage.className = 'message user';
            userMessage.innerHTML = `<span>${message}</span>`;
            chatbotBody.appendChild(userMessage);

            const botResponse = getBotResponse(message);
            const botMessage = document.createElement('div');
            botMessage.className = 'message bot';
            botMessage.innerHTML = `<span>${botResponse}</span>`;
            chatbotBody.appendChild(botMessage);

            input.value = '';
            chatbotBody.scrollTop = chatbotBody.scrollHeight;
        }

        function getBotResponse(message) {
    const lowerMessage = message.toLowerCase();

    // Greetings
    if (lowerMessage.includes("hi") || lowerMessage.includes("hello")) {
        return "Hello! Welcome to Bhatiya Hotel. How can I assist you  😊";

        
    // Booking-related inquiries
    } else if (lowerMessage.includes("booking") || lowerMessage.includes("reserve")) {
        return "To book your stay at Bhatiya Hotel, use the 'Book Now' button or contact us directly for personalized service.";
        
    // Payment-related inquiries
    } else if (lowerMessage.includes("payment") || lowerMessage.includes("pay")) {
        return "We accept credit/debit cards, net banking, and UPI. Payment details are provided during booking.";

    // Cancellation and refund inquiries
    } else if (lowerMessage.includes("cancel") || lowerMessage.includes("refund")) {
        return "Cancellations at Bhatiya Hotel are refundable up to 7 days before check-in. Contact us for full details.";

    // External good message
    } else if (lowerMessage.includes("thank you") || lowerMessage.includes("thanks")) {
        return "You're welcome! 😊 We look forward to making your stay memorable at Bhatiya Hotel! Feel free to reach out anytime.";

    // Inquiry about amenities
    } else if (lowerMessage.includes("amenities") || lowerMessage.includes("facilities")) {
        return "Bhatiya Hotel offers a wide range of amenities including a swimming pool, gym, free Wi-Fi, a spa, and fine dining. Would you like more details on any specific facility?";

    // Inquiry about room availability
    } else if (lowerMessage.includes("room") || lowerMessage.includes("availability")) {
        return "We offer a variety of rooms to suit your needs, from standard to luxury suites. Please let us know your dates, and we can check availability for you.";

    // Inquiry about check-in/out times
    } else if (lowerMessage.includes("check-in") || lowerMessage.includes("check out")) {
        return "Our standard check-in time is from 2:00 PM, and check-out is by 12:00 PM. Let us know if you need special arrangements.";

    // Special requests
    } else if (lowerMessage.includes("special request") || lowerMessage.includes("extra bed") || lowerMessage.includes("room service")) {
        return "Feel free to mention any special requests like extra beds, room service, dietary preferences, or early check-ins. We will do our best to accommodate them.";

    // Location-related inquiry
    } else if (lowerMessage.includes("location") || lowerMessage.includes("address")) {
        return "Bhatiya Hotel is located at [Hotel Address]. It's easily accessible from the airport and main attractions. Let us know if you need directions or transportation assistance.";

    // Weather-related inquiries
    } else if (lowerMessage.includes("weather") || lowerMessage.includes("forecast")) {
        return "To check the current weather in our area, you can look it up online or let us know your plans, and we can suggest some weather-friendly activities!";

    // Inquiry about dining options
    } else if (lowerMessage.includes("restaurant") || lowerMessage.includes("dining")) {
        return "Our hotel features an exquisite restaurant offering both local and international cuisine. Would you like to see the menu or make a reservation?";
    
    // Inquiry about events or meetings
    } else if (lowerMessage.includes("event") || lowerMessage.includes("meeting")) {
        return "AP Hotel provides excellent facilities for events, conferences, and meetings. Let us know your requirements, and we'll help you plan your event with ease.";
    
    // Inquiry about parking
    } else if (lowerMessage.includes("parking") || lowerMessage.includes("car park")) {
        return "We offer complimentary parking for all guests during their stay. Valet services are also available upon request.";

    // Inquiry about pet policy
    } else if (lowerMessage.includes("pets") || lowerMessage.includes("pet policy")) {
        return "Bhatiya Hotel is a pet-friendly hotel! You are welcome to bring your furry companions with you. Please inform us ahead of time so we can ensure a comfortable stay for your pets.";

    // Special promotions or discounts
    } else if (lowerMessage.includes("offer") || lowerMessage.includes("discount")) {
        return "We periodically have special offers and discounts. Please subscribe to our newsletter or contact us for information on current promotions.";

    // Health and safety protocols
    } else if (lowerMessage.includes("safety") || lowerMessage.includes("health")) {
        return "The health and safety of our guests is our top priority. We follow strict hygiene and safety protocols, including regular sanitization, social distancing, and contactless check-ins.";

    // Goodbye message
    } else if (lowerMessage.includes("goodbye") || lowerMessage.includes("bye")) {
        return "Thank you for choosing Bhatiya Hotel! We hope to see you soon. Have a wonderful day ahead! 😊";

    // Generic response for unrecognized inquiries
    } else {
        return "I'm here to help with your stay at Bhatiya Hotel! Ask about rooms, prices, amenities, or anything else.";
    }
}

        </script>
    <script>
    // JavaScript for hamburger toggle menu
    document.addEventListener("DOMContentLoaded", function () {
        const hamburger = document.getElementById('hamburger');
        const menu = document.querySelector('.menu');
        
        hamburger.addEventListener('click', function() {
            menu.classList.toggle('active');
        });
    });
</script>

    <style>
      .pop:hover{
        border-top-color:green !important;
        transform:scale(1.03);
        transition;all 0.2s;
      }
      .custom-bg{
    background-color: #002a80
  }
  .custom-bg:hover{
    background-color:#279e8c;
  }
      </style>
</head>

<body class="bg-light">

<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font ">Contact Us</h2>

<div class="row">
  <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3">
    <iframe class="w-100" height="550" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119505.39811792604!2d72.84759121170063!3d20.606684229824584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0e8208249a6cf%3A0xf6b629fd4c95a813!2sValsad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1725515417990!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="col-lg-4 col-md-4">
    <div class="bg-white p-4 rounded mb-4">
      <h5>Call Us</h5>
      <a href="tel:+919408084033" class="d-block mb-2 text-decoration-none text-dark">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
        </svg> +919408084033
      </a>
    </div>
    <div class="bg-white p-4 rounded mb-4">
      <h5>Follow Us</h5>
      <a href="#" class="d-inline-block mb-3">
        <span class="badge bg-light text-dark fs-6">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
          </svg> Twitter
        </span>
      </a>
      <a href="#" class="d-inline-block mb-3">
        <span class="badge bg-light text-dark fs-6">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
          </svg> Facebook
        </span>
      </a>
      <a href="#" class="d-inline-block mb-3">
        <span class="badge bg-light text-dark fs-6">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
          </svg> Instagram
        </span>
      </a>
      
      
      <!--<br>
      <form id="login-form" action="./api/contact us.php" method="POST">
  <h5> Send a Message</h5>
   <div class="mb-3">
            <label  class="form-label" style="font-weight:500;">Name</label>
            <input name="name"required type="text" class="form-control" id="register-name" placeholder="Enter your name" required>
          </div>
          <div class="mb-3">
            <label  class="form-label" style="font-weight:500;">Email</label>
            <input   name="email" required type="text" class="form-control" id="register-name" placeholder="Enter your Email ID" required>
          </div>
          <div class="mb-3">
            <label  class="form-label "style="font-weight:500;">Number</label>
            <input  name="subject"required  type="text" class="form-control" id="register-name" placeholder="Enter your number" required>
          </div>
          <div class="mb-3">
            <label class="form-label"style="font-weight:500;">Message</label>
            <textarea name="message" required class="form-control shadow-none" rows="1" style="resize:none;" placeholder="Enter your Inquiry/Message"></textarea>
          </div>
          <button type="submit" name="send" class="btn text-white custom-bg mt-3 ">Send</button>
      </form>-->
    </div>
  </div>
</div>

<div class="container-fluid mt-5 bg-white">
  <div class="row">
    <div class="col-lg-4 p-4 text-center">
      <h3> Bhatiya hotel </h3>
    </div>
    <div class="col-lg-4 p-4">
      <h5>Links</h5>
                <a href="./Home.php" class="d-block mb-2 text-dark text-decoration-none">Home</a>
                <a href="Routes/rooms.php" class="d-block mb-2 text-dark text-decoration-none">Rooms</a>
                <a href="Routes/facilities.php" class="d-block mb-2 text-dark text-decoration-none">Facilities</a>
                <a href="Routes/contact us.php" class="d-block mb-2 text-dark text-decoration-none">Contact Us</a>
                <a href="Routes/Aboutus.php" class="d-block mb-2 text-dark text-decoration-none">About Us</a>
    </div>
    <div class="col-lg-4 p-4">
      <h5 class="mb-3">follow us</h5>
      <a href="#" class="d-inline-block mb-3">
        <span class="badge bg-light text-dark fs-6">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
          </svg> Twitter
        </span>
      </a>
      <br>
      <a href="#" class="d-inline-block mb-3">
      <span class="badge bg-light text-dark fs-6">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
          </svg> Facebook
        </span>
      </a>
      <br>
      <a href="#" class="d-inline-block mb-3">
        <span class="badge bg-light text-dark fs-6">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
          </svg> Instagram
        </span>
      </a>
    </div>
  </div> 
</div>
<h3 class="text-center text-white p-3 m-0" style="background-color: #002a80;">
    © Developer by Bhatiya Groups 2025
</h3>    
</body>

</html>