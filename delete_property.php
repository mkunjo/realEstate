<?php
$servername = "localhost";
$username = "mkunjo1";
$password = "mkunjo1";
$dbname = "mkunjo1";
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Get the id from the URL
$id = $_GET["id"];

//Create a DELETE query
$sql = "DELETE FROM PROPERTY WHERE id = $id";

// Query execution
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    //Redirect back to the dashboard after deletion
    header("Location: sellerdash.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close database connection
$conn->close();
?>
