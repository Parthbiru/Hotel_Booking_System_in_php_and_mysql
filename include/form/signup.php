<?php
include('../Api/db.php'); 
include('../Api/signup.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking Signup</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .navbar {
            background-color: #003580;
            padding: 27px 22px;
            text-align: left;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            }
        .logo {
            color: white;
            margin-left:15%;
            font-size: 20px;
            font-weight: bold;
            font-family: Arial, sans-serif;
        }

        .header {
            color: white;
            text-align: center;
            padding: 40px;
        }

        .header h1 {
            margin: 0;
            font-size: 35px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            
        }

        .signup-form {
            background-color: #ffffff;
            margin-top:50px;
            padding: 40px;
            border-radius: 50px;
            margin-top: 150px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }

        .signup-form h2 {
            margin-bottom: 20px;
            font-size: 22px;
            color: #003580;
        }

        .signup-form label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #003580;
            text-align: left;
        }

        .signup-form input[type="text"],
        .signup-form input[type="email"],
        .signup-form input[type="tel"],
        .signup-form input[type="password"],
        .signup-form input[type="checkbox"] {
            width: 100%;
            padding: 9px;
            border-radius: 30px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .signup-form label[for="accept-terms"] {
            font-size: 15px;
            color: #003580;
            display: flex;
            margin-right:20%;
            align-items: center;
        }

        .signup-form label[for="accept-terms"] input[type="checkbox"] {
            margin-left:52px;
        }

        .signup-form label[for="accept-terms"] a {
            color: #003580;
            font-size: 16px;
            margin-right: 1px;
            display: flex;
            align-items: center;
        }

        .signup-form a {
            display: block;
            margin: 15px 0;
            color: #003580;
            text-decoration: none;
            font-size: 14px;
        }

        .submit-btn {
            background-color: #003580;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-btn:hover {
            background-color: #002a80;
        }

        input.error {
            border-color: red;
        }

        .error-message {
            color: red;
            font-size: 12px;
            text-align: left;
            margin-top: -10px;
        }

        .success-message {
            color: green;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .error-message-box {
            color: red;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .captcha-container {
            margin: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            max-width: 400px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        #captcha-text {
            font-family: 'Courier New', Courier, monospace;
            font-size: 18px;
            color: #333;
            display: inline-block;
            font-size:20px;
            margin-bottom: 10px;
            margin-top: 20px;

        }

        a {
            color: #007BFF;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 10px;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="logo">Bhatiya.com</div>
    </nav>


<div class="container">
    <div class="signup-form">
        <h2>Sign Up</h2>

        <?php if ($registration_success): ?>
            <div class="success-message">
                Registration successful! You can now <a href="Login.php">login</a>.
            </div>
        <?php elseif ($captcha_error): ?>
            <div class="error-message-box">
                <?= $captcha_error; ?>
            </div>
        <?php elseif ($registration_error): ?>
            <div class="error-message-box">
                <?= $registration_error; ?>
            </div>
        <?php endif; ?>

        <form id="signup-form" action="signup.php" method="POST">

            <label for="first-name">First Name</label>
            <input type="text" id="first-name" name="first-name" required>
            <div class="error-message" id="first-name-error"></div>

            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" name="last-name" required>
            <div class="error-message" id="last-name-error"></div>

            <label for="Address">Address</label>
            <input type="text" id="Address" name="Address" required>
            <div class="error-message" id="address-error"></div>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
            <div class="error-message" id="email-error"></div>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required pattern="^[0-9]{10}$" maxlength="10">
            <div class="error-message" id="phone-error"></div>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <div class="error-message" id="password-error"></div>

            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            <div class="error-message" id="confirm-password-error"></div>

            <label for="accept-terms">
                <input type="checkbox" id="accept-terms" name="accept-terms" required>
                <a href="terms.html" target="_blank">I Agree Terms and conditions</a>
            </label>
            <div class="error-message" id="accept-terms-error"></div>

            <!-- CAPTCHA Section -->
            <span id="captcha-text"><?php include 'captcha.php'; ?></span>
            <a href="#" onclick="refreshCaptcha(); return false;">Refresh CAPTCHA</a>
            <label for="captcha">Enter CAPTCHA:</label>
            <input type="text" id="captcha" name="captcha" required>
            
            <!-- Display CAPTCHA error message below input -->
            <div class="error-message" id="captcha-error"></div>

            <h4><a href="Login.php">Already have an account? Login here</a></h4>

            <button type="submit" class="submit-btn">Sign Up</button>
        </form>
    </div>
</div>

<script>
function refreshCaptcha() {
    fetch('captcha.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('captcha-text').textContent = data;
        })
        .catch(error => console.error('Error refreshing CAPTCHA:', error));
}

document.getElementById('signup-form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var captcha = document.getElementById('captcha');
    var captchaErrorDiv = document.getElementById('captcha-error');
    var captchaText = document.getElementById('captcha-text').textContent.trim();

    document.querySelectorAll('.error-message').forEach(function(errorDiv) {
        errorDiv.innerHTML = '';
    });

    var formValid = true;

    if (captcha.value.trim().toUpperCase() !== captchaText.toUpperCase()) {
        formValid = false;
        captchaErrorDiv.innerHTML = "CAPTCHA does not match. Please try again.";
        captcha.classList.add('error');
    }

    if (captcha.value.trim() === '') {
        formValid = false;
        captchaErrorDiv.innerHTML = "Please enter the CAPTCHA.";
        captcha.classList.add('error');
    }

    if (formValid) {
        this.submit(); 
    }
});
</script>

</body>
</html>
