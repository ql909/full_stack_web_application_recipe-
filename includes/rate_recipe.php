<?php
// rate_recipe.php

// Start the session


require_once 'config_session.inc.php';
require_once 'dbh.inc.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: ../account.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipe_id = $_POST['recipe_id'];
    $rating = $_POST['rating'];

    if (!is_numeric($rating) || $rating < 1 || $rating > 5) {
        echo "Invalid rating value!";
        exit();
    }

    $user_id = $_SESSION['user_id'];

    try {

        $insert_query = "INSERT INTO recipe_ratings (recipe_id, user_id, rating_value) 
        VALUES (:recipe_id, :user_id, :rating_value)
        ON DUPLICATE KEY UPDATE rating_value = :rating_value";
        $stmt = $pdo->prepare($insert_query);
        $stmt->execute([
            'recipe_id' => $recipe_id,
            'user_id' => $user_id,
            'rating_value' => $rating
        ]);

        // Redirect to a success page or back to the recipe page
        header('Location: ../user_page.php');
    } catch (PDOException $e) {
        echo "Failed to rate recipe: " . $e->getmessage();
    }
}
?>