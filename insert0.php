<?php

$data = json_decode(file_get_contents("php://input"));
 // $first_name =  json_decode($_REQUEST['firstname']);


$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// $data = json_decode(file_get_contents("php://input"));

echo json_decode($_REQUEST['firstname']);






// $first_name =  ;
$middle_name = $data->firstname;
$last_name =  $data->firstname;
$ssn = $data->ssn;
$mobile_num =  $data->ssn;
$email =  $data->firstname;
$gender =  $data->gender;
$designation = $data->designation;
$date_ofbirth =  $data->dob;
$address =  $data->address;
// $file = json_decode($_REQUEST['fileName']);

$city =  $data->city;
$state =  $data->firstname;
$pincode = $data->pincode;






 $conn->close();

?>


