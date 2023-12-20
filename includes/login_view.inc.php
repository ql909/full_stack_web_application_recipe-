<?php


declare(strict_types=1);

// session_start()

// Display the username when logged in
function output_username()
{
    if (isset($_SESSION["user_id"])) {
        return $_SESSION["user_username"];
    } else {
        return '';
    }
}


// Check various types of errors during login
function check_login_errors()
{
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p class ="form-error">' . $error . '</p>'; /*loops for showing error */
        }

        unset($_SESSION['errors_login']);
    } else if (isset($_GET['login']) && $_GET['login'] === "success") {
        echo '<br>';
        echo '<p class="form-success">Login success!</p>';

    }
}

//
function is_logged_in()
{
    if (isset($_SESSION["user_id"])) {
        // User is logged in, redirect to the main page
        $url = "../final_project_website/main.php";
    } else {
        // User is logged out, show the login page
        $url = "account.php";
    }
    return $url;
}

function is_logged_in_search()
{
    if (isset($_SESSION["user_id"])) {
        // User is logged in, show search page button with link
        echo '<a href="../final_project_website/includes/search_page1.php">Search Recipes</a>';
    }
}

function is_logged_in_myaccount()
{
    if (isset($_SESSION["user_id"])) {
        // Get the username
        $username = output_username();

        // If username is not empty, display it as a link
        if (!empty($username)) {
            echo '<a href="user_page.php">' . htmlspecialchars($username) . '</a>';
        } else {
            echo '<a href="user_page.php">My Account</a>';
        }
    } else {
        echo ' ';
    }
}

function is_logged_in_myaccount1()
{
    if (isset($_SESSION["user_id"])) {
        // Get the username
        $username = output_username();

        // If username is not empty, display it as a link
        if (!empty($username)) {
            echo '<a href="../user_page.php">' . htmlspecialchars($username) . '</a>';
        } else {
            echo '<a href="../user_page.php">My Account</a>';
        }
    } else {
        echo ' ';
    }
}

function is_logged_in_forloggout()
{
    if (isset($_SESSION["user_id"])) {
        // User is logged in, show search page button with link
        echo '<a href="../final_project_website/includes/logout.inc.php">Logout</a>';
    } else {
        echo '<a href="./account.php">Login /Signup</a>';
    }
}

function is_logged_in_forloggout1()
{
    if (isset($_SESSION["user_id"])) {
        // User is logged in, show search page button with link
        echo '<a href="../includes/logout.inc.php">Logout</a>';
    } else {
        echo '<a href="./account.php">Login /Signup</a>';
    }
}