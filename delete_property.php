<?php
$servername = "localhost";
$username = "mkunjo1";
$password = "mkunjo1";
$dbname = "mkunjo1";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["property_id"])) {
        $property_id = $_POST["property_id"];
        
        // Create the SQL query to delete the property
        $deleteSQL = "DELETE FROM PROPERTY WHERE id = $property_id";

        // Execute the query
        if ($conn->query($deleteSQL) === TRUE) {
            echo "Property with ID $property_id has been deleted.";
        } else {
            echo "Error deleting property: " . $conn->error;
        }
    } else {
        echo "Property ID not provided.";
    }
} else {
    echo "Invalid request method.";
}


$conn->close();
?>

