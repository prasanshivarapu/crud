<!-- <?php
$conn = new mysqli('localhost', 'admin', '1234', 'college');
$form_data = json_decode(file_get_contents("php://input"));
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}
$sql = "SELECT * FROM  angular";

//  $_SESSION["favcolor"]

$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo $row['email'] ;
?> -->




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
           <th>Id</th>
           <th>FIRST NAME</th>
           <th>LAST NAME</th>
           <th>EMAIL</th>
           <th>MOBILE NUMBER</th>
        </tr>
      </htead>
        <tbody>


        <?php 
    $conn = new mysqli('localhost', 'admin', '1234', 'college');
    $form_data = json_decode(file_get_contents("php://input"));
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM  angular";    


$result = $conn->query($sql);

        if($result->num_rows  > 0){
          
          while ($row = $result->fetch_assoc()) { 
         
            ?> 
         <tr class="table-info">
             <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['firstname'];?> </td>
              <td><?php echo $row['lastname'];?> </td>
              <td> <?php echo $row['email']; ?></td>
             <td><?php  echo $row['mobile'] ; ?></td>
            </tr> 

            
            <?php 
          }
        }else{
          echo "Data not found";
        
         
        }
       ?>
            

           
        </tbody>
      
    </table>







 
  </div>
</body>
</html>