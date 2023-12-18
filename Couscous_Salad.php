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
    <title>Couscous Salad Recipe</title>
    <link rel="stylesheet" href="dish.css">
</head>

<body>
    <!-- Page header -->
    <header>
        <h1>Couscous Salad Recipe</h1>
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
                <img src="/final_project_website/images/Couscous_Salad.jpg" alt="Couscous Salad">
                <p><strong>Category:</strong> Vegan</p>
                <p><strong>Prep Time:</strong> 15 minutes</p>
                <p><strong>Ingredients:</strong></p>
                <ul>
                    <li>225g/8oz couscous, prepared according to the packet instructions</li>
                    <li>8 small preserved lemons, flesh and rind finely chopped</li>
                    <li>180g/6⅓oz dried cranberries</li>
                    <li>120g/4⅓oz pine nuts, toasted</li>
                    <li>160g/5¾oz unsalted shelled pistachio nuts, roughly chopped</li>
                    <li>125ml/4fl oz olive oil</li>
                    <li>60g/2¼oz flatleaf parsley, finely chopped</li>
                    <li>4 garlic cloves, crushed</li>
                    <li>4 tbsp red wine vinegar</li>
                    <li>1 red onion, finely chopped</li>
                    <li>1 tsp salt, or to taste</li>
                    <li>80g/2¾oz rocket leaves</li>
                </ul>
                <p><strong>Steps:</strong></p>
                <ul>
                    <li>Cook couscous according to package instructions.</li>
                    <li>Chop preserved lemons, cranberries, pine nuts, pistachio nuts, parsley, and garlic.</li>
                    <li>Make dressing with olive oil, red wine vinegar, red onion, and salt.</li>
                    <li>Mix couscous, lemons, cranberries, nuts, dressing, and rocket leaves.</li>
                    <li>Your flavorful couscous salad is ready to be enjoyed!</li>
                </ul>
            </div>
        </article>

        <!-- Learn More Section, link to BBC website -->
        <aside>
            <div class="learn-more-section">
                <p>Want to learn more about Couscous Salad? <a
                        href="https://www.bbc.co.uk/food/recipes/dried_fruits_and_nuts_18053" target="_blank">Visit
                        Here</a>
                </p>
            </div>
        </aside>

        <!-- Rating Section (visible for logged-in users) -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Rating Section -->
            <section aria-label="Recipe rating section" class="rating-section">
                <form action="includes/rate_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="5"> <!-- Adjust with the actual recipe_id -->
                    <label for="rating">Rate this recipe:</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required>
                    <input type="submit" value="Rate Recipe" class="btn">
                </form>
            </section>

            <!-- Save Recipe Section -->
            <section aria-label="Save recipe section" class="save-recipe-section">
                <form action="includes/save_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="5"> <!-- Example recipe ID -->
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