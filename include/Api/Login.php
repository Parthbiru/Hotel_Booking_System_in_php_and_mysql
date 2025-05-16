<?php
session_start();  

include('../Api/db.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM register_user WHERE email = '$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            echo "<script>
                    alert('Login successful!');
                    window.location.href = '../home.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Incorrect password.');
                    window.location.href = '../form/Login.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('User not found! Please register first.');
                window.location.href = '../form/signup.php';
              </script>";
    }
}

mysqli_close($conn);
?>
