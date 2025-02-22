<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// Set the content type to application/json
header('Content-Type: application/json');

// Sample data to be returned as JSON
$data = [
    'status' => 'success',
    'message' => 'Hello, this is a JSON response!',
    'timestamp' => time(),
    'data' => [
        'id' => 1,
        'name' => 'John Doe',
        'email' => 'john.doe@example.com'
    ]
];

// Convert the PHP array to JSON and output it
echo json_encode($data, JSON_PRETTY_PRINT);

?>
