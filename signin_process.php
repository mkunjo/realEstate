<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $user = "amohamed14";
    $pass = "amohamed14";
    $dbname = "amohamed14";

    //create connection
    $conn = new mysqli($host, $user, $pass, $dbname);
    //check connection
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    } 
    
    // Get data from the form
    $username = $_POST["username"];
    $password = trim($_POST["password"]);

    // Retrieve the hashed password from the database based on the entered username
    $sql = "SELECT password FROM CUSTOMER_INFO WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];
        
        // Verify the entered password against the hashed password
        if (password_verify($password, $hashed_password)) {
            echo "Login successful. Welcome, " . $username;
            // Redirect to a dashboard page.
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Username was incorrect or not found.";
    }

    // Close the connection
    $conn->close();
}
?>
