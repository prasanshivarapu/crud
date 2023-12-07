<?php

$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$data = array();
$error = array();

$form_data = json_decode(file_get_contents("php://input"));
  $path = 'upload/' . $_FILES['file']['name']; 

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
    // Corrected file name retrieval
    $file = $form_data->myFile;

    $city =  $form_data->state;
    $state =  $form_data->town;
    $pincode =  $form_data->zip;

    $contactNames = $form_data->contacts;

    $dob1 = date('Y-m-d', strtotime($date_ofbirth));

   
        $query = "
        INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender,
        designation, dob, address, file, state, town, zip)  
        VALUES ('$first_name', '$middle_name', '$last_name', '$ssn', '$mobile_num', '$email', '$gender',
        '$designation', '$dob1', '$address', '$uniqueFileName', '$city', '$state', '$pincode')
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
    // } else {
    //     $error["error"] = "Error uploading the file.";
    // }


// Send a JSON response with the result
if (!empty($error)) {
    echo json_encode($error);
} else {
    echo json_encode($data);
}

?>































































<!-- <?php

$conn = new mysqli('localhost', 'admin', '1234', 'college');
$form_data = json_decode(file_get_contents("php://input"));
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
$data = array();
 $error = array();

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
$file = $form_data->fileInput ;

$city =  $form_data->state;
$state =  $form_data->town;
$pincode =  $form_data->zip;

 $contactNames = $form_data->contacts;
// var_dump($contactNames);
// echo $form_data->name;

$dob1 = date('Y-m-d', strtotime($date_ofbirth));
    $query = "
    INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender,
    designation, dob, address,file, state, town, zip)  VALUES ('$first_name','$middle_name', '$last_name','$ssn','$mobile_num','$email','$gender','$designation','$dob1', '$address',
      '$file', '$city','$state','$pincode')
    ";
    
    if (mysqli_query($conn, $query)) {
      $data["message"] = "Data Inserted..."; // You can update this message if needed
  } else {
      $error["error"] = "Error inserting data: " . mysqli_error($conn);
  }
 




    foreach ($form_data->contacts as $contact) {
      // Assuming the structure of your 'addone' table matches the fields in your contact objects
      $name = $contact->name;
      $hours = $contact->hours;
      $apple = $contact->apple;
      $ball = $contact->ball;
      $latest_id = 0;
      $sqll = "SELECT id FROM angular ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sqll);
  
      if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
          $latest_id = $row["id"];
          // echo $latest_id;
      }
      } else {
      echo "0 results";
      }
      // Create and execute the SQL query to insert the contact data into the database
      $sql = "INSERT INTO addone (empl_id,name, hours, day, totalamount) VALUES ('$latest_id','$name', '$hours', '$apple', '$ball')";
      if (mysqli_query($conn, $sql)) {
        $data["message"] = "Data Inserted...";
    } else {
        echo "fail" ;
    }
    
  }
  




  // echo "Data saved successfully!";
echo json_encode($data);
?> -->