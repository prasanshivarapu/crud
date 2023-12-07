<?php
// Update database connection details

$conn = new mysqli('localhost', 'admin', '1234', 'college');

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$data = array();
$error = array();

$form_data = json_decode(file_get_contents("php://input"));

$first_name = $form_data->firstname;
$middle_name = $form_data->middlename;
$last_name = $form_data->lastname;
$ssn = $form_data->ssnname;
$mobile_num = $form_data->mobile;
$email = $form_data->email;
$gender = $form_data->gender;
$designation = $form_data->designation;
$date_ofbirth = $form_data->dob;
$address = $form_data->address;
$file = $form_data->fileName;

$city = $form_data->state;
$state = $form_data->town;
$pincode = $form_data->zip;

$contactNames = $form_data->contacts;
$uploadDir = 'uploads/'; 


$filePath = $uploadDir . $file;
$dob1 = date('Y-m-d', strtotime($date_ofbirth));

if (move_uploaded_file($_FILES['myFile']['tmp_name'], $filePath)) {
   
    $query = "
        INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender,
        designation, dob, address, file, state, town, zip)  
        VALUES ('$first_name', '$middle_name', '$last_name', '$ssn', '$mobile_num', '$email', '$gender',
        '$designation', '$dob1', '$address', '".$_FILES['file']['name']."', '$city', '$state', '$pincode')
    ";

   
    if (mysqli_query($conn, $query)) {
        $latest_id = mysqli_insert_id($conn);

        foreach ($contactNames as $contact) {
            $name = $contact->name;
            $hours = $contact->hours;
            $apple = $contact->apple;
            $ball = $contact->ball;

           
            $sql = "INSERT INTO your_contacts_table_name (empl_id, name, hours, day, totalamount) 
                    VALUES ('$latest_id', '$name', '$hours', '$apple', '$ball')";

            
            if (mysqli_query($conn, $sql)) {
                $data["message"] = "Data Inserted Successfully!";
            } else {
                $error["error"] = "Error inserting data: " . mysqli_error($conn);
            }
        }
    } else {
        $error["error"] = "Error inserting data into your_table_name: " . mysqli_error($conn);
    }
} else {
    $error["error"] = "Error uploading the file.";
}


if (!empty($error)) {
    echo json_encode($error);
} else {
    echo json_encode($data);
}


$conn->close();
?>
