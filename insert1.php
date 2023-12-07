<!-- 

<?php

$conn = new mysqli('localhost', 'admin', '1234', 'college');
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
$data = array();
// $error = array();
 
    $first_name = mysqli_real_escape_string($connect, $form_data->firstname); 
    $middle_name = mysqli_real_escape_string($connect, $form_data->middlename); 
    $last_name = mysqli_real_escape_string($connect, $form_data->lastname);
    $ssn = mysqli_real_escape_string($connect, $form_data->ssn); 
    $mobile_num = mysqli_real_escape_string($connect, $form_data->mobile); 
    $email = mysqli_real_escape_string($connect, $form_data->email); 
    $gender = mysqli_real_escape_string($connect, $form_data->gender); 
    $designation = mysqli_real_escape_string($connect, $form_data->designation); 
    $date_ofbirth = mysqli_real_escape_string($connect, $form_data->dob); 
    $address = mysqli_real_escape_string($connect, $form_data->address);
    
    $city = mysqli_real_escape_string($connect, $form_data->town); 
    $state = mysqli_real_escape_string($connect, $form_data->state); 
    $pincode = mysqli_real_escape_string($connect, $form_data->zip); 
    $query = "
    INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender,
    designation, dob, address, state, town, zip)  VALUES ('$first_name','$middle_name', '$last_name','$ssn','$mobile_num','$email','$gender','$designation','$date_ofbirth', '$address',
       '$city','$state','$pincode')
    ";
    if(mysqli_query($connect, $query))
    {
      $data["message"] = "Data Inserted...";
    }

echo json_encode($data);
?>














































<!-- <?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

error_log("Received data: " . json_encode($data));

ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);

$postdata = file_get_contents("php://input");
file_put_contents('debug.txt', $postdata);
// Get form data from AngularJS
$data = json_decode($postdata);
// $data = json_decode(file_get_contents("php://input"));

if ($data) {
    // Data was successfully decoded

    // Replace these database connection details with your own
    $servername = 'localhost';
    $username = 'admin';
    $password = '1234';
    $dbname = 'college';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }

    // Sanitize and validate data (consider using prepared statements for security)
    $firstname = mysqli_real_escape_string($conn, $data->firstname);
    $middlename = mysqli_real_escape_string($conn, $data->middlename);
    $lastname = mysqli_real_escape_string($conn, $data->lastname);
    $ssn = mysqli_real_escape_string($conn, $data->ssn);
    $mobile = mysqli_real_escape_string($conn, $data->mobile);
    $email = mysqli_real_escape_string($conn, $data->email);
    $gender = mysqli_real_escape_string($conn, $data->gender);
    $designation = mysqli_real_escape_string($conn, $data->designation);
    $dob = mysqli_real_escape_string($conn, $data->dob);
    $address = mysqli_real_escape_string($conn, $data->address);
    $state = mysqli_real_escape_string($conn, $data->state);
    $town = mysqli_real_escape_string($conn, $data->town);
    $zip = mysqli_real_escape_string($conn, $data->zip);

   
    if ($stmt->execute()) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Data could not be decoded
    http_response_code(400); // Bad Request
    echo "Invalid data received.";
}
?>

 -->































<!-- <?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
file_put_contents('debug.txt', print_r($data, true));
$data= '';
// Get form data from AngularJS
$data = json_decode(file_get_contents("php://input"));

if ($data) {
    // Data was successfully decoded
    error_log('Received data: ' . json_encode($data));

    $conn = new mysqli('localhost', 'admin', '1234', 'college');
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }

    // Extract data from the decoded JSON
    $firstname = $data->firstname;
    $middlename = $data->middlename;
    $lastname = $data->lastname;
    $ssnname = $data->ssnname;
    $mobile = $data->mobile;
    $email = $data->email;
    $gender = $data->gender;
    $designation = $data->designation;
    $dob = $data->dob;
    $address = $data->address;
    $state = $data->state;
    $town = $data->town;
    $zip = $data->zip;

    // Insert form data into MySQL (without prepared statement)
    $sql = "INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender, designation, dob, address, state, town, zip) VALUES ('$firstname', '$middlename', '$lastname', '$ssnname', '$mobile', '$email', '$gender', '$designation', '$dob', '$address', '$state', '$town', '$zip')";

    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Data could not be decoded
    http_response_code(400); // Bad Request
    echo "Invalid data received.";
}
?> -->

 
 
 
<!--  
  // Insert form data into MySQL using prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender, designation, dob, address, state, town, zip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssss", $firstname, $middlename, $lastname, $ssn, $mobile, $email, $gender, $designation, $dob, $address, $state, $town, $zip);

    if ($stmt->execute()) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Data could not be decoded
    http_response_code(400); // Bad Request
    echo "Invalid data received.";
}
?> -->

































<!-- <?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
file_put_contents('debug.txt', print_r($data, true));
$data= '';
// Get form data from AngularJS
$data = json_decode(file_get_contents("php://input"));

if ($data) {
    // Data was successfully decoded
    error_log('Received data: ' . json_encode($data));

    $conn = new mysqli('localhost', 'admin', '1234', 'college');
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }

    // Extract data from the decoded JSON
    $firstname = $data->firstname;
    $middlename = $data->middlename;
    $lastname = $data->lastname;
    $ssnname = $data->ssnname;
    $mobile = $data->mobile;
    $email = $data->email;
    $gender = $data->gender;
    $designation = $data->designation;
    $dob = $data->dob;
    $address = $data->address;
    $state = $data->state;
    $town = $data->town;
    $zip = $data->zip;

    // Insert form data into MySQL (without prepared statement)
    $sql = "INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender, designation, dob, address, state, town, zip) VALUES ('$firstname', '$middlename', '$lastname', '$ssnname', '$mobile', '$email', '$gender', '$designation', '$dob', '$address', '$state', '$town', '$zip')";

    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    // Data could not be decoded
    http_response_code(400); // Bad Request
    echo "Invalid data received.";
}
?> -->

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <!-- <?php
error_log('Received data: ' . json_encode($data));

$conn = new mysqli('localhost', 'admin', '1234', 'college');
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// Get form data from AngularJS
$data = json_decode(file_get_contents("php://input"));
//echo $data;
$firstname = $data->firstname;
$middlename = $data->middlename;
$lastname = $data->lastname;
$ssnname = $data->ssnname;
$mobile = $data->mobile;
$email = $data->email;
$gender = $data->gender;
$designation = $data->designation;
$dob = $data->dob;
$address = $data->address;
$state = $data->state;
$town = $data->town;
$zip = $data->zip;

// Insert form data into MySQL
$sql = "INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender,
designation, dob, address, state, town, zip) 
VALUES ('$firstname', '$middlename', '$lastname', '$ssnname', '$mobile', '$email', '$gender', '$designation', '$dob', '$address', '$state', '$town', '$zip')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>  -->



