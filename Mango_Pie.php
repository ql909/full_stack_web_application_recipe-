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
    <title>Mango Pie Recipe</title>
    <link rel="stylesheet" href="dish.css">
</head>

<body>
    <!-- Page header -->
    <header>
        <h1>Mango Pie Recipe</h1>
        <nav>
            <ul>
                <li>
                    <?php output_username(); ?>
                <li>
                <li>
                    <?php is_logged_in_search(); ?>
                </li>
                <li><a href="main.php">Main</a></li>
                <li>
                    <?php is_logged_in_myaccount(); ?>
                </li>
                <li>
                    <?php is_logged_in_forloggout(); ?>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <article>
            <!-- Article with recipe detials -->
            <div class="recipe-details">
                <img src="/final_project_website/images/Mango_Pie.jpg" alt="Mango Pie" aria-label="Mango Pie">
                <p><strong>Category:</strong> Vegetarian</p>
                <p><strong>Prep Time:</strong> 60 minutes</p>
                <p><strong>Ingredients:</strong>
                <p>
                <p><strong>For the biscuit base</strong></p>
                <ul>
                    <li>280g/10oz digestive biscuits</li>
                    <li>65g/2¼oz granulated sugar</li>
                    <li>¼ tsp ground cardamom</li>
                    <li>128g/4½oz unsalted butter, melted</li>
                    <li>large pinch sea salt</li>
                </ul>
                <p><strong>For the mango custard filling</strong></p>
                <ul>
                    <li>100g/3½ oz granulated sugar</li>
                    <li>2 tbsp plus ¼ tsp powdered gelatine</li>
                    <li>120ml/4fl oz double cream</li>
                    <li>115g/4 oz cream cheese, at room temperature</li>
                    <li>850g tin Alfonso mango pulp</li>
                    <li>large pinch sea salt</li>
                </ul>
                <p><strong>Steps:</strong></p>
                <ul>
                    <li>Create a biscuit base using digestive biscuits, sugar, cardamom, butter, and salt.</li>
                    <li>Prepare mango custard filling with sugar, gelatine, cream, cream cheese, mango pulp, and salt.
                    </li>
                    <li>Combine the biscuit base and mango custard filling.</li>
                    <li>Chill the pie in the refrigerator until set.</li>
                    <li>Serve chilled slices of delightful Mango Pie.</li>
                </ul>
            </div>
        </article>

        <!-- Learn More Section, link to BBC website -->
        <aside>
            <div class="learn-more-section">
                <p>Want to learn more about mango pie? <a href="https://www.bbc.co.uk/food/recipes/mango_pie_18053"
                        target="_blank">Visit Here</a></p>
            </div>
        </aside>

        <!-- Rating Section (visible for logged-in users) -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <section aria-label="Recipe rating section" class="rating-section">
                <form action="includes/rate_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="6"> <!-- Adjust with the actual recipe_id -->
                    <label for="rating">Rate this recipe:</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required>
                    <input type="submit" value="Rate Recipe" class="btn">
                </form>
            </section>

            <!-- Save Recipe Section -->
            <section aria-label="Save recipe section" class="save-recipe-section">
                <form action="includes/save_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="6"> <!-- Example recipe ID -->
                    <input type="submit" value="Save Recipe" id="saveButton" class="btn"
                        data-save-status="<?php echo $_SESSION['save_status'] ?? ''; ?>">
                </form>
                <?php unset($_SESSION['save_status']); // Clear the flag ?>
            </section>

        <?php else: ?>
            <p><a href="./account.php">Log in to save this recipe</a></p>

        <?php endif; ?>
    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2023 Recipe Finder</p>
    </footer>

</body>

</html>