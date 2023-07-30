<?php
$servername = "localhost";
$username = "mkunjo1";
$password = "mkunjo1";
$dbname = "mkunjo1";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the id from the URL
$id = $_GET["id"];

// Create a SELECT query
$sql = "SELECT * FROM PROPERTY WHERE id = $id";

// Execute the query
$result = $conn->query($sql);

// Fetch the property details
$property = $result->fetch_assoc();

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Property</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header>
    <div class="container">
      <nav>
        <h1>Big4-Estate</h1>
        <a href="index.html"><img src="big4-estate-logo.png" class="header-logo"></a>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="sign-in.php">Sign In</a></li>
          <li><a href="sign-up.php">Sign Up</a></li>
          <li><a href="sign-out.php">Sign Out</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <form id="editPropertyForm" action="edit_property_process.php?id=<?= $property['id'] ?>" method="post">

      <input type="hidden" id="propertyId">

      <label for="price">Price:</label>
      <input type="number" id="price" name="price" required value="<?= $property['price'] ?>">

      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required maxlength="50" value="<?= $property['location'] ?>">

      <label for="age">Age:</label>
      <input type="number" id="age" name="age" required value="<?= $property['age'] ?>">

      <label for="floorPlan">Floor Plan (sq ft):</label>
      <input type="number" id="floorPlan" name="floorPlan" required value="<?= $property['floorPlan'] ?>">

      <label for="bedrooms">Bedrooms:</label>
      <input type="number" id="bedrooms" name="bedrooms" required value="<?= $property['bedrooms'] ?>">

      <label for="bathrooms">Bathrooms:</label>
      <input type="number" id="bathrooms" name="bathrooms" required value="<?= $property['bathrooms'] ?>">


      <div class="form-actions">
        <button type="submit">Save Changes</button>
        <a href="sellerdash.php">Cancel</a>
      </div>
    </form>
  </main>

  <footer>
    <p>&copy; 2023 Your Company. All rights reserved.</p>
  </footer>
</body>

</html>