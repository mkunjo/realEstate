<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Dashboard</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
<header>
        <div class="container">
            <nav>
                <h1>Seller Dashboard</h1>
                <a href="index.html"><img src="big4-estate-logo.png" class="header-logo"></a>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="sign-out.php">Sign Out</a></li>
                </ul>
            </nav>
        </div>
    </header>

  <main>
    <div class="dashboard">
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

      // Fetch all properties from the db
      $result = $conn->query("SELECT * FROM PROPERTY");

      // Loop over the results and create a card for each property
      while($row = $result->fetch_assoc()) {
      ?>

      <div class="property-card">
        <img class="card-image "src="property.png" alt="Property Image">
        <h2>$<?= $row["price"] ?></h2>
        <p><?= $row["location"] ?></p>
        <p>Age: <?= $row["age"] ?> years</p>
        <p>Floor Plan: <?= $row["floorPlan"] ?> sq ft</p>
        <p>Bedrooms: <?= $row["bedrooms"] ?></p>
        <p>Bathrooms: <?= $row["bathrooms"] ?></p>
        <div class="card-actions">
          <a href="#">View Details</a>
          <a href="edit_property.php?id=<?= $row["id"] ?>">Edit Property</a>
          <a href="delete_property.php?id=<?= $row["id"] ?>">Delete Property</a>
        </div>
      </div>

      <?php
      }

      // Close database connection
      $conn->close();
      ?>

      <!-- Add more property cards here based on data from the backend -->
    </div>

    <!-- Add a button or link to add a new property -->
    <a href="add_propertyForm.html">Add Property</a>
  </main>

  <footer>
    <p>&copy; 2023 Your Company. All rights reserved.</p>
  </footer>
  <script src="script.js"></script>
</body>

</html>
