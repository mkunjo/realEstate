<?php
// Add headers to prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

// Clear session data and destroy the session
$_SESSION = [];
session_unset();
session_destroy();
session_commit();

// Redirect to the index.html page
header("Location: index.html");
exit();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign-out Page</title>
  <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="header">
    <a href="index.html" class="header-buttons">HOME</a>
  </div>
  <h1>See you next time!</h1>
</body>
</html>
