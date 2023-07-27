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

        // Check if the username already exists in the database
        $check_username_query = "SELECT * FROM CUSTOMER_INFO WHERE username = '$username'";
        $check_username_result = $conn->query($check_username_query);

        // Check if the email already exists in the database
        $check_email_query = "SELECT * FROM CUSTOMER_INFO WHERE email = '$email'";
        $check_email_result = $conn->query($check_email_query);

        if ($check_username_result->num_rows > 0) {
            echo "Username is already taken. Please choose a different one.";
        } elseif ($check_email_result->num_rows > 0) {
            echo "Email is already taken. Please choose a different one.";
        } else {
            // Insert data into the database
            $sql = "INSERT INTO CUSTOMER_INFO(first_name, last_name, email, username, password) VALUES ('$first_name', '$last_name', '$email', '$username', '$hashed_password')";

            if ($conn->query($sql) === TRUE) {
                header("Location: sign-in.html");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }

    // Close the connection
    $conn->close();
}
?>
