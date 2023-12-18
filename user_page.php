<?php
// Start the session to maintain a log of the user's state
session_start();
// Include database connection details
require_once 'includes/dbh.inc.php';
// Include session configuration
require_once 'includes/config_session.inc.php';
// Configure PHP to display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Redirect the user to the login page if they're not logged in.
if (!isset($_SESSION["user_id"])) {
    header("Location: ../account.php");
    exit();
}


// Fetch the saved recipes for the logged-in user
function getSavedRecipes($pdo, $userId)
{
    // SQL query to join recipes with saved recipes for the current user
    $sql = "SELECT recipes.* FROM recipes
            JOIN saved_recipes ON recipes.recipe_id = saved_recipes.recipe_id
            WHERE saved_recipes.user_id = :userId";
    // Prepare the SQL statement for execution
    $stmt = $pdo->prepare($sql);
    // Bind the userId parameter
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    // Execute the SQL statement
    $stmt->execute();
    // Return the fetched recipes
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch the user's details from the database
function getUserDetails($pdo, $userId)
{
    // SQL query to select username and email from users table
    $sql = "SELECT username, email FROM users WHERE id = :userId";
    // Prepare the SQL statement for execution
    $stmt = $pdo->prepare($sql);
    // Bind the userId parameter
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    // Execute the SQL statement
    $stmt->execute();
    // Return the fetched user details
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Attempt to fetch the saved recipes and user details
try {
    // Get the saved recipes for the logged-in user
    $savedRecipes = getSavedRecipes($pdo, $_SESSION["user_id"]);
    // Get the details of the logged-in user
    $userDetails = getUserDetails($pdo, $_SESSION["user_id"]);
} catch (Exception $e) {
    // In case of an error, set savedRecipes to an empty array and create an error message
    $savedRecipes = [];
    $error = "Failed to get data: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Saved Recipes</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>
    <!-- Page header -->
    <header role="banner">
        <h1>Welcome
            <?= htmlspecialchars($userDetails['username']) ?> | email:
            <?= htmlspecialchars($userDetails['email']) ?>
        </h1>
        <nav role="navigation">
            <ul>
                <li><a href="main.php">Main</a></li>
                <li><a href="includes/search_page1.php">Search Recipes</a></li>
                <li><a href="includes/logout.inc.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main content area where saved recipes are displayed -->
    <main role="main">
        <!-- Check if there are any saved recipes to display -->
        <?php if (!empty($savedRecipes)): ?>
            <!-- Section for displaying saved recipes -->
            <section class="featured-recipes" aria-labelledby="saved-recipes-title">
                <!-- Loop through each saved recipe to create a card for it -->
                <?php foreach ($savedRecipes as $recipe): ?>
                    <div class="recipe-card">
                        <img src="<?= htmlspecialchars($recipe['image_url']) ?>"
                            alt="Image of <?= htmlspecialchars($recipe['name']) ?>" width="400px">
                        <h3>
                            Recipe Name:
                            <?= htmlspecialchars($recipe['name']) ?><br>
                        </h3>
                        <p>
                            Difficulty Level:
                            <?= htmlspecialchars($recipe['difficulties']) ?><br>
                            Category:
                            <?= htmlspecialchars($recipe['category']) ?>
                        </p>
                        <!-- Link to view the full recipe -->
                        <a href="<?= formatRecipeNameForURL(htmlspecialchars($recipe['name'])) ?>.php" class="btn">View
                            Recipe</a>
                        <p><br></p>
                        </form>
                        <!-- Form to remove a recipe from the saved list -->
                        <form action="includes/remove_recipe.php" method="post">
                            <input type="hidden" name="recipe_id" value="<?= $recipe['recipe_id'] ?>">
                            <button type="submit" class="btn">Remove Recipe</button>
                        </form>

                    </div>
                <?php endforeach; ?>
            </section>
        <?php else: ?>
            <p>You haven't saved any recipes yet.</p>
        <?php endif; ?>

        </div>
    </main>

    <!-- Page footer -->
    <footer>
        <p>&copy; 2023 Recipe Web App. All rights reserved.</p>
    </footer>
</body>


</html>