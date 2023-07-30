<?php
// Connect to your MySQL db
$servername = "localhost";
$username = "mkunjo1";
$password = "mkunjo1";
$dbname = "mkunjo1";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get property id from the URL
$propertyId = $_GET['id'];

// Fetch property details from the db
$result = $conn->query("SELECT * FROM PROPERTY WHERE id = $propertyId");

// Get the property details
$property = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Property Details</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <h1>Big4-Estate</h1>
                <a href="index.html"><img src="big4-estate-logo.png" class="header-logo"></a>
                <ul>
                    <li><a href="index.html" class="myButton">Home</a></li>
                    <li><a href="sellerdash.php" class="myButton">Dashboard</a></li>
                    <li><a href="sign-out.php" class="myButton">Sign Out</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <img class="details-image " src="property.png" alt="Property Image">
        <h1>Property Details</h1>
        <p>Price: $<?= $property["price"] ?></p>
        <p>Location: <?= $property["location"] ?></p>
        <p>Age: <?= $property["age"] ?> years</p>
        <p>Floor Plan: <?= $property["floorPlan"] ?> sq ft</p>
        <p>Bedrooms: <?= $property["bedrooms"] ?></p>
        <p>Bathrooms: <?= $property["bathrooms"] ?></p>
    </div>
</body>

</html>

<?php
// Close database connection
$conn->close();
?>