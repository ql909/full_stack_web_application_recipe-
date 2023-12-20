<?php
require_once 'dbh.inc.php'; // This file contains the PDO database connection
require_once 'signup_view.inc.php';
// require_once 'config_session.inc.php';
require_once 'login_view.inc.php';
require_once 'search_handler.inc.php'; // This file contacts the search functions

$searchOutcome = executeSearch($pdo);
$results = $searchOutcome['results'];
$searchExecuted = $searchOutcome['searchExecuted'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Search</title>
    <link rel="stylesheet" href="search_page1.css">
</head>

<body>
    <header>
        <h1>Find Your Favorite Recipes</h1>
        <nav>
            <ul>
                <li>
                    <?php output_username(); ?>
                <li>
                <li><a href="../main.php">Main</a></li>
                <li>
                    <?php is_logged_in_myaccount1(); ?>
                </li>
                <li>
                    <?php is_logged_in_forloggout1(); ?>
                </li>
            </ul>
        </nav>
    </header>

    <section>
        <div class="flex-container">
            <form action="search_page1.php" method="get">
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" id="category">
                        <option value="All">All Categories</option>
                        <option value="Meat">Meat</option>
                        <option value="Vegan">Vegan</option>
                        <option value="Vegetarian">Vegetarian</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="prep_time">Preparation Time:</label>
                    <select name="prep_time" id="prep_time">
                        <option value="All">Any Time</option>
                        <option value="0-30">Under 30 minutes</option>
                        <option value="30-60">30 to 60 minutes</option>
                        <option value="60+">More than 60 minutes</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="difficulties">Difficult Level:</label>
                    <select name="difficulties" id="difficulties">
                        <option value="All">Any Level</option>
                        <option value="Easy">Easy</option>
                        <option value="Medium">Medium</option>
                        <option value="Hard">Hard</option>
                    </select>                    
                </div>
                
                <div class="form-group">
                    <label for="search_query">Search Recipes:</label>
                    <input type="text" name="search_query" id="search_query" placeholder="Type a recipe name or keyword" aria-label="Search Recipes">
                </div>

                <div class="form-group">
                    <input type="submit" name="search" value="Search">
                </div>
            </form>
        </div>
    </section>

    <div class="container">
        <?php if ($searchExecuted && $results): ?>
            <table>
                <thead>
                    <tr>
                        <th>Recipe</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Preparation Time</th>
                        <th>Difficult Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($row['name']) ?>
                            </td>
                            <td><img src="<?= htmlspecialchars($row['image_url']) ?>" alt="Recipes Photo"></td>
                            <td>
                                <?= htmlspecialchars($row['category']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['prep_time']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($row['difficulties']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php elseif ($searchExecuted): ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2023 Recipe Finder. All rights reserved.</p>
    </footer>
</body>

</html>