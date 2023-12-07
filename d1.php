<?php
$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"));

$firstname = $data->firstname;
$lastname = $data->lastname;
$middlename = $data->middlename;
$address = $data->address;
$pincode = $data->pincode;

$sql = "INSERT INTO users (firstname, lastname, middlename, address, pincode) VALUES ('$firstname', '$lastname', '$middlename', '$address', '$pincode')";

if ($conn->query($sql) === TRUE) {
    echo "User added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
