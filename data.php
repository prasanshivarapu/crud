<?php
// Create a database connection
$conn = new mysqli('localhost', 'admin', '1234', 'college');

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// Get JSON data from the AngularJS form
$form_data = json_decode(file_get_contents("php://input"));

 echo  $form_data;
?>