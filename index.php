<?php

$endpoint = isset($_GET['endpoint']) ? $_GET['endpoint'] : '';

switch ($endpoint) {
    case 'search':
        include 'api/search.php';
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        echo json_encode(["error" => "Invalid endpoint"]);
        exit;
}
?>
