<?php

require_once 'config_session.inc.php';
require_once 'dbh.inc.php'; // Ensure this is the correct path to your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: includes/login.inc.php'); // Redirect to login page
    exit();
}

// Check for a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['user_id'];
    $recipeId = $_POST['recipe_id']; // The recipe ID to save

    // Check if the recipe is already saved
    $checkStmt = $pdo->prepare("SELECT * FROM saved_recipes WHERE user_id = ? AND recipe_id = ?");
    $checkStmt->execute([$userId, $recipeId]);

    if ($checkStmt->rowCount() > 0) {
        echo "You have already saved this recipe.";
    } else {
        // Prepare and Execute Insert
        $insertStmt = $pdo->prepare("INSERT INTO saved_recipes (user_id, recipe_id) VALUES (?, ?)");
        try {
            $insertStmt->execute([$userId, $recipeId]);
            echo "Recipe saved successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>