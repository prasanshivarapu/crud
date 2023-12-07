<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $requestData = json_decode(file_get_contents('php://input'));
     $result = $requestData->id;
  // echo $requestData;
    echo json_encode($requestData);
    echo json_encode($result);

$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM addone where empl_id= json_encode($result)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(array()); 
}
} 





 $conn->close();
?>
