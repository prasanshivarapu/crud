<?php
$connect = mysqli_connect("localhost", "root", "", "mydbpdo");
$form_data = json_decode(file_get_contents("php://input"));
  
echo $_REQUEST['requestData'];
//print_r($_REQUEST['form_data']);

$obj = json_decode($_REQUEST['requestData']);
echo $obj->formData->userFirstName;

$data = array();
$error = array();
// echo $form_data['employees'];
// echo $form_data['formData'];
// $first_name = "Trst";
// print_r($form_data->requestData);
    $first_name = $obj->formData->userFirstName;
    $middle_name = $obj->formData->userMiddleName;
    $last_name =  $obj->formData->userLastName;
    $ssn =  $obj->formData->userssn; 
    $mobile_num = $obj->formData->cell; 
    $email = $obj->formData->email; 
    $gender = $obj->formData->myVar; 
    $designation = $obj->formData->role; 
    $date_ofbirth = $obj->formData->dob; 
    $address = $obj->formData->area;
    $city = $obj->formData->town; 
    $state = $obj->formData->state; 
    $pincode = $obj->formData->pincode; 
    
    // $query = "INSERT INTO employee(firstname, middlename, lastname, ssn, mobilenum,email,gender,designation,dateofbirth, addresss,city,statee,pincode) 
    //    VALUES ('$first_name','$middle_name', '$last_name','$ssn','$mobile_num','$email','$gender','$designation','$date_ofbirth', '$address',
    //    '$city','$state','$pincode')";
    
    $path = 'uploads/' . $_FILES['file']['name'];

      // if(!empty($_FILES))  
      // {  
      //     $path = 'uploads/' . $_FILES['file']['name'];  
      //     if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
      //     {   
                // $query = "INSERT INTO employee(firstname, middlename, lastname, ssn, mobilenum,email,gender,designation,dateofbirth, addresss,city,statee,pincode,emp_image) 
                //     VALUES ('$first_name','$middle_name', '$last_name','$ssn','$mobile_num','$email','$gender','$designation','$date_ofbirth', '$address',
                //     '$city','$state','$pincode','".$_FILES['file']['name']."')";
                // if(mysqli_query($connect, $query))  
                // {  
                //     echo 'File Uploaded';  
                // }  
                // else  
                // {  
                //     echo 'File Uploaded But not Saved';  
                // }  
      //     }  
      // }  
      // else  
      // {  
      //     echo 'Some Error';  
      // }  


      if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {

        $query = "INSERT INTO employee(firstname, middlename, lastname, ssn, mobilenum,email,gender,designation,dateofbirth, addresss,city,statee,pincode,emp_image) 
                    VALUES ('$first_name','$middle_name', '$last_name','$ssn','$mobile_num','$email','$gender','$designation','$date_ofbirth', '$address',
                    '$city','$state','$pincode','".$_FILES['file']['name']."')";

        if(mysqli_query($connect, $query))
          {
            $data["message"] = "Data Inserted successfully...";
          } 
      }

   include "savedata.php";

echo json_encode($data);
?>