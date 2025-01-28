<?php
include_once('db.php');


// CREATE TABLE contactform (
//     id INT AUTO_INCREMENT PRIMARY KEY,      -- Unique ID for each entry
//     name VARCHAR(255) NOT NULL,             -- Name of the person
//     email VARCHAR(255) NOT NULL,            -- Email address
//     contact VARCHAR(15) NULL,            -- contact number
//     message TEXT NOT NULL,                  -- Message content
//     status BOOLEAN DEFAULT FALSE,           -- Status: TRUE if addressed, FALSE if pending
//     submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Timestamp of submission
// );

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into the database
    $sql = "INSERT INTO contactform (name, email, contact, message) VALUES ('$name', '$email', '$contact', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Thank you for your message! We will get back to you soon."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error saving your message."]);
    }
}

// Close the connection
$conn->close();
?>
