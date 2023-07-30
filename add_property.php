<?php
// Retrieve data from add_propertyForm
$seller_name = $_POST['seller_name'];
$age = $_POST['age'];
$floorPlan= $_POST['floorPlan'];
$price = str_replace(',', '', $_POST['price']); // Remove commas from property_cost
$bedrooms = $_POST['bedrooms'];
$bathrooms = $_POST['bathrooms'];
$location = $_POST['location'];
$property_garden = isset($_POST['property_garden']) ? $_POST['property_garden'] : 'no';
$property_parking = isset($_POST['property_parking']) ? $_POST['property_parking'] : 'no';
$property_mainroads = $_POST['property_mainroads'];
$price_float = (float) $price;
$property_tax = $price_float * 0.07;

// Connect to MySQL db
$servername = "localhost";
$username = "mkunjo1";
$password = "mkunjo1";
$dbname = "mkunjo1";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the table if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS PROPERTY(
    id INT AUTO_INCREMENT PRIMARY KEY,
    seller_name VARCHAR(255),
    age INT,
	floorPlan INT,
    price DECIMAL(10,2),
    bedrooms INT,
    bathrooms INT,
    location VARCHAR(255),
    property_garden VARCHAR(255),
    property_parking VARCHAR(255),
    property_mainroads VARCHAR(255),
    property_tax DECIMAL(10,2)
)";

if ($conn->query($createTableSQL) === TRUE) {
    echo "Table 'PROPERTY' created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert data into the table
$insertSQL = "INSERT INTO PROPERTY (seller_name, age, floorPlan, price, bedrooms, bathrooms, location, property_garden, property_parking, property_mainroads, property_tax)
VALUES ('$seller_name', $age, $floorPlan, $price_float, $bedrooms, $bathrooms, '$location', '$property_garden', '$property_parking', '$property_mainroads', $property_tax)";

/* Added var_dump statements to check the received and final values
var_dump($_POST);
var_dump($price_float);
var_dump($property_tax); */

if ($conn->query($insertSQL) === TRUE) {
    echo "PROPERTY data inserted successfully into the table.";
    header('Location: sellerdash.php');
    exit();
} else {
    echo "Error inserting data: " . $conn->error;
	echo "Query: " . $insertSQL;
}

// Close database connection
$conn->close();
?>
