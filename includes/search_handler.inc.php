<?php
// search_handler.inc.php

function executeSearch($pdo)
{
    // Initialize an empty array for results
    $results = [];
    $searchExecuted = false;

    // Check if the search button has been clicked
    if (isset($_GET['search']) || isset($_GET['search_query'])) {
        $searchExecuted = true;

        $category = $_GET['category'] ?? 'All';
        $prep_time = $_GET['prep_time'] ?? 'All';
        $difficulties = $_GET['difficulties'] ?? 'All';
        $searchQuery = $_GET['search_query'] ?? ''; // Retrieve the search query

        // Start building the query
        $query = "SELECT * FROM recipes WHERE 1";

        // Array to hold parameters for prepared statement
        $params = [];

        // Filter by category if not 'All'
        if ($category !== 'All') {
            $query .= " AND category = :category";
            $params[':category'] = $category;
        }

        // Filter by preparation time if not 'All'
        if ($prep_time !== 'All') {
            if ($prep_time === "0-30") {
                $query .= " AND prep_time <= :prep_time_30";
                $params[':prep_time_30'] = 30;
            } elseif ($prep_time === "30-60") {
                $query .= " AND prep_time > :prep_time_30 AND prep_time <= :prep_time_60";
                $params[':prep_time_30'] = 30;
                $params[':prep_time_60'] = 60;
            } elseif ($prep_time === "60+") {
                $query .= " AND prep_time > :prep_time_60";
                $params[':prep_time_60'] = 60;
            }
        }

        // Filter by number of steps if provided
        // if (!empty($steps)) {
        //    $query .= " AND steps <= :steps";
        //    $params[':steps'] = intval($steps);
        // }

        if ($difficulties !== 'All') {
            $query .= " AND difficulties = :difficulties";
            $params[':difficulties'] = $difficulties;
        }

        // Filter by search query if provided
        if (!empty($searchQuery)) {
            $query .= " AND name LIKE :search_query";
            $params[':search_query'] = "%" . $searchQuery . "%";
        }

        // Prepare the query
        $stmt = $pdo->prepare($query);

        // Execute the query with the parameters
        $stmt->execute($params);

        // Fetch the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Return the results and the search executed flag
    return ['results' => $results, 'searchExecuted' => $searchExecuted];
}
?>