<?php
require 'dbh.inc.php'; // Database connection
session_start();

// Check if user is logged in and a recipe ID is provided
if (!isset($_SESSION['user_id']) || !isset($_POST['recipe_id'])) {
    header('Location: ../account.php');
    exit();
}



$user_id = $_SESSION['user_id'];
$recipe_id = $_POST['recipe_id'];

// Prepare the delete query
$stmt = $pdo->prepare("DELETE FROM saved_recipes WHERE user_id = ? AND recipe_id = ?");
$stmt->bindParam(1, $user_id);
$stmt->bindParam(2, $recipe_id);

// Execute and check if successful
if ($stmt->execute()) {
    // Redirect back to user page with a success message
    header('Location: ../user_page.php?removal=success');
} else {
    // Handle errors, e.g., redirect back with an error message
    header('Location: ../user_page.php?removal=error');
}

$stmt->close();
$pdo = null;
?>