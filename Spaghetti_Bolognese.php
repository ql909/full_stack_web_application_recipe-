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
    <title>Spaghetti Bolognese Recipe</title>
    <link rel="stylesheet" href="dish.css">
</head>

<body>
    <!-- Page header -->
    <header>
        <h1>Spaghetti Bolognese Recipe</h1>
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
                <img src="/final_project_website/images/Spaghetti_Bolognese.jpg" alt="Spaghetti Bolognese"
                    aria-label="Spaghetti Bolognese">
                <p><strong>Category:</strong> Meat</p>
                <p><strong>Prep Time:</strong> 90 minutes</p>
                <p><strong>Ingredients:</strong>
                <ul>
                    <li>2 tbsp olive oil or sun-dried tomato oil from the jar</li>
                    <li>6 rashers of smoked streaky bacon, chopped</li>
                    <li>2 large onions, chopped</li>
                    <li>3 garlic cloves, crushed</li>
                    <li>1kg/2¼lb lean minced beef</li>
                    <li>2 large glasses of red wine</li>
                    <li>2x400g cans chopped tomatoes</li>
                    <li>1x290g jar antipasti marinated mushrooms, drained</li>
                    <li>2 fresh or dried bay leaves</li>
                    <li>1 tsp dried oregano or a small handful of fresh leaves, chopped</li>
                    <li>1 tsp dried thyme or a small handful of fresh leaves, chopped</li>
                    <li>Drizzle balsamic vinegar</li>
                    <li>12-14 sun-dried tomato halves, in oil</li>
                    <li>Salt and freshly ground black pepper</li>
                    <li>A good handful of fresh basil leaves, torn into small pieces</li>
                    <li>800g-1kg/1¾-2¼lb dried spaghetti</li>
                    <li>Lots of freshly grated parmesan, to serve</li>
                </ul>
                <p><strong>Steps:</strong></p>
                <ul>
                    <li>Heat oil and fry bacon.</li>
                    <li>Add onions and garlic, then minced beef.</li>
                    <li>Pour in wine, reduce, and add tomatoes, mushrooms, herbs, and vinegar.</li>
                    <li>Add sun-dried tomatoes and season.</li>
                    <li>Simmer for 1-1.5 hours.</li>
                    <li>Add basil, cook spaghetti, serve with sauce and parmesan.</li>
                </ul>
            </div>
        </article>

        <!-- Learn More Section, link to BBC website -->
        <aside>
            <div class="learn-more-section">
                <p>Want to learn more about Spaghetti Bolognese? <a
                        href="https://www.bbc.co.uk/food/recipes/spaghettibolognese_67868" target="_blank">Visit
                        Here</a>
                </p>
            </div>
        </aside>

        <!-- Rating Section (visible for logged-in users) -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Rating Section -->
            <section aria-label="Recipe rating section" class="rating-section">
                <form action="includes/rate_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="1"> <!-- Adjust with the actual recipe_id -->
                    <label for="rating">Rate this recipe:</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required>
                    <input type="submit" value="Rate Recipe" class="btn">
                </form>
            </section>

            <!-- Save Recipe Section -->
            <section aria-label="Save recipe section" class="save-recipe-section">
                <form action="includes/save_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="1">
                    <input type="submit" value="Save Recipe" id="saveButton" class="btn"
                        data-save-status="<?= $_SESSION['save_status'] ?? ''; ?>">
                </form>
                <?php unset($_SESSION['save_status']); // Clear the flag ?>
            </section>

        <?php else: ?>
            <p><a href="./account.php">Log in to save and rate this recipe</a></p>
        <?php endif; ?>

    </main>

    <!-- Page Footer -->
    <footer>
        <p>&copy; 2023 Recipe Finder. All rights reserved.</p>
        </p>
    </footer>

</body>

</html>