<?php
// Include the sign-up view functions
require_once 'includes/signup_view.inc.php';
// Include the login view functions
require_once 'includes/login_view.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Web App</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Page header -->
    <header>
        <h1>Welcome to the Recipe Webpage</h1>
        <nav>
            <ul>
                <li>
                    <?php output_username(); ?> <!-- Display login username -->
                <li>
                <li>
                    <?php is_logged_in_search(); ?> <!-- Display search recipes pages when logged in -->
                </li>
                <li>
                    <?php is_logged_in_myaccount(); ?> <!-- Redirect to my account page when logged in -->
                </li>
                <li>
                    <?php is_logged_in_forloggout(); ?> <!-- If logged in, a logout link will appear -->
                </li>
            </ul>
        </nav>
    </header>
    <!-- Section for access the website -->
    <section class="hero">
        <div class="hero-content">
            <h2>Find Delicious Recipes</h2>
            <p>Search for recipes based on different criteria and discover new flavors.</p>
             <!-- PHP code to determine the URL based on login status -->
            <?php
            $url = is_logged_in();
            ?>
            <a href="<?php echo $url; ?> " class="btn">Get Started</a>
        </div>
    </section>

    <!-- Recipes Section -->
    <section class="featured-recipes">
        <!-- Heading for the featured recipes section -->
        <h2>Featured Recipes</h2>
        <!-- Individual recipe card -->
        <div class="recipe-card">
            <!-- Image of the Spaghetti Bolognese -->
            <img src="/final_project_website/images/Spaghetti_Bolognese.jpg" alt="Spaghetti Bolognese">
            <!-- Title of the recipe -->
            <h3>Spaghetti Bolognese</h3>
            <!-- Short description of the recipe -->
            <p>A classic Italian dish with a rich tomato sauce and ground beef.</p>

        </div>
        <!-- Heading for the featured recipes section -->
        <div class="recipe-card">
            <!-- Image of the Spaghetti Bolognese -->
            <img src="/final_project_website/images/Vegan_Pancakes.jpg" alt="Vegan Pancakes">
            <!-- Title of the recipe -->
            <h3>Vegan Pancakes</h3>
            <!-- Short description of the recipe -->
            <p>Fluffy pancakes made with plant-based ingredients.</p>

        </div>
        <!-- Heading for the featured recipes section -->
        <div class="recipe-card">
            <!-- Image of the Vegan Pancakes -->
            <img src="/final_project_website/images/Healthy_Pizza.jpg" alt="Healthy Pizza">
            <!-- Title of the recipe -->
            <h3>Healthy Pizza</h3>
            <!-- Short description of the recipe -->
            <p>Indulge in guilt-free goodness with Healthy Pizza.</p>


        </div>
        <!-- Heading for the featured recipes section -->
        <div class="recipe-card">
            <!-- Image of the Easy Lamb Biryani -->
            <img src="/final_project_website/images/Easy_Lamb_Biryani.jpg" alt="Easy Lamb Biryani">
            <!-- Title of the recipe -->
            <h3>Easy Lamb Biryani</h3>
            <!-- Short description of the recipe -->
            <p>Enjoy the flavorsome simplicity of Easy Lamb Biryani.</p>


        </div>
        <!-- Heading for the featured recipes section -->
        <div class="recipe-card">
            <!-- Image of the Cuscous Salad -->
            <img src="/final_project_website/images/Couscous_Salad.jpg" alt="Cuscous Salad">
            <!-- Title of the recipe -->
            <h3>Couscous Salad</h3>
            <!-- Short description of the recipe -->
            <p>Savor the refreshing blend of flavors in Couscous Salad.</p>

        </div>
        <!-- Heading for the featured recipes section -->
        <div class="recipe-card">
            <!-- Image of the Mango Pie -->
            <img src="/final_project_website/images//Mango_Pie.jpg" alt="Mango Pie">
            <!-- Title of the recipe -->
            <h3>Mango Pie</h3>
            <!-- Short description of the recipe -->
            <p>Delight in the tropical sweetness of Mango Pie.</p>
        </div>
    </section>
    
    <!-- Page Footer -->
    <footer>
        <p>&copy; 2023 Recipe Web App. All rights reserved.</p>
    </footer>
</body>

</html>