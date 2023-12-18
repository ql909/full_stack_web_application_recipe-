<?php
// Include the sign-up view functions
require_once 'includes/signup_view.inc.php';
// Include the login view functions
require_once 'includes/login_view.inc.php';
// Include the database handler
require_once 'includes/dbh.inc.php';


// Function to get the average rating for a recipe
function get_average_rating($pdo, $recipe_id)
{
    // Prepare a SQL statement to select the average rating for a given recipe ID
    $stmt = $pdo->prepare("SELECT AVG(rating_value) as average_rating FROM recipe_ratings WHERE recipe_id = :recipe_id");
    // Execute the SQL statement with the recipe ID parameter
    $stmt->execute([':recipe_id' => $recipe_id]);
    // Fetch the result as an associative array
    $rating = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the rating exists and is not null
    if ($rating && $rating['average_rating'] !== null) {
        // Output the average rating, rounded to one decimal place
        echo "Average Rating: " . round($rating['average_rating'], 1);
    } else {
        // Output that there are no ratings if none exist
        echo "No ratings yet.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Web App</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <!-- Page header -->
    <header>
        <h1>Welcome to the Recipe Webpage</h1>
        <nav aria-label="Main navigation">
            <ul>
                <li>
                    <?php output_username(); ?>
                <li>
                <li>
                    <!-- Display the search function if logged in -->
                    <?php is_logged_in_search(); ?>
                </li>
                <li><a href="../Final_Project_Website/index.php">Home</a></li>
                <li>
                    <?php is_logged_in_myaccount(); ?>
                </li>
                <li>
                    <?php is_logged_in_forloggout(); ?>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Section for feature recipes -->
    <section class="featured-recipes" aria-labelledby="featured-recipes-heading">
        <h2 id="featured-recipes-heading">Featured Recipes</h2>
        <!-- Start of recipe card for Spaghetti Bolognese -->
        <div class="recipe-card" role="article">
            <!-- Image of the Spaghetti Bolognese -->
            <img src="/final_project_website/images/Spaghetti_Bolognese.jpg" alt="Spaghetti Bolognese" width=400px>
            <h3>Spaghetti Bolognese</h3>
            <!-- Description of the Spaghetti Bolognese recipe -->
            <p>Spaghetti Bolognese is a classic Italian pasta dish that combines al dente spaghetti with a savory meat
                sauce. The sauce, made with ground beef, onions, garlic, and tomatoes, is simmered to develop a rich and
                hearty flavor. Topped with grated Parmesan, it's a satisfying and timeless comfort food loved worldwide.
            </p>
            <!-- Display the average rating for the recipe -->
            <?php echo get_average_rating($pdo, 1); //ID for this recipe?>
            <p><br></p>
            <!-- Link to the full recipe -->
            <a href="Spaghetti_Bolognese.php" class="btn" aria-label="View Spaghetti Bolognese Recipe">View Recipe</a>

        </div>
        <!-- Start of recipe card for Vegan Pancakes -->
        <div class="recipe-card" role="article">
            <!-- IMage of the Vegan Pancakes recipe -->
            <img src="/final_project_website/images/Vegan_Pancakes.jpg" alt="Vegan Pancakes">
            <h3>Vegan Pancakes</h3>
            <!-- Description of the Vegan Pancakes recipe -->
            <p>Vegan pancakes are a plant-based twist on the classic breakfast favorite. Made without eggs or dairy,
                these fluffy and delicious pancakes use ingredients like plant-based milk, flour, baking powder, and a
                touch of sweetness. They offer a cruelty-free and cholesterol-free alternative that can be enjoyed by
                vegans and non-vegans alike.</p>
            <!-- Display the average rating for the recipe -->
            <?php echo get_average_rating($pdo, 2); // ID for this recipe?>
            <p><br></p>
            <!-- Link to the full recipe -->
            <a href="Vegan_Pancakes.php" class="btn" aria-label="Vegan Pancakes Recipe>View Recipe">View Recipe</a>
        </div>
        <!-- Start of recipe card for Healthy Pizza -->
        <div class="recipe-card" role="article">
            <!-- Image of the Healthy Pizza -->
            <img src="/final_project_website/images/Healthy_Pizza.jpg" alt="Healthy Pizza">
            <h3>Healthy Pizza</h3>
            <!-- Description of the Healthy Pizza recipe -->
            <p>Healthy pizza is a nutritious take on the beloved comfort food. It features a whole wheat crust, topped
                with fresh vegetables, lean protein sources like grilled chicken or tofu, and reduced-fat cheese or
                vegan alternatives. It offers a delicious way to enjoy pizza while incorporating wholesome ingredients
                and mindful choices for a balanced meal.</p>
            <!-- Display the average rating for the recipe -->
            <?php echo get_average_rating($pdo, 3); //ID for this recipe?>
            <p><br></p>
            <!-- Link to the full recipe -->
            <a href="Healthy_Pizza.php" class="btn" aria-label="View Healthy Pizza Recipe">View Recipe</a>

        </div>
        <!-- Start of recipe card for Easy Lamb Biryani -->
        <div class="recipe-card" role="article">
            <!-- Image of the Easy Lamb Biryani -->
            <img src="/final_project_website/images/Easy_Lamb_Biryani.jpg" alt="Easy Lamb Biryani">
            <h3>Easy Lamb Biryani</h3>
            <!-- Description of the Easy Lamb Biryani -->
            <p>Easy lamb biryani is a flavorful and aromatic one-pot dish. Tender lamb pieces are cooked with fragrant
                spices, such as cumin, coriander, and garam masala, along with basmati rice and vegetables. This dish is
                simple to prepare, combining succulent meat, aromatic rice, and a medley of spices for a delicious and
                satisfying meal.</p>
            <!-- Display the average rating for the recipe -->
            <?php echo get_average_rating($pdo, 4); //ID for this recipe?>
            <p><br></p>
            <!-- Link to the full recipe -->
            <a href="Easy_Lamb_Biryani.php" class="btn" aria-label="View Easy Lamb Biryani Recipe">View Recipe</a>

        </div>
        <!-- Start of recipe card for Couscous Salad -->
        <div class="recipe-card" role="article">
            <!-- Image of the Couscous Salad -->
            <img src="/final_project_website/images/Couscous_Salad.jpg" alt="Couscous Salad">
            <h3>Couscous Salad</h3>
            <!-- Description of the Couscous Salad recipe -->
            <p>Couscous salad is a light and refreshing dish that combines fluffy couscous with a variety of fresh
                ingredients. It typically includes colorful vegetables like tomatoes, cucumbers, and bell peppers, along
                with herbs like parsley and mint. The salad is often dressed with a tangy vinaigrette, making it a
                flavorful and versatile side or main course option.</p>
            <!-- Display the average rating for the recipe -->
            <?php echo get_average_rating($pdo, 5); //ID for this recipe?>
            <p><br></p>
            <!-- Link to the full recipe -->
            <a href="Couscous_Salad.php" class="btn" aria-label="View Couscous Salad Recipe">View Recipe</a>

        </div>
        <!-- Start of recipe card for Mango Pie -->
        <div class="recipe-card" role="article">
            <!-- Image of the Mango Pie -->
            <img src="/final_project_website/images//Mango_Pie.jpg" alt="Mango Pie">
            <h3>Mango Pie</h3>
            <!-- Description of the Mango Pie recipe -->
            <p>Mango pie is a heavenly dessert that captures the essence of summer. Its golden crust cradles a luscious
                filling bursting with the tropical sweetness of ripe mangoes. The velvety texture and vibrant flavor of
                the mango filling create a delightful contrast with the buttery, flaky crust. A slice of mango pie is
                pure bliss, transporting you to a sunny paradise with every bite.</p>
            <!-- Display the average rating for the recipe -->
            <?php echo get_average_rating($pdo, 6); //ID for this recipe?>
            <p><br></p>
            <!-- Link to the full recipe -->
            <a href="Mango_Pie.php" class="btn" aria-label="View Mango Pie Recipe">View Recipe</a>
        </div>
    </section>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2023 Recipe Web App. All rights reserved.</p>
    </footer>
</body>

</html>