<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// Set the content type to application/json
header('Content-Type: application/json');

// Define the path to the JSON file
$jsonFile = 'sample.json';

// Check if the file exists
if (file_exists($jsonFile)) {
    // Read the file contents
    $jsonData = file_get_contents($jsonFile);
    
    // Decode the JSON to validate it
    $data = json_decode($jsonData, true);
    
    // Check for JSON errors
    if (json_last_error() === JSON_ERROR_NONE) {
        // Output the JSON data
        echo json_encode($data, JSON_PRETTY_PRINT);
    } else {
        // Respond with an error message if JSON is invalid
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON file']);
    }
} else {
    // Respond with an error message if file is not found
    echo json_encode(['status' => 'error', 'message' => 'File not found']);
}

?>
