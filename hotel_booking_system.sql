-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 04:42 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'Anmol', '123');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pending','Active') DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `number`, `message`, `created_at`, `status`) VALUES
(1, 'Anmol Bhatiya', 'Anmol@gmail.com', '8200050985', 'hh', '2025-03-05 06:06:47', 'Active'),
(2, 'Anmol Bhatiya', 'Anmol@gmail.com', '8200050985', 'gg', '2025-03-05 06:07:44', 'Pending'),
(3, 'Anmol Bhatiya', 'Anmol@gmail.com', '8200050985', 'good', '2025-03-05 06:13:09', 'Pending'),
(4, 'Anmol Bhatiya', 'Anmol@gmail.com', '8200050985', 'good', '2025-03-05 06:13:17', 'Active'),
(5, 'Anmol Bhatiya', 'Anmol@gmail.com', '8200050985', 'h', '2025-03-05 06:18:11', 'Active'),
(6, 'Anmol Bhatiya', 'Anmol@gmail.com', '8200050985', 'nbv', '2025-03-05 06:37:57', 'Pending'),
(9, 'anmol', 'anmol@gmil.com', '9408084033', 'package', '2025-03-16 08:15:01', 'Pending'),
(10, 'Anmol Bhatiya', '22702anmolsinghbhatiya@gmail.com', '9408084033', 'price package', '2025-03-16 08:17:00', 'Pending'),
(14, 'Anmol Bhatiya', '22702anmolsinghbhatiya@gmail.com', '9408084033', 'booking', '2025-03-16 08:29:22', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `employees_register`
--

CREATE TABLE `employees_register` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `job_title` enum('Manager','Assistant Manager','Accountant','HR','Driver','Training Staff','Housekeeping') NOT NULL,
  `joining_date` date NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees_register`
--

INSERT INTO `employees_register` (`id`, `emp_id`, `name`, `surname`, `address`, `salary`, `job_title`, `joining_date`, `password`) VALUES
(9, '3', 'Om', 'patel', 'valsad', '80000.00', 'HR', '2025-03-10', '$2y$10$pnwuHVZp.II3X8Ks4Tov7Oo/JQ.DGVMJfiHqvQhC9D9D5kOWsvr3u'),
(8, '2', 'parth', ' Doe', 'sai ram', '7000.00', 'Accountant', '2025-03-03', '$2y$10$qZkehv6LvipqiTLK3rKtYeCPdIzPA0Mts2gGnPM9rnqKpuM7FTK7e'),
(7, '1', 'John', ' Doe', 'pravati nagar', '5000.00', 'Assistant Manager', '2025-03-10', '$2y$10$yc.rKI4UQNgbNml7Wx2Bqe.UEZR1sPmJgw61AUr9LcIyTE6d0XGwe');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `comment`, `status`, `created_at`) VALUES
(1, 'good', 'inactive', '2025-02-25 11:19:10'),
(2, 'hii', 'active', '2025-02-25 11:19:10'),
(3, 'hii', 'inactive', '2025-02-25 11:19:10'),
(4, 'hii', 'inactive', '2025-02-25 11:19:10'),
(5, 'vvvey goood \\r\\n', 'inactive', '2025-02-25 11:19:10'),
(6, 'hii', 'inactive', '2025-02-25 11:19:10'),
(7, 'hii', 'inactive', '2025-02-25 11:19:10'),
(8, 'hii', 'inactive', '2025-02-25 11:19:10'),
(9, 'hii', 'inactive', '2025-02-25 11:19:10'),
(10, 'hii', 'inactive', '2025-02-25 11:19:10'),
(11, 'hhh', 'inactive', '2025-02-25 11:19:10'),
(12, 'ghhhh', 'inactive', '2025-02-25 11:19:33'),
(13, 'Nice Hotel', 'inactive', '2025-03-16 07:50:48'),
(14, 'hii', 'inactive', '2025-03-16 09:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `available_rooms` int(11) NOT NULL,
  `description` text NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_size` int(11) NOT NULL,
  `popular_guests` varchar(255) NOT NULL,
  `room_features` text NOT NULL,
  `beds_and_blanket` text NOT NULL,
  `facilities` text NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `city`, `location`, `price`, `image_path`, `available_rooms`, `description`, `room_type`, `room_size`, `popular_guests`, `room_features`, `beds_and_blanket`, `facilities`, `image1`, `image2`, `image3`, `image4`) VALUES
(20, 'Zulu Land cottages - near Curlies beach shack and shiva valley - Anjuna beach', 'Goa', 'House No 774, St Michael Wado, Anjuna Beach, Anjuna, 403509 Anjuna', '2800.00', NULL, 4, 'Located in Anjuna, a few steps from Anjuna Beach, Zulu Land cottages - near Curlies beach shack and shiva valley - Anjuna beach provides accommodations with a fitness center, free private parking, a garden and a restaurant. Among the facilities at this property are room service and a 24-hour front desk, along with free WiFi throughout the property. Guests can use a bar.\r\n\r\nAll rooms at the resort are equipped with a seating area. Complete with a private bathroom equipped with a bath and free toiletries, guest rooms at Zulu Land cottages - near Curlies beach shack and shiva valley - Anjuna beach have a flat-screen TV and air conditioning, and selected rooms include a balcony. The rooms include a safety deposit box.\r\n\r\n\r\n\r\n', 'Luxury Room', 355, '- Proximity to Anjuna Beach - Near popular spots like Curlies Beach Shack and Shiva Valley - Peaceful atmosphere despite the lively area', '- Air-conditioning - Private balcony with garden or surrounding views - Seating area - Dining area - Flat-screen TV with streaming services (Netflix) - Soundproof rooms', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'pexels-pixabay-271624.jpg', '', '', ''),
(18, 'Preet kour bhatiya', 'Valsad', 'Gurgaon - New Delhi NCR', '1000.00', NULL, 5, 'very good', 'Executive Suite', 1000, ' Mineral Water â€¢ Laundry Service â€¢ Housekeeping ', 'â€¢ Charging Points â€¢ Chair â€¢ Dining Table â€¢ Telephone', 'â€¢ Cushions â€¢ Blanket â€¢ Pillows', 'ac wifi 24*7 ', '16.jpeg', '', '', ''),
(22, 'Okean De Goa Vagator', 'Goa', 'Zhor Waddo, opposite Lotus Inn Hotel, 403509 Vagator,India', '3500.00', NULL, 5, 'Situated within 2.4 km of Vagator Beach and 2.8 km of Ozran Beach, Okean De Goa Vagator provides rooms in Vagator. With free WiFi, this 3-star hotel offers room service and a 24-hour front desk. Free private parking is available and the hotel also features bike hire for guests who want to explore the surrounding area.\r\n\r\nAt the hotel, rooms have a wardrobe. Complete with a private bathroom fitted with a shower and free toiletries, the rooms at Okean De Goa Vagator have a flat-screen TV and air conditioning, and certain rooms are fitted with a balcony. All guest rooms will provide guests with a fridge.\r\n\r\nGuests at the accommodation can enjoy a buffet or a vegetarian breakfast.\r\n\r\nChapora Fort is 2.5 km from Okean De Goa Vagator, while Thivim railway station is 18 km from the property. Dabolim Airport is 46 km away', 'Executive Suite', 175, 'Located just a short distance from Vagator Beach, guests can easily access the beauty of the coastline while staying in a peaceful, relaxed environment.', '- Air-conditioning - Private balcony with garden or surrounding views - Seating area - Dining area - Flat-screen TV with streaming services (Netflix) - Soundproof rooms', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-07 215428.png', '', '', ''),
(21, '360 Bliss Dia', 'Goa', 'Flat No. 104 SY 64/16 Ekjap Paradise Palms Nerul Bardez North Goa, 403516 Nerul', '3500.00', NULL, 8, 'Guests at the apartment can enjoy a vegetarian breakfast, and breakfast in the room is also available.\r\n', 'Deluxe Room', 355, '- Proximity to Anjuna Beach - Near popular spots like Curlies Beach Shack and Shiva Valley - Peaceful atmosphere despite the lively area', '- Air-conditioning - Private balcony with garden or surrounding views - Seating area - Dining area - Flat-screen TV with streaming services (Netflix) - Soundproof rooms', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'pexels-pixabay-53577.jpg', '', '', ''),
(23, 'Okean De Goa Vagator', 'Goa', 'Zhor Waddo, opposite Lotus Inn Hotel, 403509 Vagator,India', '3500.00', NULL, 4, 'Situated within 2.4 km of Vagator Beach and 2.8 km of Ozran Beach, Okean De Goa Vagator provides rooms in Vagator. With free WiFi, this 3-star hotel offers room service and a 24-hour front desk. Free private parking is available and the hotel also features bike hire for guests who want to explore the surrounding area.\r\n\r\nAt the hotel, rooms have a wardrobe. Complete with a private bathroom fitted with a shower and free toiletries, the rooms at Okean De Goa Vagator have a flat-screen TV and air conditioning, and certain rooms are fitted with a balcony. All guest rooms will provide guests with a fridge.\r\n\r\nGuests at the accommodation can enjoy a buffet or a vegetarian breakfast.\r\n\r\nChapora Fort is 2.5 km from Okean De Goa Vagator, while Thivim railway station is 18 km from the property. Dabolim Airport is 46 km away', 'Executive Suite', 175, 'Located just a short distance from Vagator Beach, guests can easily access the beauty of the coastline while staying in a peaceful, relaxed environment.', '- Air-conditioning - Private balcony with garden or surrounding views - Seating area - Dining area - Flat-screen TV with streaming services (Netflix) - Soundproof rooms', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-07 215428.png', '', '', ''),
(24, 'FabHotel Prime Supreme', 'Goa', 'Opp, Damodar Templa Swantantra Path, Vasco-da-Gama, Goa, 403802 Marmagao, IndiaAfter booking, all of the propertyâ€™s details, including telephone and address, are provided in your booking confirmation and your account.', '1850.00', NULL, 10, 'Situated within 1.7 km of Baina Beach and 27 km of Basilica Of Bom Jesus, FabHotel Prime Supreme offers rooms with air conditioning and a private bathroom in Marmagao. The property is around 27 km from Church of Saint Cajetan, 30 km from Margao Railway Station and 45 km from Chapora Fort. The accommodation features a 24-hour front desk, a shuttle service, room service and free WiFi.\r\n\r\nAll rooms at the hotel are fitted with a seating area, a flat-screen TV with cable channels and a private bathroom with free toiletries and a shower. The units have a wardrobe.\r\n\r\nGuests at FabHotel Prime Supreme can enjoy a continental breakfast.\r\n\r\nThivim railway station is 48 km from the accommodation, while Mormugao Port is 2.6 km from the property. Dabolim Airport is 4 km away', 'Royal Suite', 155, 'Offering budget-friendly rates without compromising on quality, it provides clean and well-maintained rooms equipped with essential amenities such as air conditioning, free WiFi, and flat-screen TVs. ', '- Air-conditioning - Private balcony with garden or surrounding views - Seating area - Dining area - Flat-screen TV with streaming services (Netflix) - Soundproof rooms', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-07 220555.png', '', '', ''),
(25, 'Beverly villa', 'Ooty', 'Beverly Villa, near new era school, pudumund road,, 643001 Ooty, India', '2800.00', NULL, 4, 'Located in Ooty, 4 km from Ooty Lake, Beverly villa provides accommodation with a garden, free private parking, a shared lounge and a terrace. This 3-star hotel offers a concierge service and a tour desk. The accommodation offers a 24-hour front desk, airport transfers, room service and free WiFi throughout the property.\r\n\r\nAt the hotel each room includes a seating area, a flat-screen TV with satellite channels, a safety deposit box and a private bathroom with a shower, free toiletries and a hairdryer. All rooms are equipped with a kettle, while selected rooms have a kitchenette with a fridge, a dishwasher and an oven. At Beverly villa each room has bed linen and towels.\r\n\r\nOoty Botanical Gardens is 1.5 km from the accommodation, while Ooty Rose Garden is 1.8 km away. The nearest airport is Coimbatore International Airport, 96 km from Beverly villa.', 'Luxury Room', 448, 'Beverly Villa is known for being a good option for families or groups of friends traveling together. Its suites provide enough space and comfort for everyone to enjoy.', '- Air-conditioning - Private balcony with garden or surrounding views - Seating area - Dining area - Flat-screen TV with streaming services (Netflix) - Soundproof rooms', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 180648.png', '', '', ''),
(32, 'Trident Nariman Point', 'Mumbai', 'Nariman Point, 400021 Mumbai, India', '22500.00', NULL, 8, 'he 5-star Trident Nariman Point is located in Mumbai, overlooking the beautiful Arabian Sea from Marine Drive. Featuring a 24-hour business centre, the hotel has an outdoor pool, a fitness centre and pampering spa treatments. Complimentary WiFi is available in all rooms.\r\n\r\nFitted with air conditioning, all rooms are equipped with a flat screen TV offering satellite channels, personal safe and minibar. Some rooms enjoy views of the sea. En suite bathrooms come with a shower or bathtub and offers free toiletries.\r\n\r\nDay trips and car rentals can be arranged at the tour desk. The hotel also provides daily newspapers and luggage storage at its 24-hour front desk.\r\n\r\nMediterranean cuisine is served at Frangipani restaurant, while Southeast-Asian flavours and Japanese food are available at Indian Jones restaurant. Other dining options include buffet breakfast at Veranda and cocktails at Opium Den.\r\n\r\nTrident Nariman Point is 5.8 km from Mumbai Central and Western Railway Station Terminus. It is 24 km from Chhatrapati Shivaji International Airport.', 'Executive Suite', 891, 'Many guests rave about the sea-facing rooms, which offer breathtaking views, particularly the suites with ocean views. The views of the sunset and the Mumbai skyline are frequently highlighted.', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 183732.png', '', '', ''),
(38, 'Lemon Tree Hotel Tapovan Rishikesh', 'Rishikesh', 'Laxman Jhula Road, 249192 RishÄ«kesh, IndiaAfter booking, all of the propertyâ€™s details, including telephone and address, are provided in your booking confirmation and your account.', '7000.00', NULL, 9, 'Situated 30 km from Mansa Devi Temple, Lemon Tree Hotel Tapovan Rishikesh offers 4-star accommodation in RishÄ«kesh and has a garden, a restaurant and a bar. Boasting a concierge service, this property also provides guests with an outdoor pool. The accommodation features a 24-hour front desk, airport transfers, room service and free WiFi throughout the property.\r\n\r\nAll rooms at the hotel come with air conditioning, a seating area, a flat-screen TV with satellite channels, a safety deposit box and a private bathroom with a shower, free toiletries and a hairdryer. The units will provide guests with a desk and a kettle.\r\n\r\nGuests at Lemon Tree Hotel Tapovan Rishikesh can enjoy a buffet breakfas', 'Executive Suite', 298, 'Guests love the hotelâ€™s proximity to the scenic Ganges River and the stunning views of the surrounding mountains, making it an ideal spot for relaxation and yoga retreats', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 192430.png', '', '', ''),
(28, 'Ayatana Ooty', 'Ooty', 'WelcomHeritage Ayatana, Ooty, 643003 Ooty, India', '17330.00', NULL, 5, 'Set in Ooty, 14 km from Ooty Lake, Ayatana Ooty offers accommodation with an outdoor swimming pool, free private parking, a garden and a restaurant. With free WiFi, this 5-star hotel offers a 24-hour front desk. Certain units at the property feature a balcony with a garden view.\r\n\r\nGuests at the hotel can enjoy a continental breakfast.\r\n\r\nOoty Bus Station is 13 km from Ayatana Ooty, while Ooty Railway Station is 13 km away. Coimbatore International Airport is 84 km from the property.', 'Executive Suite', 753, 'Located in Coonoor, the property offers breathtaking views of the Nilgiri hills, lush green valleys, and tea plantations, making it a peaceful retreat. Guests love the natural surroundings and the serene atmosphere.', '- Air-conditioning - Private balcony with garden or surrounding views - Seating area - Dining area - Flat-screen TV with streaming services (Netflix) - Soundproof rooms', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 181346.png', '', '', ''),
(37, 'Le Montfort Resort', 'Munnar', 'Ottamaram, Pothamedu, Munnar, Kerala - 685565, 685565 Munnar, India', '10000.00', NULL, 2, 'Located in Munnar, 10 km from Munnar Tea Museum, Le Montfort Resort provides accommodation with an outdoor swimming pool, free private parking, a garden and a shared lounge. With free WiFi, this 5-star resort offers room service and a 24-hour front desk. The property is non-smoking and is set 19 km from Mattupetty Dam.\r\n\r\nAt the resort, every room is equipped with a desk, a flat-screen TV, a private bathroom, bed linen and towels. Each room comes with a kettle, while selected rooms have a balcony and others also provide guests with garden views. All units include a wardrobe.\r\n\r\nA buffet, continental or Asian breakfast can be enjoyed at the property. At Le Montfort Resort you will find a restaurant serving American, Chinese and Indian cuisine. Vegetarian and halal options can also be requested', 'Executive Suite', 498, 'The resort is located amidst lush greenery, offering breathtaking views of the surrounding hills, valleys, and cardamom plantations. The natural beauty of the area is a major draw for nature lovers and those seeking a peaceful retreat.', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 191450.png', '', '', ''),
(31, 'AJ Gable Clouds Ooty by VOYE HOMES - Serene Stay Near Avalanche Emerald Lake', 'Ooty', '12/517, 643004 Ooty, India', '6000.00', NULL, 5, 'Set in Ooty, 12 km from Ooty Lake, AJ Gable Clouds Ooty by VOYE HOMES - Serene Stay Near Avalanche Emerald Lake offers accommodation with a garden, free private parking and a restaurant. Located around 14 km from Ooty Bus Station, the resort with free WiFi is also 14 km away from Ooty Railway Station. The accommodation features a shared kitchen, room service and organising tours for guests.', 'Royal Suite', 600, 'J Gable Clouds Ooty by VOYE HOMES is a popular choice among guests, offering a serene stay near Avalanche Emerald Lake. Guests frequently commend the property  cleanliness, with rooms described as immaculately maintained. ', '- Air-conditioning - Private balcony with garden or surrounding views - Seating area - Dining area - Flat-screen TV with streaming services (Netflix) - Soundproof rooms', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 181928.png', '', '', ''),
(36, 'Holiday Inn Bengaluru Racecourse by IHG', 'Bangalore', '16/1,Sheshadri Road, 560009 Bangalore, India', '6000.00', NULL, 12, 'Conveniently located along Sheshadri Road across Bangalore turf club, Holiday Inn Bengaluru Racecourse overlooks the Bangalore Turf Club ensuring great views.\r\n\r\nThe 272 well-appointed rooms include 22 suites. All units have attached bathroom with a power shower to recharge you after a long and busy day. Some units include a seating area for your convenience. For your comfort, you will find slippers and free toiletries.\r\n\r\nLocated 34 kms from Kempegowda International Airport, the hotel has easy access to Bengaluru City Junction Railway Station, Bus Station, and Kempegowda Metro Station.\r\n\r\nEnjoy lavish Buffet Breakfast spread at Cafe G, The hotel also features concierge service, fitness centre, and a kidâ€™s corner.\r\n\r\nThe hotel also provides, currency exchange and complimentary internet stations & a self-service business center and high-speed Wi-Fi connectivity throughout the hotel.\r\n', 'Executive Suite', 418, 'Guests frequently commend the Holiday Inn Bengaluru Racecourse for its cleanliness, convenient central location, and attentive staff', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 185822.png', '', '', ''),
(35, 'Aloft New Delhi Aerocity', 'New Delhi', 'No. 5B, Aerocity, 110037 New Delhi, India', '11300.00', NULL, 15, 'Aloft New Delhi Aerocity is located in New Delhi 2 km from New Delhi International Airport and 12 km from Jantar Mantar The hotel offers a terrace and a shared lounge. India Gate is 12 km from the property\r\nHumayun Tomb is 13 km from the hotel 7 km from Qutub Minar and 10 km from Rashtrapati Bhavan', 'Executive Suite', 323, 'For instance, a guest mentioned that the vegetarian food was both tasty and hygienically prepared, and praised the hospitality of the staff, particularly Duty Manager Mr. Saurav Banerjee', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 184539.png', '', '', ''),
(39, 'Hotel Sea Castle', 'North Goa', 'H.no 6/56 A Khobra Vaddo, 403516 Calangute, India', '3000.00', NULL, 4, 'Located in Calangute, less than 1 km from Calangute Beach, Hotel Sea Castle provides accommodation with a restaurant, free private parking and a bar. With free WiFi, this 3-star hotel offers room service and a 24-hour front desk. The property is non-smoking and is situated less than 1 km from Baga Beach.\r\n\r\nAt the hotel, each room comes with a wardrobe. Complete with a private bathroom equipped with free toiletries, guest rooms at Hotel Sea Castle have a flat-screen TV and air conditioning, and certain rooms include a balcony. All rooms will provide guests with a fridge.\r\n\r\nChapora Fort is 9.1 km from the accommodation, while Thivim railway station is 18 km away. Manohar Parrikar International Airport is 26 km from the property', 'Deluxe Room', 250, 'Friendly, professional staff who go out of their way to meet guests needs', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 192743.png', '', '', ''),
(40, 'The 14 Gables, A Boutique Stay', 'Manali', 'Shanag, Old Manali, 175131 ManÄli, India', '3190.00', NULL, 8, 'Located in ManÄli, 5.7 km from Hidimba Devi Temple, The 14 Gables, A Boutique Stay provides accommodation with a garden, free private parking, a shared lounge and a restaurant. The property is set 5.8 km from Circuit House, 5.8 km from Manu Temple and 7.2 km from Tibetan Monastery. The accommodation offers karaoke and a kids club\r\nolang Valley is 9.3 km from The 14 Gables, A Boutique Stay. Kulluâ€“Manali Airport is 56 km away, and the property offers a paid airport shuttle service', 'Deluxe Room', 310, 'Friendly, professional staff who go out of their way to meet guests needs', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 193114.png', '', '', ''),
(41, 'Hotel Urban Zip - Near Taj mahal - Family Affordable Stay', 'TajMahal', 'Taj Mahal Car Parking, 282001 Agra, India', '1200.00', NULL, 18, 'Conveniently situated in the Rakabganj district of Agra, Hotel Urban Zip - Near Taj mahal - Family Affordable Stay is situated 5.3 km from Agra Cantonment, 2.8 km from Agra Fort and 2.9 km from Jama Masjid. This 3-star hotel has air-conditioned rooms with a private bathroom. The property is non-smoking and is located 1.3 km from Taj Mahal.', 'Luxury Room', 210, 'Friendly, professional staff who go out of their way to meet guests needs', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 193741.png', '', '', ''),
(42, 'Ramada Encore by Wyndham Amritsar Airport', 'Amritsar', 'Village Kambo Newar Meerankot Chowk, 143008 Amritsar, IndiaAfter booking, all of the propertyâ€™s details, including telephone and address, are provided in your booking confirmation and your account.', '4500.00', NULL, 12, 'amada Encore by Wyndham Amritsar Airport is set in Amritsar, within 8.8 km of Golden Temple and 7.8 km of Durgiana Temple. The property is situated 9 km from Jallianwala Bagh, 6.7 km from Amritsar Junction Railway Station and 8.1 km from Partition Museum. There is a restaurant serving American cuisine, and free private parking is available.\r\n\r\nAll rooms in the hotel are fitted with a TV with satellite channels. All guest rooms at Ramada Encore by Wyndham Amritsar Airport feature air conditioning and a desk\r\nGobindgarh Fort is 8.1 km from Ramada Encore by Wyndham Amritsar Airport, while Amritsar Bus Stand is 8.2 km away. Sri Guru Ram Dass Jee International Airport is 3 km from the property, and the property offers a paid airport shuttle service', 'Deluxe Room', 250, 'Its proximity to Amritsar International Airport makes it a great choice for travelers looking for easy access to the airport', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-10 185822.png', 'Screenshot 2025-03-10 191450.png', 'Screenshot 2025-03-10 193741.png', 'Screenshot 2025-03-10 194338.png'),
(43, 'Ramada Encore by Wyndham Amritsar Airport', 'Amritsar', 'Village Kambo Newar Meerankot Chowk, 143008 Amritsar, IndiaAfter booking, all of the propertyâ€™s details, including telephone and address, are provided in your booking confirmation and your account.', '4500.00', NULL, 12, 'aaaa', 'Royal Suite', 250, 'Its proximity to Amritsar International Airport makes it a great choice for travelers looking for easy access to the airport', 'Air Conditioning Flat-screen TV with satellite channels Complimentary Wi-Fi access Mini-bar with a selection of beverages and snacks Coffee/tea-making facilities In-room safe for secure storage of valuables High-quality bath products and bathrobes', '- Comfortable bedding - Fresh linens and blankets provided - Soft pillows for comfort', '- On-site restaurant with local and Indian cuisine - Bar - Fitness center - Spa services - Safety deposit box - Electric kettle - Free toiletries (bathrobe, towels) - Private bathroom with shower', 'Screenshot 2025-03-07 215428.png', 'Screenshot 2025-03-07 220555.png', 'Screenshot 2025-03-10 180648.png', 'Screenshot 2025-03-10 181346.png');

-- --------------------------------------------------------

--
-- Table structure for table `hotels_bookings`
--

CREATE TABLE `hotels_bookings` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `room_type` varchar(100) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `checkin_date` date DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` varchar(5) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `status` enum('pending','complete','canceled') DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotels_bookings`
--

INSERT INTO `hotels_bookings` (`id`, `user_name`, `user_email`, `user_phone`, `hotel_id`, `room_type`, `total_price`, `checkin_date`, `checkout_date`, `booking_date`, `card_number`, `expiry_date`, `cvv`, `status`) VALUES
(30, 'Anmol singh bhatiya', 'anmol@gmil.com', '8200050985', 23, 'Royal Suite', '3500.00', '2025-03-10', '2025-03-16', '2025-03-10 05:01:51', '1234567891237456', '10/36', '120', 'complete'),
(34, 'anmol', '22702anmolsinghbhatiya@gmail.com', '8200050985', 32, 'Royal Suite', '22500.00', '2025-03-14', '2025-03-15', '2025-03-14 16:48:59', '1234567891237456', '10/36', '120', 'canceled'),
(40, 'anmol', '22702anmolsinghbhatiya@gmail.com', '8200050985', 35, 'Executive Suite', '11300.00', '2025-03-15', '2025-03-16', '2025-03-15 09:27:10', '1234567891234567', '10/37', '120', 'complete'),
(39, 'anmol', '22702anmolsinghbhatiya@gmail.com', '8200050985', 35, 'Executive Suite', '11300.00', '2025-03-15', '2025-03-16', '2025-03-15 09:26:46', '1234567891234567', '10/37', '120', 'complete'),
(38, 'anmol', '22702anmolsinghbhatiya@gmail.com', '8200050985', 35, 'Royal Suite', '11300.00', '2025-03-15', '2025-03-16', '2025-03-15 09:23:47', '1234567891234567', '10/37', '120', 'pending'),
(37, 'anmol', '22702anmolsinghbhatiya@gmail.com', '8200050985', 35, 'Executive Suite', '11300.00', '2025-03-15', '2025-03-16', '2025-03-15 09:22:41', '1234567891234567', '10/37', '120', 'complete'),
(35, 'anmol', '22702anmolsinghbhatiya@gmail.com', '8200050985', 32, 'Executive Suite', '22500.00', '2025-03-14', '2025-03-15', '2025-03-14 16:49:32', '1234567891237456', '10/36', '120', 'canceled'),
(20, 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '6355678756', 21, 'Deluxe Room', '49000.00', '2025-03-15', '2025-03-20', '2025-03-05 10:45:06', '', '', '', 'complete'),
(21, 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '6355678756', 21, 'Deluxe Room', '49000.00', '2025-03-07', '2025-03-20', '2025-03-05 10:49:14', '', '', '', 'pending'),
(22, 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '6355678756', 21, 'Deluxe Room', '49000.00', '2025-03-06', '2025-03-20', '2025-03-05 10:52:26', '1234567891012134', '12/25', '133', 'canceled'),
(23, 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '6355678756', 21, 'Deluxe Room', '49000.00', '2025-03-06', '2025-03-20', '2025-03-05 10:57:25', '1234567891012134', '12/25', '133', 'pending'),
(24, 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '6355678756', 21, 'Deluxe Room', '49000.00', '2025-03-06', '2025-03-20', '2025-03-05 10:58:13', '1234567891012134', '12/25', '133', 'pending'),
(41, 'anmol', '22702anmolsinghbhatiya@gmail.com', '8200050985', 35, 'Executive Suite', '11300.00', '2025-03-15', '2025-03-16', '2025-03-15 09:28:14', '1234567891234567', '10/37', '120', 'pending'),
(43, 'anmol singh', '22702anmolsinghbhatiya@gmail.com', '8200050985', 35, 'Executive Suite', '11300.00', '2025-03-15', '2025-03-16', '2025-03-15 09:29:15', '1234567891234567', '10/37', '125', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_facilities`
--

CREATE TABLE `hotel_facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon_svg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_facilities`
--

INSERT INTO `hotel_facilities` (`id`, `name`, `description`, `icon_svg`) VALUES
(1, 'WiFi', 'High-speed 50 Mbps wireless & Cable internet available in all rooms and common area', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>'),
(2, 'Free Breakfast', 'Enjoy a complimentary breakfast each morning, offering a variety of fresh and delicious options', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 64c0-17.7 14.3-32 32-32l320 0 64 0c70.7 0 128 57.3 128 128s-57.3 128-128 128l-32 0c0 53-43 96-96 96l-192 0c-53 0-96-43-96-96L96 64zM480 224l32 0c35.3 0 64-28.7 64-64s-28.7-64-64-64l-32 0 0 128zM32 416l512 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 480c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>'),
(3, 'Swimming Pool', 'Relax and unwind in our refreshing swimming pool, perfect for a leisurely swim or a relaxing dip.', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M309.5 178.4L447.9 297.1c-1.6 .9-3.2 2-4.8 3c-18 12.4-40.1 20.3-59.2 20.3c-19.6 0-40.8-7.7-59.2-20.3c-22.1-15.5-51.6-15.5-73.7 0c-17.1 11.8-38 20.3-59.2 20.3c-10.1 0-21.1-2.2-31.9-6.2C163.1 193.2 262.2 96 384 96l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-26.9 0-52.3 6.6-74.5 18.4zM160 160A64 64 0 1 1 32 160a64 64 0 1 1 128 0zM306.5 325.9C329 341.4 356.5 352 384 352c26.9 0 55.4-10.8 77.4-26.1c0 0 0 0 0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 405.7 417 416 384 416c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7c0 0 0 0 0 0C136.7 341.2 165.1 352 192 352c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z"/></svg>'),
(4, 'Gym & Fitness', 'Stay fit during your stay with our fully equipped gym and fitness center', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M96 64c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32l0 160 0 64 0 160c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-64-32 0c-17.7 0-32-14.3-32-32l0-64c-17.7 0-32-14.3-32-32s14.3-32 32-32l0-64c0-17.7 14.3-32 32-32l32 0 0-64zm448 0l0 64 32 0c17.7 0 32 14.3 32 32l0 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l0 64c0 17.7-14.3 32-32 32l-32 0 0 64c0 17.7-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32l0-160 0-64 0-160c0-17.7 14.3-32 32-32l32 0c17.7 0 32 14.3 32 32zM416 224l0 64-192 0 0-64 192 0z"/></svg>'),
(5, 'Spa & Wellness', 'Experience ultimate relaxation with our spa services, including massages and saunas', '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M183.1 235.3c33.7 20.7 62.9 48.1 85.8 80.5c7 9.9 13.4 20.3 19.1 31c5.7-10.8 12.1-21.1 19.1-31c22.9-32.4 52.1-59.8 85.8-80.5C437.6 207.8 490.1 192 546 192l9.9 0c11.1 0 20.1 9 20.1 20.1C576 360.1 456.1 480 308.1 480L288 480l-20.1 0C119.9 480 0 360.1 0 212.1C0 201 9 192 20.1 192l9.9 0c55.9 0 108.4 15.8 153.1 43.3zM301.5 37.6c15.7 16.9 61.1 71.8 84.4 164.6c-38 21.6-71.4 50.8-97.9 85.6c-26.5-34.8-59.9-63.9-97.9-85.6c23.2-92.8 68.6-147.7 84.4-164.6C278 33.9 282.9 32 288 32s10 1.9 13.5 5.6z"/></svg>');

-- --------------------------------------------------------

--
-- Table structure for table `need_help`
--

CREATE TABLE `need_help` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `need_help`
--

INSERT INTO `need_help` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(5, 'anmol', 'anmol@gmil.com', 'jjgj', '2025-01-09 12:38:32'),
(6, 'Anmol Bhatiya', 'Anmol@gmail.com', 'hii', '2025-02-03 15:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accept_terms` tinyint(1) NOT NULL,
  `resettoken` varchar(255) DEFAULT NULL,
  `resettokenexprice` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`id`, `first_name`, `last_name`, `address`, `email`, `phone`, `password`, `accept_terms`, `resettoken`, `resettokenexprice`) VALUES
(1, 'Anmol', 'Bhatiya', 'sai ram', 'l@gmail.com', '01234567890', '$2y$10$Sff6aBD/DPgnQqwSjo/uGesuGGPwushPZapXvt2g61rM3QvaE.M/q', 1, 'f8ba175da1ee36ad57f3ca228bec22ab', '2025-03-09'),
(24, 'Ranjeet ', 'Bhatiya', 'sai ram', 'ranjeet123@gmil.com', '9408084033', '$2y$10$J0fJ7qM8yIrqpfCN3uM2.uaL2b6QYnX0yiddnAf.zEuTcEugkXQQG', 1, 'af8459fae7157903fdc6c085e616b8c4', '2025-03-13'),
(3, 'Anmol', 'Bhatiya', 'sai ram', 'Anmol@gmail.com', '1234567891', '$2y$10$VD1xCoj4abPOUGnQKt06Su8fvoO1ZxMVUC/ZMWAuNWyveVXiJPiDy', 1, '14e43e7cca51b2019d889b2b3119cf32', '2025-03-09'),
(4, '', '', '', '', '', '$2y$10$vyz6Y5Vz42YUDY8LDQMJn.flB2CqYe6GAxP.KMWNjg.ESN16Iy.pS', 0, NULL, NULL),
(23, 'Anmol', 'Bhatiya', 'sai ram', '22702anmolsinghbhatiya@gmail.com', '8200050985', '$2y$10$DDK02WFGGmwrsrZ2KhB8GeGP61t/M9FmJqX/Onn1Ry9xDLFNTv/D.', 1, NULL, NULL),
(6, 'joy', 'Bhatiya', 'sai ram comlex', 'jimmybhatiya@gmail.com', '6355678756', '$2y$10$cggZAfviDxfgiE0YpyewmO0zKAY5B8WY1V90meQAGdJD8r.k5vtzi', 1, NULL, NULL),
(7, 'joy', 'Bhatiya', 'sai ram comlex', 'immybhatiya@gmail.com', '6355678756', '$2y$10$Fh2RSH2C6vbwDvZtPFFIHuBB4iK9mFMwrLqL2S7hpEog/.fBkVoju', 1, NULL, NULL),
(8, 'joy', 'Bhatiya', 'sai ram comlex', 'mmybhatiya@gmail.com', '6355678756', '$2y$10$M1QDV2HgZSgFZlKxBBkfeOXfFPZ4IY5eeamjHor1tmop140CCQsVe', 1, NULL, NULL),
(9, 'joy', 'Bhatiya', 'sai ram comlex', 'mybhatiya@gmail.com', '6355678756', '$2y$10$MotiHQDTQXadjhw5OZ3h5OMaGNp5bsv3xU3LkfXXF84VacXBkP3WS', 1, NULL, NULL),
(10, 'joy', 'Bhatiya', 'sai ram comlex', 'mybhatiya@gmail.comN', '63556787560', '$2y$10$jndUa1UuiBW9htJhF47W4.hNWPQoK1O5Iz.ax0NUpuROfMnkb8YZq', 1, NULL, NULL),
(11, 'joy', 'Bhatiya', 'sai ram comlex', 'ybhatiya@gmail.comN', '63556787560', '$2y$10$HA1/riE5FfpC5Z3A6SzWVOdBXDuyoTEi0TVdCpOqMzHo67Rw2eXQG', 1, NULL, NULL),
(12, 'joy', 'Bhatiya', 'sai ram comlex', 'ybhiya@gmail.comN', '63556787560', '$2y$10$0nQBF7OSxv/qY3DDI67qVeE0g2.j3VO5UMRGaUnYJoHKxJR2MJ9J2', 1, NULL, NULL),
(13, 'joy', 'Bhatiya', 'sai ram comlex', 'hiya@gmail.comN', '63556787560', '$2y$10$wnjQ4wcox9uoRMc.LufeE.9aRoVY21U0Kg8N1OuBkXPOeKOZvMKDS', 1, NULL, NULL),
(14, 'parth', 'biru', 'sai ram comlex', 'parth1@gmail.com', '6355678756', '$2y$10$n2Zbzt0SzQmUvtqHUAs8suJoD8M5K.MCD7tqqTpNmho0bJrg9d01O', 1, NULL, NULL),
(15, 'om', 'om', 'sai ram comlex', 'parth@gmail.com', '06355678756', '$2y$10$K/x5WuglCsYAOFgF6MWY4OVnctpOHeEDeE7vfnvW3oeq/40fAXMu6', 1, NULL, NULL),
(16, 'om', 'om', 'sai ram comlex', 'om2@gmail.com', '6355678756', '$2y$10$rbedF2dnHtR8tmcVLJFURu9vgwXAdPL95LyYYK0e532A9mYcM5IGK', 1, NULL, NULL),
(17, 'om', 'om', 'sai ram comlex', 'om3@gmail.com', '0006355678756', '$2y$10$Gatc7yi9Ls2ZmwtXHDcCT.XDYoIR0uimnRO/M7cYt.3Zic5GFh1TW', 1, NULL, NULL),
(18, 'vansh', 'patel', 'valsad', 'vansh@gmail.com', '2525252525', '$2y$10$bjVzTxmENsb25GvtZbmnwObqcoimdpz19TldqZu1EvyeQZC2Q3nkS', 1, NULL, NULL),
(19, 'vansh', 'patel', 'valsad', 'vansh1@gmail.com', '5252542282', '$2y$10$oXxTKxAosg8ndPeIBtGpyOBzKdobLdi2oJPPqa6E0XdOo6vVp5P/K', 1, NULL, NULL),
(20, 'vansh', 'patel', 'valsad', 'vansh2@gmail.com', '5252542282', '$2y$10$sMyVsll/SvbAYqTE20AlueC7wk1PnZEznCNboNt4LHg5zKL5/hiM2', 1, NULL, NULL),
(21, 'vansh', 'patel', 'valsad', 'vansh4@gmail.com', '1234567812', '$2y$10$E4GnYb1wVXw4XpBHDLuV/Oz1p89jQTXY0nfjvjhlOajSqoWQ37VYK', 1, NULL, NULL),
(22, 'vansh', 'patel', 'valsad', 'vansh5@gmail.com', '1234567812', '$2y$10$N6OcetKHdWRaOOj4aHEu8OMCohd.UHx.kUWjJY9lB2C7S5HKGaQXy', 1, NULL, NULL),
(25, 'anmol', 'singh', 'valsad', 'asinghasingh2207@gmail.com', '9408084033', '$2y$10$kr2AspuJILzjzuDPgcR4yuF2JjpRBZm32D2KO0Gm81o/ptb//Rr0e', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_size` varchar(50) NOT NULL,
  `popular_guests` text NOT NULL,
  `room_features` text NOT NULL,
  `beds_and_blanket` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `location`, `description`, `room_name`, `price`, `room_type`, `room_size`, `popular_guests`, `room_features`, `beds_and_blanket`, `photo`) VALUES
(7, 'FabHotel Amazonika Boutique Resort - Nr Arpora H No: 17/2, Viegas Vaddo, Arpora Bardez, Arpora, 403516 Goa, ', 'Located within 2.9 km of Baga Beach and 7.5 km of Chapora Fort, FabHotel Amazonika Boutique Resort - Nr Arpora provides rooms with air conditioning and a private bathroom in Goa. This 3-star hotel offers room service, a 24-hour front desk and free WiFi. The property is non-smoking and is set 16 km from Thivim railway station.\r\n\r\n', 'FabHotel Amazonika Boutique Resort -Nr Arpora', '2274.00', 'double', '800 square ft', ' Mineral Water â€¢ Laundry Service â€¢ Housekeeping ', 'â€¢ Charging Points â€¢ Chair â€¢ Dining Table â€¢ Telephone', 'â€¢ Cushions â€¢ Blanket â€¢ Pillows', '677fcd9bc0ab76.32351296.jpeg'),
(8, 'valsad', 'good place ', 'DoubleTree by Hilton Hotel Gurgaon - New Delhi NCR 5 stars out of 5 Golf Course Rd, Gurgaon, New Delhi and NCR, India, 122011 ', '4000.00', 'single', '345 squre foot', ' Mineral Water â€¢ Laundry Service â€¢ Housekeeping ', 'â€¢ Charging Points â€¢ Chair â€¢ Dining Table â€¢ Telephone', 'â€¢ Cushions â€¢ Blanket â€¢ Pillows', '678f995a2414d5.77119994.jpg'),
(9, 'Gurgaon - New Delhi NCR', 'sfs', 'DoubleTree by Hilton Hotel Gurgaon - New Delhi NCR 5 stars out of 5 Golf Course Rd, Gurgaon, New Delhi and NCR, India, 122011 ', '5000.00', 'suite', '800 square ft', ' Mineral Water â€¢ Laundry Service â€¢ Housekeeping ', 'â€¢ Charging Points â€¢ Chair â€¢ Dining Table â€¢ Telephone', 'â€¢ Cushions â€¢ Blanket â€¢ Pillows', '67bab4685dfb72.68157125.png');

-- --------------------------------------------------------

--
-- Table structure for table `tour_bookings`
--

CREATE TABLE `tour_bookings` (
  `id` int(11) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `package_tier` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `travelers` int(11) NOT NULL,
  `arrival_date` date NOT NULL,
  `arrival_time` time NOT NULL,
  `special_requests` text,
  `total_price` int(11) NOT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_bookings`
--

INSERT INTO `tour_bookings` (`id`, `destination`, `package_tier`, `full_name`, `email`, `phone`, `travelers`, `arrival_date`, `arrival_time`, `special_requests`, `total_price`, `booking_date`) VALUES
(1, 'Bangalore', 'Premium', 'Anmol Bhatiya', 'Anmol@gmail.com', '1234567890', 1, '2025-02-28', '12:06:00', '', 100000, '2025-02-28 04:41:01'),
(2, 'Amritsar', 'Premium', 'Anmol Bhatiya', 'Anmol@gmail.com', '1234567890', 10, '2025-03-08', '06:09:00', '', 90000, '2025-02-28 04:46:32'),
(3, 'Manali', 'Premium', 'Anmol Bhatiya', 'Anmol@gmail.com', '8200050985', 1, '2025-03-01', '14:20:00', '', 12000, '2025-02-28 04:54:22'),
(4, 'Goa', 'Premium', 'Anmol Bhatiya', 'Anmol@gmail.com', '08200050985', 10, '2025-02-28', '13:45:00', '', 90000, '2025-02-28 05:21:59'),
(5, 'Goa', 'Premium', 'Anmol Bhatiya', 'Anmol@gmail.com', '08200050985', 10, '2025-02-28', '13:45:00', '', 90000, '2025-02-28 05:22:24'),
(6, 'North Goa', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '08200050985', 15, '2025-02-28', '13:45:00', '', 75000, '2025-02-28 05:22:42'),
(7, 'North Goa', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '08200050985', 15, '2025-02-28', '13:45:00', '', 75000, '2025-02-28 05:33:18'),
(8, 'North Goa', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '08200050985', 15, '2025-02-28', '13:45:00', '', 75000, '2025-02-28 05:33:23'),
(9, 'North Goa', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '08200050985', 15, '2025-02-28', '13:45:00', '', 75000, '2025-02-28 05:36:35'),
(10, 'Mumbai', 'Standard', 'geet kour', 'geet30@gmail.com', '08200050985', 2, '2025-02-28', '07:08:00', '', 15000, '2025-02-28 05:37:00'),
(11, 'New Delhi', 'Premium', 'geet kour', 'geet30@gmail.com', '08200050985', 5, '2025-03-01', '14:10:00', '', 60000, '2025-02-28 05:40:30'),
(12, 'Amritsar', 'Premium', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 5, '2025-03-01', '01:14:00', '', 45000, '2025-02-28 05:42:24'),
(13, 'Rishikesh', 'Premium', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 5, '2025-03-01', '16:16:00', '', 47500, '2025-02-28 05:46:24'),
(14, 'Rishikesh', 'Premium', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 5, '2025-02-28', '11:22:00', '', 47500, '2025-02-28 05:47:07'),
(15, 'New Delhi', 'Basic', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 5, '2025-03-01', '06:29:00', '', 30000, '2025-02-28 05:56:59'),
(16, 'New Delhi', 'Standard', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 5, '2025-03-01', '13:29:00', '', 40000, '2025-02-28 05:59:41'),
(17, 'New Delhi', 'Standard', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 1, '2025-03-01', '13:29:00', '', 8000, '2025-02-28 06:00:01'),
(18, 'New Delhi', 'Standard', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 2, '2025-03-01', '13:29:00', '', 16000, '2025-02-28 06:00:11'),
(19, 'Mumbai', 'Standard', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 2, '2025-02-28', '16:30:00', '', 15000, '2025-02-28 06:00:59'),
(20, 'Amritsar', 'Premium', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 3, '2025-03-01', '22:22:00', '', 27000, '2025-02-28 06:04:19'),
(21, 'Amritsar', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 2, '2025-03-01', '15:35:00', '', 9000, '2025-02-28 06:05:16'),
(22, 'New Delhi', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 3, '2025-03-01', '22:02:00', '', 18000, '2025-02-28 06:06:43'),
(23, 'New Delhi', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 3, '2025-03-01', '04:44:00', '', 18000, '2025-02-28 06:07:25'),
(24, 'New Delhi', 'Standard', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 3, '2025-02-28', '14:42:00', '', 24000, '2025-02-28 06:12:06'),
(25, 'Agra', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 2, '2025-02-28', '22:02:00', '', 10000, '2025-02-28 06:14:50'),
(38, 'Rishikesh', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '01234567890', 2, '2025-03-07', '22:13:00', '', 9000, '2025-03-06 15:43:31'),
(27, 'Bangalore', 'Premium', 'Preet kour Bhatiya', 'preetbhatiya@gmail.com', '06355678756', 3, '2025-02-28', '22:22:00', '', 30000, '2025-02-28 06:16:55'),
(28, 'Amritsar', 'Standard', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 10, '2025-02-28', '22:02:00', '', 60000, '2025-02-28 06:17:35'),
(29, 'Mumbai', 'Premium', 'geet kour', 'geet30@gmail.com', '08200050985', 5, '2025-03-01', '08:08:00', '', 55000, '2025-02-28 06:18:36'),
(30, 'Goa', 'Premium', 'geet kour', 'geet30@gmail.com', '08200050985', 5, '2025-03-01', '08:05:00', '', 45000, '2025-02-28 06:19:35'),
(31, 'Amritsar', 'Premium', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 8, '2025-03-07', '05:40:00', '', 72000, '2025-02-28 06:26:35'),
(32, 'Mumbai', 'Standard', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 10, '2025-03-01', '05:02:00', '', 75000, '2025-02-28 06:28:26'),
(33, 'Mumbai', 'Standard', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 10, '2025-03-01', '05:02:00', '', 75000, '2025-02-28 06:28:42'),
(34, 'Amritsar', 'Standard', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 10, '2025-03-01', '07:08:00', '', 60000, '2025-02-28 06:33:02'),
(35, 'New Delhi', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 5, '2025-03-01', '05:05:00', '', 30000, '2025-02-28 06:36:04'),
(36, 'Manali', 'Premium', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 4, '2025-03-01', '08:00:00', '', 48000, '2025-02-28 06:40:50'),
(37, 'Manali', 'Premium', 'Anmol Bhatiya', 'Anmol@gmail.com', '6355678756', 4, '2025-03-01', '07:02:00', '', 48000, '2025-02-28 06:41:20'),
(39, 'Bangalore', 'Basic', 'Anmol Bhatiya', 'Anmol@gmail.com', '01234567890', 2, '2025-03-07', '01:23:00', '', 10000, '2025-03-06 16:53:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_register`
--
ALTER TABLE `employees_register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels_bookings`
--
ALTER TABLE `hotels_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `hotel_facilities`
--
ALTER TABLE `hotel_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `need_help`
--
ALTER TABLE `need_help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_bookings`
--
ALTER TABLE `tour_bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `employees_register`
--
ALTER TABLE `employees_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `hotels_bookings`
--
ALTER TABLE `hotels_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `hotel_facilities`
--
ALTER TABLE `hotel_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `need_help`
--
ALTER TABLE `need_help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tour_bookings`
--
ALTER TABLE `tour_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
