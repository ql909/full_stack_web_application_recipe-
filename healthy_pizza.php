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
    <title>Healthy Pizza Recipe</title>
    <link rel="stylesheet" href="dish.css">
</head>

<body>
    <!-- Page header -->
    <header>
        <h1>Healthy Pizza Recipe</h1>
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
            <nav>
    </header>

    <main>
        <article>
            <!-- Article with recipe detials -->
            <div class="recipe-details">
                <img src="/final_project_website/images/Healthy_Pizza.jpg" alt="Healthy Pizza"
                    aria-label="Healthy Pizza">
                <p><strong>Category:</strong> Vegetarian</p>
                <p><strong>Prep Time:</strong> 25 minutes</p>
                <p><strong>Ingredients:</strong></p>
                <p><strong>For the base</strong></p>
                <ul>
                    <li>125g/4½oz self-raising brown or self-raising wholemeal flour, plus extra for dusting</li>
                    <li>pinch fine sea salt</li>
                    <li>125g/4½oz full-fat plain yoghurt</li>
                </ul>
                <p><strong>For the topping</strong></p>
                <ul>
                    <li>1 yellow or orange pepper, seeds removed and thinly sliced</li>
                    <li>1 courgette, cut into 1cm/½in slices</li>
                    <li>1 red onion, cut into thin wedges</li>
                    <li>1 tbsp extra virgin olive oil, plus extra for drizzling</li>
                    <li>½ tsp dried chilli flakes</li>
                    <li>50g/1¾oz ready-grated mozzarella or cheddar, goats’ cheese, broken into small chunks, or 1
                        mozzarella
                        ball, sliced or roughly torn</li>
                    <li>freshly ground black pepper</li>
                    <li>fresh basil leaves, to serve (optional)</li>
                </ul>
                <p><strong>For the tomato sauce</strong></p>
                <ul>
                    <li>6 tbsp passata sauce (approximately 100g/3½oz)</li>
                    <li>1 tsp dried oregano</li>
                </ul>
                <p><strong>Steps:</strong></p>
                <ul>
                    <li>For the base: Mix brown flour, salt, and plain yogurt.</li>
                    <li>For the topping: Dice pepper, courgette, and red onion. Toss with olive oil and chili flakes.
                    </li>
                    <li>Prepare tomato sauce: Mix passata and oregano.</li>
                    <li>Roll out the pizza base, spread tomato sauce, add vegetable topping, and sprinkle cheese.</li>
                    <li>Bake in the oven until the crust is golden and the cheese is melted.</li>
                    <li>Serve and enjoy your healthy pizza!</li>
                </ul>
            </div>
        </article>

        <!-- Learn More Section, link to BBC website -->
        <aside>
            <div class="learn-more-section">
                <p>Want to learn more about healthy pizza? <a
                        href="https://www.bbc.co.uk/food/recipes/healthy_pizza_55143" target="_blank">Visit Here</a></p>
            </div>
        </aside>

        <!-- Rating Section (visible for logged-in users) -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Rating Section -->
            <section aria-label="Recipe rating section" class="rating-section">
                <form action="includes/rate_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="3"> <!-- Adjust with the actual recipe_id -->
                    <label for="rating">Rate this recipe:</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required>
                    <input type="submit" value="Rate Recipe" class="btn">
                </form>
            </section>

            <!-- Save Recipe Section -->
            <section aria-label="Save recipe section" class="save-recipe-section">
                <form action="includes/save_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="3"> <!-- Example recipe ID -->
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