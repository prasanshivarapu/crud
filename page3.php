<?php
// Step 2: Establish a database connection
$conn = new mysqli('localhost', 'admin', '1234', 'college');
$form_data = json_decode(file_get_contents("php://input"));
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Retrieve data in batches of 10
$limit = 10; // Number of rows to display per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

$offset = ($page - 1) * $limit; // Calculate the offset

$sql = "SELECT * FROM angular LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display data
    echo "<table>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>"; // Replace with your column names
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['mobile'] . "</td>";
        // Add more columns as needed
        echo "</tr>";
    }
    echo "</table>";

    // Step 4: Create "Next" button
    $nextPage = $page + 1;
    $prevPage = $page - 1;

    echo "<div>";
    if ($prevPage > 0) {
        echo "<a href='your_script.php?page=$prevPage'>Previous</a>";
    }
    if ($result->num_rows >= $limit) {
        echo "<a href='your_script.php?page=$nextPage'>Next</a>";
    }
    echo "</div>";
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
