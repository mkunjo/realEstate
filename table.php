<?php
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

//sql to create table
$sql = "CREATE TABLE CUSTOMER_INFO(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, email VARCHAR(100) NOT NULL, username VARCHAR(30) NOT NULL, password VARCHAR(80) NOT NULL)";

if($conn->query($sql) === TRUE){
    echo "Table CUSTOMER_INFO created succesfully";
}else{
    echo "Error creating table: ".$conn->error;
}
$conn->close();
?>