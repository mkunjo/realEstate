<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $user = "amohamed14";
    $pass = "amohamed14";
    $dbname = "amohamed14";

    //create connection
    $conn = new mysqli($host, $user, $pass, $dbname);
    //check connection
    if($conn->connect_error){
        die("connection failed: ".$conn->connect_error);
    }

    if(isset($_POST['submit'])){
        // Get data from the form
        $first_name= $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO CUSTOMER_INFO(first_name, last_name, email,username,password)VALUES('$first_name', '$last_name','$email','$username','$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Data saved successfully.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
}
?>
