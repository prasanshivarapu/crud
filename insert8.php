<?php

$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$data = array();
$error = array();

$form_data = json_decode(file_get_contents("php://input"));

if (!$form_data) {
    $error["error"] = "Error decoding JSON data.";
} else {
    $first_name = $form_data->firstname;
    $middle_name =  $form_data->middlename;
    $last_name = $form_data->lastname;
    $ssn = $form_data->ssnname;
    $mobile_num =  $form_data->mobile;
    $email =  $form_data->email;
    $gender =  $form_data->gender;
    $designation =  $form_data->designation;
    $date_ofbirth = $form_data->dob;
    $address =  $form_data->address;
  //  $file = $_FILES['myFile']['name'];
 // Corrected file name retrieval
 $file = $form_data->myFile;

    $city =  $form_data->state;
    $state =  $form_data->town;
    $pincode =  $form_data->zip;

    $contactNames = $form_data->contacts;

    $dob1 = date('Y-m-d', strtotime($date_ofbirth));
    $path = 'upload/' . $_FILES['file']['name'];
    $query = "
    INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender,
    designation, dob, address, file, state, town, zip)  
    VALUES ('$first_name', '$middle_name', '$last_name', '$ssn', '$mobile_num', '$email', '$gender',
    '$designation', '$dob1', '$address', '$file', '$city', '$state', '$pincode')
    ";

    if (mysqli_query($conn, $query)) {
        $latest_id = mysqli_insert_id($conn);

        foreach ($form_data->contacts as $contact) {
            $name = $contact->name;
            $hours = $contact->hours;
            $apple = $contact->apple;
            $ball = $contact->ball;

            $sql = "INSERT INTO addone (empl_id, name, hours, day, totalamount) 
                    VALUES ('$latest_id', '$name', '$hours', '$apple', '$ball')";

            if (mysqli_query($conn, $sql)) {
                $data["message"] = "Data Inserted...";
            } else {
                $error["error"] = "Error inserting data: " . mysqli_error($conn);
            }
        }
    } else {
        $error["error"] = "Error inserting data: " . mysqli_error($conn);
    }
}

// Send a JSON response with the result
if (!empty($error)) {
    echo json_encode($error);
} else {
    echo json_encode($data);
}

?>

