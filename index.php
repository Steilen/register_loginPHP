<?php
session_start();
require_once "db.php"; // Database connection

// If the user is already logged in, redirect to the main page
if (isset($_SESSION['user_id'])) {
    header('Location: main.php');
    exit;
}

// Registration form handling
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
    } else {
        // Hash the password
        $password = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into the database
        $query = "INSERT INTO users (username, email, password, reg_date) VALUES ('$username', '$email', '$password', NOW())";
        if (mysqli_query($conn, $query)) {
            header('Location: main.php'); // Redirect to main page after registration
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

// Login form handling
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Find user in the database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Check if user exists and password matches
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: main.php'); // Redirect to main page after login
        exit;
    } else {
        echo "Incorrect email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration & Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
  <div class="container" id="container">
    <!-- Registration form -->
    <div class="form-container sign-up-container">
      <form action="index.php" method="POST">
        <h1>Create Account</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>or use your email for registration</span>
        <input type="text" placeholder="Name" name="username" required />
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password" id="password" name="password" required />
        <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required />
        <button type="submit" name="register">Sign Up</button>
      </form>
    </div>

    <!-- Login form -->
    <div class="form-container sign-in-container">
      <form action="index.php" method="POST">
        <h1>Sign in</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <span>or use your account</span>
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password" name="password" required />
        <a href="#">Forgot your password?</a>
        <button type="submit" name="login">Sign In</button>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start your journey with us</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
