<?php
$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// $first_name = $_POST["firstname"]; 

// echo $first_name;

// $email = $_POST["email"];
// echo $email;

$first_name = $_POST["firstname"];
//echo $first_name;
$middle_name = $_POST["middlename"];
$last_name = $_POST["lastname"];
$ssn = $_POST["ssn"];
$mobile_num = $_POST["mobile"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$designation = $_POST["designation"];
$date_ofbirth = $_POST["dob"];
$address = $_POST["address"];
// $file = json_decode($_REQUEST['fileName']);

$city = $_POST["city"];
$state = $_POST["state"];
$pincode = $_POST["pincode"];

// $contactNames = json_decode(file_get_contents("php://input"));
$contactNames = json_decode($_POST["contacts"]);

// if ($contactNames !== null) {
//     // $contactNames is an array of contact objects
//     foreach ($contactNames as $contact) {
//         $name = $contact->name;
//         $hours = $contact->hours;
//         $apple = $contact->apple;
//         $ball = $contact->ball;

//         // Print or use the contact values as needed
//         echo "Contact Name: $name";
//     }
// } else {
//     echo "No contact .";
// }


$uploadDir = 'uploads/';
$path = $uploadDir . $_FILES['myFile']['name'];

$filePath = $uploadDir . $file;

if (move_uploaded_file($_FILES['myFile']['tmp_name'], $path)) {
    $query = "
        INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender,
        designation, dob, address, file, state, town, zip)  
        VALUES ('$first_name', '$middle_name', '$last_name', '$ssn', '$mobile_num', '$email', '$gender',
        '$designation', '$date_ofbirth', '$address', '".$_FILES['myFile']['name']."', '$city', '$state', '$pincode')
    ";

    if (mysqli_query($conn, $query)) {
    
        $latest_id = mysqli_insert_id($conn);

        foreach ($contactNames as $contact) {
            $name = $contact->name;
            $hours = $contact->hours;
            $apple = $contact->apple;
            $ball = $contact->ball;
        
            $sql = "INSERT INTO addone (empl_id, name, hours, day, totalamount) 
                    VALUES ('$latest_id', '$name', '$hours', '$apple', '$ball')";
        
            if (mysqli_query($conn, $sql)) {
               
                echo "Contact Name: $name, Hours: $hours, Apple: $apple, Ball: $ball<br>";
            } else {
                echo "Error inserting contact data: " . mysqli_error($conn);
            }
        }
        
    } else {
        echo "Error inserting main data: " . mysqli_error($conn);
    }
}

?>