<?php
echo "update" ;
$data = json_decode(file_get_contents("php://input"));
 // $first_name =  json_decode($_REQUEST['firstname']);
echo $data->id;

$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// $data = json_decode(file_get_contents("php://input"));

$id = $data->id;






$first_name =  $data->firstname;
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




$sql = "
    UPDATE angular SET firstname ='$first_name', middlename='$middle_name', lastname='$last_name', ssn='$ssn',mobile='$mobile_num', email='$email', gender='$gender',designation='$designation', dob='$date_ofbirth', address='$address', file='".$_FILES['myFile']['name']."', state='$city', town='$state', zip='$pincode' 
    WHERE id=$id ";

 if ($conn->query($sql) === TRUE) {
    echo "User updated successfully";
} else {
     echo "Error updating user: " . $conn->error;
 }

 $conn->close();

?>
