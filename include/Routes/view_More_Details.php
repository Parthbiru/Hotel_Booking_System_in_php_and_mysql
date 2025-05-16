<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View_More_Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 20px;
        }

        .destination-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
        }

        .destination-list button {
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .destination-list button:hover {
            background-color: #004494;
        }

        .destination-details-container {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            display: none; 
        }

        .destination-details-container.active {
            display: block; 
        }

        .package-details {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .tier-pricing {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .tier {
            flex: 1;
            padding: 15px;
            background-color: #f1f1f1;
            border-radius: 8px;
            text-align: center;
        }

        .tier h4 {
            margin: 0;
            font-size: 18px;
            color: #0056b3;
        }
        h4{
            padding-top:16px;
            text-align:center;
        }

        .tier p {
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        }

        .tier .price {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #004494;
        }

        .whatsapp-button {
            background-color: #25D366;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .whatsapp-button:hover {
            background-color: #128C7E;
        }

        /* Chatbot Styles */
        .chatbot-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .chatbot-header {
            background-color: #0056b3;
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
            padding: 10px;
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
            background-color: #0056b3;
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
            background-color: #0056b3;
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
        .button-container {
        display: flex; 
        justify-content: center; 
        align-items: center; 
         height: 100px; 
        }
        .download-btn {
         display: block;
        }
    </style>
</head>
<body>
<?php include '../../include/home Navbar/navbar.php'; ?> 

    <div class="container">
        <h1>Explore Our Tour Packages</h1>

        <div class="destination-list">
            <button onclick="showDestination('goa')">Goa</button>
            <button onclick="showDestination('ooty')">Ooty</button>
            <button onclick="showDestination('mumbai')">Mumbai</button>
            <button onclick="showDestination('delhi')">New Delhi</button>
            <button onclick="showDestination('bangalore')">Bangalore</button>
            <button onclick="showDestination('munnar')">Munnar</button>
            <button onclick="showDestination('rishikesh')">Rishikesh</button>
            <button onclick="showDestination('north-goa')">North Goa</button>
            <button onclick="showDestination('manali')">Manali</button>
            <button onclick="showDestination('agra')">Agra</button>
            <button onclick="showDestination('amritsar')">Amritsar</button>

        </div>

        
       <!-- <div id="goa" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day Goa Tour Package</h2>
                <p>Embark on a mesmerizing 7-day adventure through Goa, exploring beautiful beaches, historical landmarks, and vibrant local markets. Our package includes guided tours, accommodations, and transportation.</p>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in Goa - Relax and unwind on Baga Beach</li>
                    <li><strong>Day 2:</strong> Visit Fort Aguada and enjoy a sunset cruise</li>
                    <li><strong>Day 3:</strong> Explore Basilica of Bom Jesus and Se Cathedral</li>
                    <li><strong>Day 4:</strong> Visit Anjuna Market and Vagator Beach</li>
                    <li><strong>Day 5:</strong> Enjoy a day trip to Dudhsagar Waterfalls</li>
                    <li><strong>Day 6:</strong> Discover the vibrant local culture in Panjim</li>
                    <li><strong>Day 7:</strong> Departure from Goa</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹4500</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹6000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹9000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>

                <h4>Contact Us: 9408084033</h4>
            </div>
        </div>

        <div id="ooty" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day Ooty Tour Package</h2>
                <p>Experience the serene beauty of Ooty, known as the "Queen of Hill Stations." This package includes visits to lush tea gardens, scenic viewpoints, and tranquil lakes. Enjoy guided tours, comfortable accommodations, and transportation.</p>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in Ooty - Relax at Ooty Lake</li>
                    <li><strong>Day 2:</strong> Visit Doddabetta Peak and Botanical Gardens</li>
                    <li><strong>Day 3:</strong> Explore Tea Gardens and Tea Museum</li>
                    <li><strong>Day 4:</strong> Trip to Pykara Lake and Waterfalls</li>
                    <li><strong>Day 5:</strong> Visit Rose Garden and Wax Museum</li>
                    <li><strong>Day 6:</strong> Explore Coonoor and Sim's Park</li>
                    <li><strong>Day 7:</strong> Departure from Ooty</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹5000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹7000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹10000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>

                <h4>Contact Us: 9408084033</h4>
            </div>
        </div>!-->

        <div id="goa" class="destination-details-container">
    <div class="package-details">
        <h2>7-Day Goa Tour Package</h2>
        <p>Embark on a mesmerizing 7-day adventure through Goa, exploring beautiful beaches, historical landmarks, and vibrant local markets. Our package includes guided tours, accommodations, and transportation.</p>
        <h5>The price displayed is per person:-</h5>
        <h3>Itinerary Overview:</h3>
        <ul>
            <li><strong>Day 1:</strong> Arrival in Goa - Relax and unwind on Baga Beach</li>
            <li><strong>Day 2:</strong> Visit Fort Aguada and enjoy a sunset cruise</li>
            <li><strong>Day 3:</strong> Explore Basilica of Bom Jesus and Se Cathedral</li>
            <li><strong>Day 4:</strong> Visit Anjuna Market and Vagator Beach</li>
            <li><strong>Day 5:</strong> Enjoy a day trip to Dudhsagar Waterfalls</li>
            <li><strong>Day 6:</strong> Discover the vibrant local culture in Panjim</li>
            <li><strong>Day 7:</strong> Departure from Goa</li>
        </ul>

        <div class="tier-pricing">
            <div class="tier">
                <h4>Basic</h4>
                <p>Standard accommodations, shared transportation, and basic meals.</p>
                <p class="price">₹4500</p>
                <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
            </div>
            <div class="tier">
                <h4>Standard</h4>
                <p>Mid-range accommodations, private transportation, and all meals.</p>
                <p class="price">₹6000</p>
                <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
            </div>
            <div class="tier">
                <h4>Premium</h4>
                <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                <p class="price">₹9000</p>
                <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
            </div>
        </div>

        <h4>Contact Us: 9408084033</h4>
        <div class="button-container">
         <button class="download-btn" onclick="downloadPackage('goa')">Download Goa Package Details</button>
        </div>

    </div>
</div>

<div id="ooty" class="destination-details-container">
    <div class="package-details">
        <h2>7-Day Ooty Tour Package</h2>
        <p>Experience the serene beauty of Ooty, known as the "Queen of Hill Stations." This package includes visits to lush tea gardens, scenic viewpoints, and tranquil lakes. Enjoy guided tours, comfortable accommodations, and transportation.</p>
        <h5>The price displayed is per person:-</h5>
        <h3>Itinerary Overview:</h3>
        <ul>
            <li><strong>Day 1:</strong> Arrival in Ooty - Relax at Ooty Lake</li>
            <li><strong>Day 2:</strong> Visit Doddabetta Peak and Botanical Gardens</li>
            <li><strong>Day 3:</strong> Explore Tea Gardens and Tea Museum</li>
            <li><strong>Day 4:</strong> Trip to Pykara Lake and Waterfalls</li>
            <li><strong>Day 5:</strong> Visit Rose Garden and Wax Museum</li>
            <li><strong>Day 6:</strong> Explore Coonoor and Sim's Park</li>
            <li><strong>Day 7:</strong> Departure from Ooty</li>
        </ul>

        <div class="tier-pricing">
            <div class="tier">
                <h4>Basic</h4>
                <p>Standard accommodations, shared transportation, and basic meals.</p>
                <p class="price">₹5000</p>
                <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
            </div>
            <div class="tier">
                <h4>Standard</h4>
                <p>Mid-range accommodations, private transportation, and all meals.</p>
                <p class="price">₹7000</p>
                <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
            </div>
            <div class="tier">
                <h4>Premium</h4>
                <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                <p class="price">₹10000</p>
                <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
            </div>
        </div>

        <h4>Contact Us: 9408084033</h4>
        <div class="button-container">
         <button class="download-btn" onclick="downloadPackage('OOty')">Download Ooty Package Details</button>
        </div>
    </div>
</div>

    <script>
      function downloadPackage(packageId) {
    const packageElement = document.getElementById(packageId);
    const packageName = packageElement.querySelector("h2").innerText;
    const packageDescription = packageElement.querySelector("p").innerText;
    const itineraryItems = Array.from(packageElement.querySelectorAll("ul li")).map(li => li.innerText);
    const pricingTiers = Array.from(packageElement.querySelectorAll(".tier")).map(tier => {
        return {
            name: tier.querySelector("h4").innerText,
            description: tier.querySelector("p").innerText,
            price: tier.querySelector(".price").innerText
        };
    });
    const contactInfo = "Phone Number: 9408084033"; 

    // Create CSV content
    let csvContent = "data:text/csv;charset=utf-8,";

    csvContent += `Package Name,${packageName}\n`;
    csvContent += `Description,${packageDescription}\n\n`;

    csvContent += "Itinerary\n";
    csvContent += "Day,Activity\n";
    itineraryItems.forEach(item => {
        const [day, activity] = item.split(":");
        csvContent += `${day.trim()},${activity.trim()}\n`;
    });
    csvContent += "\n";

    csvContent += "Pricing Tiers\n";
    csvContent += "Tier Name,Description,Price\n";
    pricingTiers.forEach(tier => {
        csvContent += `${tier.name},${tier.description},${tier.price}\n`;
    });
    csvContent += "\n";

    csvContent += "Contact Information\n";
    csvContent += `${contactInfo}\n`; 

    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", `${packageId}_package_details.csv`);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

    </script>



        <div id="mumbai" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day Mumbai Tour Package</h2>
                <p>Discover the vibrant city of Mumbai, from its iconic landmarks to its bustling markets. This package includes guided tours, accommodations, and transportation.</p>
                <h5>The price displayed is per person:-</h5>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in Mumbai - Visit Gateway of India and Marine Drive</li>
                    <li><strong>Day 2:</strong> Explore Elephanta Caves and Chhatrapati Shivaji Maharaj Terminus</li>
                    <li><strong>Day 3:</strong> Visit Siddhivinayak Temple and Haji Ali Dargah</li>
                    <li><strong>Day 4:</strong> Explore Bandra-Worli Sea Link and Juhu Beach</li>
                    <li><strong>Day 5:</strong> Trip to Sanjay Gandhi National Park</li>
                    <li><strong>Day 6:</strong> Discover Crawford Market and Colaba Causeway</li>
                    <li><strong>Day 7:</strong> Departure from Mumbai</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹5500</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹7500</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹11000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>
                 <div class="button-container">
                 <button class="download-btn" onclick="downloadPackage('mumbai')">Download Mumbai Package Details</button>
                 </div>
                <h4>Contact Us: 9408084033</h4>
            </div>
        </div>

        <div id="delhi" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day New Delhi Tour Package</h2>
                <p>Experience the rich history and culture of India's capital city. This package includes visits to historical monuments, bustling markets, and cultural landmarks. Enjoy guided tours, accommodations, and transportation.</p>
                <h5>The price displayed is per person:-</h5>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in Delhi - Visit India Gate and Rashtrapati Bhavan</li>
                    <li><strong>Day 2:</strong> Explore Red Fort and Jama Masjid</li>
                    <li><strong>Day 3:</strong> Visit Qutub Minar and Lotus Temple</li>
                    <li><strong>Day 4:</strong> Trip to Akshardham Temple and Humayun's Tomb</li>
                    <li><strong>Day 5:</strong> Explore Chandni Chowk and Connaught Place</li>
                    <li><strong>Day 6:</strong> Visit National Museum and Raj Ghat</li>
                    <li><strong>Day 7:</strong> Departure from Delhi</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹6000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹8000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹12000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>

                <h4>Contact Us: 9408084033</h4>
                <div class="button-container">
                  <button class="download-btn" onclick="downloadPackage('delhi')">Download delhi Package Details</button>
                </div>

            </div>
        </div>

        <div id="bangalore" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day Bangalore Tour Package</h2>
                <p>Discover the vibrant city of Bangalore, known for its gardens, tech hubs, and cultural landmarks. This package includes guided tours, accommodations, and transportation.</p>
                <h5>The price displayed is per person:-</h5>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in Bangalore - Visit Lalbagh Botanical Garden</li>
                    <li><strong>Day 2:</strong> Explore Cubbon Park and Vidhana Soudha</li>
                    <li><strong>Day 3:</strong> Visit Bangalore Palace and ISKCON Temple</li>
                    <li><strong>Day 4:</strong> Trip to Bannerghatta National Park</li>
                    <li><strong>Day 5:</strong> Explore Wonderla Amusement Park</li>
                    <li><strong>Day 6:</strong> Visit UB City and Commercial Street</li>
                    <li><strong>Day 7:</strong> Departure from Bangalore</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹5000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹7000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹10000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>
                <h4>Contact Us: 9408084033</h4>
                <div class="button-container">
                 <button class="download-btn" onclick="downloadPackage('bangalore')">Download Bangalore Package Details</button>
                 </div>

            </div>
        </div>

        <div id="munnar" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day Munnar Tour Package</h2>
                <p>Experience the breathtaking beauty of Munnar, known for its tea plantations, waterfalls, and scenic landscapes. This package includes guided tours, accommodations, and transportation.</p>
                <h5>The price displayed is per person:-</h5>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in Munnar - Visit Mattupetty Dam</li>
                    <li><strong>Day 2:</strong> Explore Eravikulam National Park</li>
                    <li><strong>Day 3:</strong> Visit Tea Museum and Tea Gardens</li>
                    <li><strong>Day 4:</strong> Trip to Anamudi Peak and Kundala Lake</li>
                    <li><strong>Day 5:</strong> Explore Attukal Waterfalls and Pothamedu Viewpoint</li>
                    <li><strong>Day 6:</strong> Visit Blossom Park and Echo Point</li>
                    <li><strong>Day 7:</strong> Departure from Munnar</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹5500</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹7500</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹11000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>

                <h4>Contact Us: 9408084033</h4>
                <div class="button-container">
                 <button class="download-btn" onclick="downloadPackage('munnar')">Download Munnar Package Details</button>
                 </div>
            </div>
        </div>

        <div id="rishikesh" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day Rishikesh Tour Package</h2>
                <p>Experience the spiritual and adventurous side of Rishikesh, known for its yoga retreats, temples, and river rafting. This package includes guided tours, accommodations, and transportation.</p>
                <h5>The price displayed is per person:-</h5>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in Rishikesh - Visit Triveni Ghat</li>
                    <li><strong>Day 2:</strong> Explore Laxman Jhula and Ram Jhula</li>
                    <li><strong>Day 3:</strong> Visit Neelkanth Mahadev Temple</li>
                    <li><strong>Day 4:</strong> Enjoy River Rafting on the Ganges</li>
                    <li><strong>Day 5:</strong> Explore Beatles Ashram and Parmarth Niketan</li>
                    <li><strong>Day 6:</strong> Visit Kunjapuri Temple for Sunrise</li>
                    <li><strong>Day 7:</strong> Departure from Rishikesh</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹4500</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹6500</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹9500</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>

                <h4>Contact Us: 9408084033</h4>
                <div class="button-container">
                <button class="download-btn" onclick="downloadPackage('rishikesh')">Download Rishikesh Package Details</button>
                </div>
            </div>
        </div>

        <div id="north-goa" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day North Goa Tour Package</h2>
                <p>Discover the vibrant beaches, nightlife, and cultural landmarks of North Goa. This package includes guided tours, accommodations, and transportation.</p>
                <h5>The price displayed is per person:-</h5>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in North Goa - Relax at Calangute Beach</li>
                    <li><strong>Day 2:</strong> Visit Fort Aguada and Sinquerim Beach</li>
                    <li><strong>Day 3:</strong> Explore Anjuna Beach and Vagator Beach</li>
                    <li><strong>Day 4:</strong> Trip to Chapora Fort and Baga Beach</li>
                    <li><strong>Day 5:</strong> Visit Mapusa Market and Saturday Night Market</li>
                    <li><strong>Day 6:</strong> Explore Morjim Beach and Ashwem Beach</li>
                    <li><strong>Day 7:</strong> Departure from North Goa</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹5000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹7000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹10000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>

                <h4>Contact Us: 9408084033</h4>
                <div class="button-container">
                 <button class="download-btn" onclick="downloadPackage('north-goa')">Download North-Goa Package Details</button>
                </div>

            </div>
        </div>

        <div id="manali" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day Manali Tour Package</h2>
                <p>Experience the serene beauty of Manali, known for its snow-capped mountains, lush valleys, and adventure activities. This package includes guided tours, accommodations, and transportation.</p>
                <h5>The price displayed is per person:-</h5>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in Manali - Visit Hadimba Temple</li>
                    <li><strong>Day 2:</strong> Explore Solang Valley and Rohtang Pass</li>
                    <li><strong>Day 3:</strong> Visit Manu Temple and Vashisht Hot Springs</li>
                    <li><strong>Day 4:</strong> Trip to Jogini Waterfall and Old Manali</li>
                    <li><strong>Day 5:</strong> Explore Naggar Castle and Art Gallery</li>
                    <li><strong>Day 6:</strong> Visit Great Himalayan National Park</li>
                    <li><strong>Day 7:</strong> Departure from Manali</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹6000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹8000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹12000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>

                <h4>Contact Us: 9408084033</h4>
                <div class="button-container">
                 <button class="download-btn" onclick="downloadPackage('manali')">Download Manali Package Details</button>
                 </div>
            </div>
        </div>

        <div id="agra" class="destination-details-container">
            <div class="package-details">
                <h2>7-Day Agra Tour Package</h2>
                <p>Discover the iconic landmarks of Agra, including the Taj Mahal, Agra Fort, and Fatehpur Sikri. This package includes guided tours, accommodations, and transportation.</p>
                <h5>The price displayed is per person:-</h5>
                <h3>Itinerary Overview:</h3>
                <ul>
                    <li><strong>Day 1:</strong> Arrival in Agra - Visit Taj Mahal</li>
                    <li><strong>Day 2:</strong> Explore Agra Fort and Mehtab Bagh</li>
                    <li><strong>Day 3:</strong> Visit Fatehpur Sikri and Buland Darwaza</li>
                    <li><strong>Day 4:</strong> Trip to Itmad-ud-Daulah's Tomb and Chini Ka Rauza</li>
                    <li><strong>Day 5:</strong> Explore Jama Masjid and Kinari Bazaar</li>
                    <li><strong>Day 6:</strong> Visit Sikandra and Akbar's Tomb</li>
                    <li><strong>Day 7:</strong> Departure from Agra</li>
                </ul>

                <div class="tier-pricing">
                    <div class="tier">
                        <h4>Basic</h4>
                        <p>Standard accommodations, shared transportation, and basic meals.</p>
                        <p class="price">₹5000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Standard</h4>
                        <p>Mid-range accommodations, private transportation, and all meals.</p>
                        <p class="price">₹7000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                    <div class="tier">
                        <h4>Premium</h4>
                        <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                        <p class="price">₹10000</p>
                        <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
                    </div>
                </div>

                <h4>Contact Us: 9408084033</h4>
                <div class="button-container">
                <button class="download-btn" onclick="downloadPackage('agra')">Download Agra Package Details</button>
                </div>
            </div>
        </div>
        <div id="amritsar" class="destination-details-container">
    <div class="package-details">
        <h2>7-Day Harminder Sahib (Amritsar) Tour Package</h2>
        <p>Embark on a captivating 7-day journey through Harminder Sahib (Amritsar), exploring spiritual sites, historical landmarks, and vibrant local culture. Our package includes guided tours, accommodations, and transportation.</p>
        <h5>The price displayed is per person:-</h5>
        <h3>Itinerary Overview:</h3>
        <ul>
            <li><strong>Day 1:</strong> Arrival in Amritsar - Visit the Golden Temple (Harminder Sahib) and explore the surrounding areas</li>
            <li><strong>Day 2:</strong> Visit Jallianwala Bagh and the Partition Museum</li>
            <li><strong>Day 3:</strong> Explore the historic Wagah Border and witness the Beating Retreat ceremony</li>
            <li><strong>Day 4:</strong> Visit the Durgiana Temple and the Maharaja Ranjit Singh Panorama</li>
            <li><strong>Day 5:</strong> Day trip to Harike Wetland and Bird Sanctuary</li>
            <li><strong>Day 6:</strong> Discover the local markets and taste traditional Amritsari cuisine</li>
            <li><strong>Day 7:</strong> Departure from Amritsar</li>
        </ul>

        <div class="tier-pricing">
            <div class="tier">
                <h4>Basic</h4>
                <p>Standard accommodations, shared transportation, and basic meals.</p>
                <p class="price">₹4500</p>
                <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
            </div>
            <div class="tier">
                <h4>Standard</h4>
                <p>Mid-range accommodations, private transportation, and all meals.</p>
                <p class="price">₹6000</p>
                <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
            </div>
            <div class="tier">
                <h4>Premium</h4>
                <p>Luxury accommodations, private transfers, and exclusive experiences.</p>
                <p class="price">₹9000</p>
                <a href="../../include/tour package/tour package booking.php" class="btn">Book Now</a>
            </div>
        </div>

        <h4>Contact Us: 9408084033</h4>
        <div class="button-container">
         <button class="download-btn" onclick="downloadPackage('amritsar')">Download Amritsar(Harminder Sahib) Package Details</button>
        </div>
    </div>
</div>


        <div style="text-align: center; margin-top: 30px;">
            <p>Need assistance?</p>
            <a href="https://wa.me/+919408084033?text=How%20can%20I%20help%20you%3F" class="whatsapp-button" target="_blank">
                Chat with Us
            </a>
        </div>
    </div>

    <button class="chatbot-toggle" onclick="toggleChatbot()">💬</button>

    <div class="chatbot-container" id="chatbotContainer">
        <div class="chatbot-header">
            Tour Package Assistant
        </div>
        <div class="chatbot-body" id="chatbotBody">
            <div class="message bot">
                <span>Hi! How can I help you today? 😊😊</span>
            </div>
        </div>
        <div class="chatbot-footer">
            <input type="text" id="chatbotInput" placeholder="Type your question...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        function showDestination(destinationId) {
            const allDestinations = document.querySelectorAll('.destination-details-container');
            allDestinations.forEach(destination => {
                destination.classList.remove('active');
            });

            const selectedDestination = document.getElementById(destinationId);
            if (selectedDestination) {
                selectedDestination.classList.add('active');
            }
        }

        const today = new Date();
        const month = today.getMonth() + 1; 

        // Define peak and off-season months
        const peakSeasonMonths = [11, 12, 1, 2, 3]; 
        const isPeakSeason = peakSeasonMonths.includes(month);

        // Adjust prices based on season
        const basicPrice = document.querySelector('.tier-pricing .tier:nth-child(1) .price');
        const standardPrice = document.querySelector('.tier-pricing .tier:nth-child(2) .price');
        const premiumPrice = document.querySelector('.tier-pricing .tier:nth-child(3) .price');

        if (isPeakSeason) {
            // Increase prices by 20% during peak season
            basicPrice.textContent = `₹${Math.round(4500 * 1.2)}`;
            standardPrice.textContent = `₹${Math.round(6000 * 1.2)}`;
            premiumPrice.textContent = `₹${Math.round(9000 * 1.2)}`;
        } else {
            // Keep original prices during off-season
            basicPrice.textContent = "₹4500";
            standardPrice.textContent = "₹6000";
            premiumPrice.textContent = "₹9000";
        }

        function toggleChatbot() {
            const chatbotContainer = document.getElementById("chatbotContainer");
            chatbotContainer.style.display = chatbotContainer.style.display === "block" ? "none" : "block";
        }

        function sendMessage() {
            const input = document.getElementById("chatbotInput");
            const message = input.value.trim();
            if (message === "") return;

            const chatbotBody = document.getElementById("chatbotBody");
            chatbotBody.innerHTML += `<div class="message user"><span>${message}</span></div>`;

            input.value = "";

            const response = getBotResponse(message);
            chatbotBody.innerHTML += `<div class="message bot"><span>${response}</span></div>`;

            chatbotBody.scrollTop = chatbotBody.scrollHeight;
        }

        /*function getBotResponse(message) {
            const lowerMessage = message.toLowerCase();

            if (lowerMessage.includes("price")) {
                return "Our packages start at ₹4500 for Basic, ₹6000 for Standard, and ₹9000 for Premium. Prices may vary during peak season.";
            } else if (lowerMessage.includes("accommodation")) {
                return "Basic packages include standard accommodations, while Premium packages offer luxury stays.";
            } else if (lowerMessage.includes("transport")) {
                return "Transportation is included in all packages. Basic uses shared transport, while Premium offers private transfers.";
            } else if (lowerMessage.includes("contact")) {
                return "You can contact us at 9408084033 or click the WhatsApp button for instant assistance.";
            } else if (lowerMessage.includes("season")) {
                return "Peak season is from November to March. Prices are 20% higher during this period.";
            } else {
                return "I'm here to help! Please ask about prices, accommodations, transport, or contact details.";
            }
        }*/

        function getBotResponse(message) {
    const lowerMessage = message.toLowerCase();

    if (lowerMessage.includes("price") || lowerMessage.includes("cost")) {
        return "Our packages start at ₹4500 for Basic, ₹6000 for Standard, and ₹9000 for Premium. Prices may vary during peak season (November to March).";
    } else if (lowerMessage.includes("accommodation") || lowerMessage.includes("stay")) {
        return "Basic packages include standard accommodations, while Premium packages offer luxury stays. All accommodations are carefully selected for comfort and convenience.";
    } else if (lowerMessage.includes("transport") || lowerMessage.includes("travel")) {
        return "Transportation is included in all packages. Basic uses shared transport, while Premium offers private transfers for a more personalized experience.";
    } else if (lowerMessage.includes("contact") || lowerMessage.includes("help")) {
        return "You can contact us at 9408084033 or click the WhatsApp button for instant assistance. We're here to help!";
    } else if (lowerMessage.includes("season") || lowerMessage.includes("peak")) {
        return "Peak season is from November to March. During this period, prices are 20% higher due to increased demand.";
    } else if (lowerMessage.includes("itinerary") || lowerMessage.includes("schedule")) {
        return "Each tour package includes a detailed itinerary. You can view the day-by-day schedule for each destination on the respective package details page.";
    } else if (lowerMessage.includes("meal") || lowerMessage.includes("food")) {
        return "Meals are included in all packages. Basic packages include breakfast, while Standard and Premium packages include all meals (breakfast, lunch, and dinner).";
    } else if (lowerMessage.includes("duration") || lowerMessage.includes("length")) {
        return "Our tour packages are typically 7 days long, but custom durations can be arranged upon request.";
    } else if (lowerMessage.includes("booking") || lowerMessage.includes("reserve")) {
        return "To book a package, click the 'Book Now' button on the package details page. You can also contact us directly for assistance.";
    } else if (lowerMessage.includes("payment") || lowerMessage.includes("pay")) {
        return "We accept multiple payment methods, including credit/debit cards, net banking, and UPI. Payment details will be provided during the booking process.";
    } else if (lowerMessage.includes("cancel") || lowerMessage.includes("refund")) {
        return "Our cancellation policy allows for refunds up to 7 days before the tour start date. Please contact us for more details.";
    } else if (lowerMessage.includes("group") || lowerMessage.includes("private")) {
        return "We offer both group and private tours. Group tours are more economical, while private tours provide a personalized experience.";
    } else if (lowerMessage.includes("child") || lowerMessage.includes("kid")) {
        return "Children under 5 years old can join for free. For children aged 5-12, we offer a 50% discount on the package price.";
    } else if (lowerMessage.includes("discount") || lowerMessage.includes("offer")) {
        return "We occasionally run special discounts and offers. Follow us on social media or subscribe to our newsletter to stay updated!";
    } else if (lowerMessage.includes("weather") || lowerMessage.includes("climate")) {
        return "The weather varies by destination. For example, Goa is warm year-round, while Manali is cooler, especially in winter. Check the forecast before your trip!";
    } else if (lowerMessage.includes("guide") || lowerMessage.includes("tour guide")) {
        return "All our packages include professional tour guides who are knowledgeable about the local culture, history, and attractions.";
    } else if (lowerMessage.includes("custom") || lowerMessage.includes("personalize")) {
        return "We can customize packages to suit your preferences. Contact us directly to discuss your requirements.";
    } else if (lowerMessage.includes("thank you") || lowerMessage.includes("thanks")) {
        return "You're welcome! 😊 Let me know if you have any more questions.";
    } else if (lowerMessage.includes("hi") || lowerMessage.includes("hello")) {
        return "Hello! 😊 How can I assist you today?";
    } else {
        return "I'm here to help! Please ask about guide,custom,prices, accommodations, transport, itineraries,Meal,duration,booking,payment,cancel,child,weather or anything else related to our tour packages.";
    }
}
    </script>
</body>
<?php include '../../include/home Navbar/Footer.php'; ?>

</html>