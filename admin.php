<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="index.css">
  <script src="https://kit.fontawesome.com/97d27865aa.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
  <div>
    <table class="table">
      <thead>
        <tr class="table-primary">
           <th>id</th>
           <th>firstname</th>
           <th>Email</th>
           <th>Address</th>
           <th>Image</th> <!-- Add a table header for the image -->
        </tr>
      </thead>
      <tbody>
      <?php
$conn = new mysqli('localhost', 'admin', '1234', 'college');
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

$sql = "SELECT * FROM angular";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            ?> 
            <tr class="table table-striped">
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td>
     <?php echo $row['file']; ?><br>
    
</td>

            </tr> 
            <?php 
        }
    } else {
        echo "No data found in the database.";
    }
} else {
    echo "Error fetching data from the database: " . $conn->error;
}

$conn->close();
?>

      </tbody>
    </table>
  </div>
</body>
</html>
