<?php

$conn = new mysqli('localhost', 'admin', '1234', 'college');


if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}



$form_data = json_decode(file_get_contents("php://input"), true); 
echo $form_data ;
// $contacts = $form_data['contacts'];
// echo $form_data['contacts'];
// echo $form_data['formData'];
// echo  $contacts;
var_dump($contacts);
?>
