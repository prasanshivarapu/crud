<?php
// Create a database connection
$conn = new mysqli('localhost', 'admin', '1234', 'college');

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// Get JSON data from the AngularJS form
$form_data = json_decode(file_get_contents("php://input"));

    $formData = $form_data['formData'];

    // Access the contacts array
    $contacts = $form_data['contacts'];
echo $contacts ;
?>
<!-- // Initialize an empty response array
// $data = array();

// // Extract data from the JSON object
// $first_name = $form_data->firstname;
// $middle_name = $form_data->middlename;
// $last_name = $form_data->lastname;
// $ssn = $form_data->ssnname;
// $mobile_num = $form_data->mobile;
// $email = $form_data->email;
// $gender = $form_data->gender;
// $designation = $form_data->designation;
// $date_ofbirth = $form_data->dob;
// $address = $form_data->address;
// $file = $form_data->firstme;
// $city = $form_data->state;
// $state = $form_data->town;
// $pincode = $form_data->zip;
//  $contactNames = $form_data->contacts;
//     var_dump($contactNames);

// $dob1 = date('Y-m-d', strtotime($date_ofbirth));


// $query = "INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender, designation, dob, address, file, state, town, zip)
//           VALUES ('$first_name', '$middle_name', '$last_name', '$ssn', '$mobile_num', '$email', '$gender', '$designation', '$dob1', '$address', '$file', '$city', '$state', '$pincode')";

// if (mysqli_query($conn, $query)) {
//     $data["message"] = "Data Inserted Successfully";
    
//     // Extract the contact names from the form data
   
//     // Insert contact names into the "your_contact_table" table
//     foreach ($contactNames as $contact) {
//         $name = mysqli_real_escape_string($conn, $contact->name);
//         $hours = mysqli_real_escape_string($conn, $contact->hours);
//         $apple = mysqli_real_escape_string($conn, $contact->apple);
//         $amount = mysqli_real_escape_string($conn, $contact->amount);
//         echo $amount ;
//         $sql = "INSERT INTO addone (name, hours, day, totalamount) VALUES ('$name', '$hours', '$apple', '$amount')";
        
//         if (!mysqli_query($conn, $sql)) {
//             $data["error"] = "Error inserting contact data: " . mysqli_error($conn);
//             break; // Exit the loop if there is an error
//         }
//     }
// } else {
//     $data["error"] = "Error inserting main data: " . mysqli_error($conn);
// }

// // Return the response as JSON
// echo json_encode($data);

// // Close the database connection
// mysqli_close($conn);
 -->
