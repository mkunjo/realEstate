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

//Get the id from the URL and the new details from the form
$id = $_GET["id"];
$location = $_POST["location"];

//Create an UPDATE query
$sql = "UPDATE PROPERTY SET location = '$location' WHERE id = $id";

//Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    //Redirect back to the dashboard after the update
    header("Location: sellerdash.php");
} else {
    echo "Error updating record: " . $conn->error;
}

//Close database connection
$conn->close();
?>
