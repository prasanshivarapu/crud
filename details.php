<?php
$form_data = json_decode(file_get_contents("php://input"));
$data = [];

$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// Assuming your JSON data contains an 'id' field.
//$id = $conn->real_escape_string($form_data->id);  Sanitize input.

$sql = "SELECT * FROM angular WHERE id = '$form_data'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // echo $row['firstname'];
    // echo json_encode($row);
    $data['msg']=$row ;
  //echo $data['msg'] ;
$id = $data['msg']['id']  ;
  $firstname = $data['msg']['firstname'];
  $middlename = $data['msg']['middlename'];
  $lastname = $data['msg']['lastname'];
  $ssn = $data['msg']['ssn'];
  $mobile = $data['msg']['mobile'];
  $email= $data['msg']['email'];
  $gender= $data['msg']['gender'];
  $designation= $data['msg']['designation'];
  $address= $data['msg']['address'];
  $dob= $data['msg']['dob'];
  $state= $data['msg']['state'];
  $town= $data['msg']['town'];
  $zip= $data['msg']['zip'];
  $file = $data['msg']['file'];
$data = array(
    'id'=>$id,
    'firstname'=>$firstname,
    'lastname'=>$lastname,
    'middlename'=>$middlename,
    'ssn'=>$ssn,
    'mobile'=>$mobile,
    'email'=>$email,
    'gender'=>$gender,
    'designation'=>$designation,
    'address'=>$address,
    'dob'=>$dob,
    'state'=>$state,
    'town'=>$town,
    'zip'=>$zip,
    'file'=>$file
);
echo json_encode($data);
     // Echo the entire row as JSON
} else {
    echo "No records found";
}

$conn->close();
?>