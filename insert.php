                <?php

                $conn = new mysqli('localhost', 'admin', '1234', 'college');
                $form_data = json_decode(file_get_contents("php://input"));
                if ($conn->connect_error) {
                    die("Connection error: " . $conn->connect_error);
                }
                $data = array();
                // $error = array();


                $first_name =  json_decode($_REQUEST['firstname']);
                echo $first_name;
                $middle_name = json_decode($_REQUEST['middlename']);
                $last_name =  json_decode($_REQUEST['lastname']);
                $ssn = json_decode($_REQUEST['ssnname']); 
                $mobile_num =  json_decode($_REQUEST['mobile']);
                $email =  json_decode($_REQUEST['email']);
                $gender =  json_decode($_REQUEST['gender']);
                $designation =  json_decode($_REQUEST['designation']);
                $date_ofbirth =  json_decode($_REQUEST['dob']);
                $address =  json_decode($_REQUEST['address']);
                // $file = json_decode($_REQUEST['fileName']);

                $city =  json_decode($_REQUEST['state']);
                $state =  json_decode($_REQUEST['town']);
                $pincode = json_decode($_REQUEST['zip']);

                $contactNames =  json_decode($_REQUEST['contacts']);
                // var_dump($contactNames);
                // echo $form_data->name;
                $uploadDir = 'uploads/';
                $path = $uploadDir . $_FILES['myFile']['name'];

                $filePath = $uploadDir . $file;
                // $dob1 = date('Y-m-d', strtotime($date_ofbirth));
                  if(move_uploaded_file($_FILES['myFile']['tmp_name'], $path)){
                    $query = "
                        INSERT INTO angular (firstname, middlename, lastname, ssn, mobile, email, gender,
                        designation, dob, address, file, state, town, zip)  
                        VALUES ('$first_name', '$middle_name', '$last_name', '$ssn', '$mobile_num', '$email', '$gender',
                        '$designation', '$date_ofbirth', '$address', '".$_FILES['myFile']['name']."', '$city', '$state', '$pincode')
                    ";
                    $data["message"] = "Data Inserted";
                    if (mysqli_query($conn, $query)) {
                      // Get the ID of the inserted record
                      $latest_id = mysqli_insert_id($conn);

                      foreach ($contactNames as $contact) {
                          $name = $contact->name;
                          $hours = $contact->hours;
                          $apple = $contact->apple;
                          $ball = $contact->ball;

                          $sql = "INSERT INTO addone (empl_id, name, hours, day, totalamount) 
                                  VALUES ('$latest_id', '$name', '$hours', '$apple', '$ball')";
                      }
                if (mysqli_query($conn, $sql)) {
                  // $data["message"] = "Data Inserted";
                }
                 }
               }

                echo json_encode($data["message"]);
               ?> 