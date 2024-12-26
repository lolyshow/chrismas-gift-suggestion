<?php
require_once 'utils.php';
include  "../helper/Helper.php";

$helper = new Helper();
$config = include('config.php');

$query = isset($_GET['query']) ? htmlspecialchars(trim($_GET['query'])) : '';

// fetch data from the API
$apiUrl = $config['api_base_url'];
$apiData = fetchApiData($apiUrl);
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
$helper->success( $results);
?>
