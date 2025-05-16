<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Login</title>
    
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .navbar {
            background-color: #003580;
            padding: 25px 40px;
            text-align: left;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }
            .logo {
            color: white;
            font-size: 20px;
            margin-left:15%;

            font-weight: bold;
            font-family: Arial, sans-serif;
        }


        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            max-width: 1000px;
            width: 100%;
            background: #003580;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .left-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            background-color: #ffffff;
        }

        .login-form {
            background-color: #ffffff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
            text-align: center;
        }

        .login-form h2 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #003580;
        }

        .login-form label {
            display: block;
            margin-bottom: 3px;
            font-size: 15px;
            color: #003580;
            text-align: left;
        }

        .login-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 19px;
        }

        .login-form .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }

        .login-form .forgot-password a {
            color: #003580;
            text-decoration: none;
            font-size: 12px;
        }

        .login-form .forgot-password a:hover {
            text-decoration: underline;
        }

        .login-form .submit-btn {
            background-color: #003580;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form .submit-btn:hover {
            background-color: #002a80;
        }

        .login-form .signup-link p {
            font-size: 16px;
        }

        .login-form .signup-link a {
            color: #003580;
            text-decoration: none;
            font-weight: bold;
        }

        .login-form .signup-link a:hover {
            text-decoration: underline;
        }

        .right-section {
            display: grid;
            grid-template-columns: repeat(3, 90px);
            grid-template-rows: repeat(3, 80px);
            margin-top:12px;
            gap: 20px;
            padding: 30px;
            justify-content: center;
            align-items: center;
        }

        .shape {
            width: 80px;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .shape img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .circle {
            border-radius: 60%;
        }

        .half-rounded {
            border-radius: 80% 78% 0 0;
        }

        .quarter-circle {
            border-radius: 500% 0 0 0;
        }

        .drop-shape {
            clip-path: ellipse(40px 38px at 50% 50%);
        }

        .bg-green { background: #6fcf97; }
        .bg-blue { background: #56ccf2; }
        .bg-orange { background: #f2994a; }
        .bg-purple { background: #9b51e0; }

        @media screen and (max-width: 768px) {
    .container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 90%;
        max-width: 600px;
    }
    .left-section {
        width: 72%;
        padding: 20px;
    }
    .login-form {
        width: 100%;
        max-width: 300px; /* Reduced width */
        padding: 25px;
    }
    .right-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 6px;
        padding: 10px;
        width: 50%;
    }
    .shape {
        width: 45px;
        height: 50px;
    }
}


@media screen and (min-width: 769px) and (max-width: 1024px) {
    .container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        width: 80%;
    }
    .left-section {
        width: 60%;
        padding: 30px;
    }
    .right-section {
        width: 40%;
        padding: 15px;
    }
    .login-form {
        max-width: 350px;
    }
    .shape {
        width: 60px;
        height: 60px;
    }
}

@media screen and (min-width: 1025px) and (max-width: 1366px) {
    .container {
        width: 70%;
        display: grid;
        grid-template-columns: 55% 45%;
    }
    .left-section {
        width: 55%;
        padding: 40px;
    }
    .right-section {
        width: 45%;
        padding: 20px;
    }
    .login-form {
        max-width: 400px;
    }
    .shape {
        width: 70px;
        height: 70px;
    }
}

@media screen and (min-width: 1367px) {
    .container {
        width: 60%;
        display: grid;
        grid-template-columns: 60% 40%;
    }
    .left-section {
        width: 60%;
        padding: 50px;
    }
    .right-section {
        width: 40%;
        padding: 30px;
    }
    .login-form {
        max-width: 450px;
    }
    .shape {
        width: 80px;
        height: 80px;
    }
}

@keyframes circularMotion {
    0% {
        transform: translateX(-50px) translateY(0px) rotate(0deg);
    }
    25% {
        transform: translateX(50px) translateY(-50px) rotate(90deg);
    }
    50% {
        transform: translateX(50px) translateY(50px) rotate(180deg);
    }
    75% {
        transform: translateX(-50px) translateY(50px) rotate(270deg);
    }
    100% {
        transform: translateX(0) translateY(0) rotate(360deg);
    }
}

.animate {
    animation: circularMotion 7s ease-in-out forwards;  /* "forwards" keeps it in place */
}

.shape img {
    transition: transform 0.9s ease-in-out;
}

.shape img:hover {
    transform: scale(5.1);
}

.shape {
    transition: transform 0.3s ease-in-out;
}

.shape:hover {
    transform: rotate(15deg);
}


    </style>
</head>
<body>
<nav class="navbar">
        <div class="logo">Bhatiya.com</div>
    </nav>
    <div class="container">
        <!-- Login Form -->
        <div class="left-section">
            <div class="login-form">
                <h2>Login to Your Account</h2>
                <form action="../api/Login.php" method="POST">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <div class="forgot-password">
                        <a href="forget password.php">Forgot Password?</a>
                    </div>

                    <button type="submit" class="submit-btn">Login</button>

                    <div class="signup-link">
                        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- Creative Image Grid -->
        <!--<div class="right-section">
            <div class="shape bg-blue quarter-circle"></div>
            <div class="shape half-rounded"><img src="/dynamic website/2.png" alt="Person 1"></div>
            <div class="shape bg-green circle"></div>

            <div class="shape"><img src="/dynamic website/1.png" alt="Person 2"></div>
            <div class="shape bg-purple drop-shape"></div>

            <div class="shape circle"><img src="/dynamic website/4.png" alt="Person 3"></div>
            <div class="shape bg-orange drop-shape"></div>


            <div class="shape circle"><img src="/dynamic website/3.png" alt="Person 3"></div>
            <div class="shape bg-orange drop-shape"></div>
        </div>
    </div>--->
    <div class="right-section">
    <div class="shape bg-blue quarter-circle animate"></div>
    <div class="shape half-rounded animate">
        <img src="../../include/login image/2.png" alt="Person 1">
    </div>
    <div class="shape bg-green circle animate"></div>

    <div class="shape animate">
        <img src="../../include/login image/1.png" alt="Person 2">
    </div>
    <div class="shape bg-purple drop-shape animate"></div>

    <div class="shape circle animate">
        <img src="../../include/login image/4.png" alt="Person 3">
    </div>
    <div class="shape bg-orange drop-shape animate"></div>

    <div class="shape circle animate">
        <img src="../../include/login image/3.png" alt="Person 3">
    </div>
    <div class="shape bg-orange drop-shape animate"></div>
</div>
</body>
</html>
