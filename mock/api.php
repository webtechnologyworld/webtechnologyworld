<?php
// Set the content type to JSON
header("Content-Type: application/json");

// Get the filename from the query parameter
if (isset($_GET['res'])) {
    $file = basename($_GET['res']); // Prevent directory traversal attacks
    $filePath = "uploads/"."$file.json"; // Append .json extension
    
    // Check if the file exists
    if (file_exists($filePath)) {
        // Read the file content
        $jsonData = file_get_contents($filePath);
        
        // Output the JSON data
        echo $jsonData;
    } else {
        // File not found response
        echo json_encode(["error" => "File not found"]);
    }
}

if (isset($_GET['req'])) {
    $file = basename($_GET['req']); // Prevent directory traversal attacks
    $filePath = "uploads/request/"."$file.json"; // Append .json extension
    
    // Check if the file exists
    if (file_exists($filePath)) {
        // Read the file content
        $jsonData = file_get_contents($filePath);
        
        // Output the JSON data
        echo $jsonData;
    } 
    else {
        // File not found response
        echo json_encode(["error" => "File not found"]);
    }
} 
?>