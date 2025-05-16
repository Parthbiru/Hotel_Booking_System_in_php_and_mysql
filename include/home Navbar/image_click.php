<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive City Card</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>

    /* styles.css */
body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 50px;
}

#search-bar {
    width: 300px;
    padding: 10px;
    font-size: 16px;
    margin-bottom: 20px;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.card {
    display: inline-block;
    padding: 20px;
    margin-top: 20px;
    border: 2px solid #ddd;
    border-radius: 8px;
    text-align: center;
}

.city-image {
    width: 150px;
    height: 150px;
    cursor: pointer;
    object-fit: cover;
}

#dates {
    margin-top: 20px;
}

#today-date, #next-day-date {
    font-size: 18px;
    font-weight: bold;
}

    </style>
<body>
    

    <!-- Search Bar -->
    <input type="text" id="search-bar" placeholder="Search City..." readonly>

    <!-- Card -->
    <div class="card">
        <img src="delhi-image.jpg" alt="Delhi" class="city-image" onclick="updateSearch('Delhi')">
        <p>Delhi</p>
    </div>

    <div id="dates">
        <p id="today-date"></p>
        <p id="next-day-date"></p>
    </div>

    <script >
        // script.js
function updateSearch(city) {
    // Set the value in the search bar
    document.getElementById('search-bar').value = city;
    
    // Get today's date and next day's date
    const today = new Date();
    const nextDay = new Date(today);
    nextDay.setDate(today.getDate() + 1);

    // Format the dates to "MM/DD/YYYY"
    const todayFormatted = formatDate(today);
    const nextDayFormatted = formatDate(nextDay);

    // Display the dates
    document.getElementById('today-date').innerText = `Today: ${todayFormatted}`;
    document.getElementById('next-day-date').innerText = `Next Day: ${nextDayFormatted}`;
}

function formatDate(date) {
    const month = date.getMonth() + 1; // Month is 0-based, so add 1
    const day = date.getDate();
    const year = date.getFullYear();
    return `${month}/${day}/${year}`;
}

    </script>
</body>
</html>
