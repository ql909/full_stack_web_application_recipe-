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
    <title>Vegan Pancakes Recipe</title>
    <link rel="stylesheet" href="dish.css">
</head>

<body>
    <!-- Page header -->
    <header>
        <h1>Vegan Pancakes Recipe</h1>
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
                <img src="/final_project_website/images/Vegan_Pancakes.jpg" alt="Vegan Pancakes" role="img"
                    aria-label="Vegan Pancakes">
                <p><strong>Category:</strong> Vegan</p>
                <p><strong>Prep Time:</strong> 15 minutes</p>
                <p><strong>Ingredients:</strong></p>
                <ul>
                    <li>125g/4½oz self-raising flour.</li>
                    <li>2 tbsp caster sugar</li>
                    <li>1 tsp baking powder</li>
                    <li>good pinch sea salt</li>
                    <li>150ml/5fl oz soya milk or almond milk</li>
                    <li>¼ tsp vanilla extract</li>
                    <li>4 tsp sunflower oil, for frying</li>
                </ul>
                <p><strong>Steps:</strong></p>
                <ul>
                    <li>Mix flour, sugar, baking powder, salt.</li>
                    <li>Add milk, vanilla, mix until smooth.</li>
                    <li>Heat oil in a pan, pour batter, spread to 10cm diameter.</li>
                    <li>Cook until bubbles appear, flip, cook until golden.</li>
                    <li>Keep warm, repeat for remaining pancakes.</li>
                    <li>Serve with your favorite toppings.</li>
                </ul>
            </div>
        </article>

        <!-- Learn More Section, link to BBC website -->
        <aside>
            <div class="learn-more-section">
                <p>Want to learn more about Vegan Pancakes?
                    <a href="https://www.bbc.co.uk/food/recipes/vegan_american_pancakes_76094" target="_blank">Visit
                        Here</a>
                </p>
            </div>
        </aside>

        <!-- Rating Section (visible for logged-in users) -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <section aria-label="Recipe rating section" class="rating-section">
                <form action="includes/rate_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="2"> <!-- Adjust with the actual recipe_id -->
                    <label for="rating">Rate this recipe:</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required>
                    <input type="submit" value="Rate Recipe" class="btn">
                </form>
            </section>

            <!-- Save Recipe Section -->
            <section aria-label="Save recipe section" class="save-recipe-section">
                <form action="includes/save_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="2"> <!-- Adjust with the actual recipe_id -->
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
        <p>&copy; 2023 Recipe Finder. All rights reserved.</p>
    </footer>

</body>

</html>