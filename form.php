<?php
header("Content-Type: application/json");


$conn = new mysqli('localhost', 'admin', '1234', 'college');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM angular";
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

$conn->close();
?>
