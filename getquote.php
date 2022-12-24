<?php
  // Connect to the database
  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "database_name";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Escape user inputs for security
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  // Attempt insert query execution
  $sql = "INSERT INTO emails (email) VALUES ('$email')";
  if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }

  // Close connection
  mysqli_close($conn);
?>
