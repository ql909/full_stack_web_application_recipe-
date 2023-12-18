<?php
// Include necessary files for signup view, session configuration, and login view
require_once 'includes/signup_view.inc.php';
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Web App</title>
    <link rel="stylesheet" href="account.css">
</head>

<body>
    <!-- Page header -->
    <header>
        <h1>Welcome to the Recipe Web App</h1>
        <nav>
            <ul>
                <li>
                    <?php output_username(); ?>
                <li>
                <li><a href="../Final_Project_Website/index.php">Home</a></li>
                <!-- Dynamic content that will output the logout option if logged in -->
                <li>
                    <?php is_logged_in_forloggout(); ?>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Hero section that contains the login and registration forms -->
    <div class="hero">
        <!-- Container for both login and registration forms -->
        <div class="form-box">
            <!-- Container for toggle buttons to switch between forms -->
            <div class="button-box" role="form">
                <!-- Visual indicator for the active form -->
                <div id="btn"></div>
                <!-- Buttons to toggle between login and registration -->
                <button type="button" class="toggle-btn" onclick="login()">Log in</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <!-- Login form, which will submit to the login.inc.php script -->
            <form id="login" class="input-group" action="../Final_Project_Website/includes/login.inc.php" method="post">
                <!-- Input for username -->
                <input type="text" class="input-field" name="username" placeholder="Username">
                <!-- Input for password -->
                <input type="password" class="input-field" name="pwd" placeholder="Password">
                <!-- PHP function to check and display login errors -->
                <?php
                check_login_errors();
                ?>
                <!-- Submit button for the login form -->
                <button type="submit" class="submit-btn">Login</button>

            </form>
            <!-- Registration form, which will submit to the signup.inc.php script -->
            <form id="register" class="input-group" action="../Final_Project_Website/includes/signup.inc.php"
                method="post">

                <?php
                signup_inputs();
                // PHP function to check and display signup errors
                check_signup_errors();
                ?>
                <!-- Submit button for the registration form -->
                <button type="submit" class="submit-btn">Register</button>
            </form>

        </div>
    </div>

    <!-- Linking the JavaScript file for form interaction -->
    <script src="scripts.js"></script>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2023 Recipe Web App. All rights reserved.</p>
    </footer>

</body>

</html>