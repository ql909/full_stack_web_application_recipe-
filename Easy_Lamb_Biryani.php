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
    <title>Easy Lamb Biryani Recipe</title>
    <link rel="stylesheet" href="dish.css">
</head>

<body>
    <!-- Page header -->
    <header>
        <h1>Easy Lamb Biryani Recipe</h1>
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
                <img src="/final_project_website/images/Easy_Lamb_Biryani.jpg" alt="Easy Lamb Biryani">
                <p><strong>Category:</strong> Meat</p>
                <p><strong>Prep Time:</strong> 90 minutes</p>
                <p><strong>Ingredients:</strong></p>
                <ul>
                    <li>5 tbsp vegetable oil</li>
                    <li>2 onions, finely sliced</li>
                    <li>200g/7oz Greek or natural yoghurt</li>
                    <li>4 tbsp finely grated ginger</li>
                    <li>3 tbsp finely grated garlic</li>
                    <li>1–2 tsp Kashmiri red chilli powder</li>
                    <li>5 tsp ground cumin</li>
                    <li>1 tsp ground cardamom seeds</li>
                    <li>4 tsp sea salt</li>
                    <li>1 lime, juice only</li>
                    <li>800g/1lb 12oz boneless lamb tenderloin or leg, cut into bite-sized pieces</li>
                    <li>30g/1oz mint leaves, finely chopped</li>
                    <li>3–4 green chillies, finely chopped</li>
                    <li>30g/1oz coriander leaves and stalks, finely chopped</li>
                    <li>1½ tbsp full-fat milk</li>
                    <li>4 tbsp double cream</li>
                    <li>1 tsp saffron strands (a large pinch)</li>
                    <li>2 tbsp pomegranate seeds, to garnish (optional)</li>
                    <li>400g/14oz basmati rice</li>
                </ul>
                <p><strong>Steps:</strong></p>
                <ul>
                    <li>Heat vegetable oil, fry onions until golden.</li>
                    <li>Mix yoghurt, ginger, garlic, chili powder, cumin, cardamom, salt, lime, coriander, mint, and
                        green
                        chillies.</li>
                    <li>Add lamb, marinate and cook until browned.</li>
                    <li>Boil rice and layer with lamb mixture. Drizzle cream, milk, and saffron.</li>
                    <li>Bake until rice is cooked. Garnish with pomegranate seeds.</li>
                    <li>Serve your delicious lamb biryani!</li>
                </ul>
            </div>
        </article>

        <!-- Learn More Section, link to BBC website -->
        <aside>
            <div class="learn-more-section">
                <p>Want to learn more about Easy Lamb Biryani? <a
                        href="https://www.bbc.co.uk/food/recipes/easy_lamb_biryani_46729" target="_blank">Visit Here</a>
                </p>
            </div>
        </aside>

        <!-- Rating Section (visible for logged-in users) -->
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- Rating Section -->
            <section aria-label="Recipe rating section" class="rating-section">
                <form action="includes/rate_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="4"> <!-- Adjust with the actual recipe_id -->
                    <label for="rating">Rate this recipe:</label>
                    <input type="number" name="rating" id="rating" min="1" max="5" required>
                    <input type="submit" value="Rate Recipe" class="btn">
                </form>
            </section>

            <!-- Save Recipe Section -->
            <section aria-label="Save recipe section" class="save-recipe-section">
                <form action="includes/save_recipe.php" method="post">
                    <input type="hidden" name="recipe_id" value="4"> <!-- Example recipe ID -->
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