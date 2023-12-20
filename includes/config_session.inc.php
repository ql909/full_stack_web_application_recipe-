<?php

// Check if the session has not been started yet
if (session_status() == PHP_SESSION_NONE) {
    // Set session ini settings
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_strict_mode', 1);

    // Set session cookie parameters
    session_set_cookie_params([
        'lifetime' => 1800,
        'domain' => 'localhost',
        'path' => '/',
        'secure' => true,
    ]);

    // Start the session
    session_start();
}

if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regeneration"])) {
        regeneration_session_id_loggedin();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regeneration_session_id();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regeneration_session_id();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regeneration_session_id();
        }
    }
}

function regeneration_session_id()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

function regeneration_session_id_loggedin()
{
    session_regenerate_id(true);

    $userId = $_SESSION["user_id"];
    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $userId;
    session_id($sessionId);
    
    $_SESSION["last_regeneration"] = time();
}
function formatRecipeNameForURL($name) {
    return strtolower(str_replace(' ', '_', $name));
}

function fetchRecipes($pdo) {
    // Prepare the SQL query to fetch recipes and their difficulty
    $sql = "SELECT recipe_id, name, category, image_url, difficulty FROM recipes";
    $stmt = $pdo->prepare($sql);

    // Execute the query
    $stmt->execute();

    // Fetch all recipes as an associative array
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>