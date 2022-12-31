<?php
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "root123";
  $dbname = "db_contact";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Escape user inputs for security
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $tel = mysqli_real_escape_string($conn, $_POST['tel']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  
  // Attempt insert query execution
  $sql = "INSERT INTO `quotes` (`ID`, `name`, `tel`, `email`, `message`) VALUES ('0', '$name','$tel','$email','$message')";
  
  //check if query was successful
  if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }

  // Close connection
  mysqli_close($conn);
?>
