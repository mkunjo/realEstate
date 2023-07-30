<?php
session_start(); // start the session
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: sellerdash.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big4-Estate - Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <h1>Big4-Estate</h1>
                <a href="index.html"><img src="big4-estate-logo.png" class="header-logo"></a>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="sign-in.html">Sign In</a></li>
                    <li><a href="sign-up.html">Sign Up</a></li>
                    
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <h1>Sign Up</h1>
        <form action="signup_process.php" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required maxlength="50" placeholder="Enter your first name">

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required maxlength="50" placeholder="Enter your last name">

            <label for="email">Email ID:</label>
            <input type="email" id="email" name="email" required maxlength="50" placeholder="Enter your email">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required maxlength="50" placeholder="Enter your username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required maxlength="50" placeholder="Enter your password">

            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>

    <footer>
        <p>Contact Us | Terms of Service | Privacy Policy</p>
    </footer>
</body>

</html>
