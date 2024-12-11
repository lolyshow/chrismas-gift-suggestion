<?php
// search.php

require_once 'config.php';
require_once 'utils.php';

// Load configuration
$config = include('config.php');

// Fetch the query parameter
$query = isset($_GET['query']) ? htmlspecialchars(trim($_GET['query'])) : '';

// fetch data from the API
$apiUrl = $config['api_base_url'];
$apiData = fetchApiData($apiUrl);
var_dump($apiData);
// filter results
$results = [];
if (!empty($query)) {
    foreach ($apiData as $item) {
        if (stripos($item['title'], $query) !== false) {
            $results[] = [
                "title" => $item['title'],
                "description" => $item['description'],
                "image" => $item['image']
            ];
        }
    }
} else {
    $results = array_slice(array_map(function ($item) {
        return [
            "title" => $item['title'],
            "description" => $item['description'],
            "image" => $item['image']
        ];
    }, $apiData), 0, 10);
}

sendJsonResponse($results);
?>
