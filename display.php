<?php

// Connect to the MySQL database
$db = mysqli_connect("localhost", "username", "password", "database_name");

// Check the connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = mysqli_real_escape_string($db, $_POST["name"]);
    $phone = mysqli_real_escape_string($db, $_POST["phone"]);
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $comment = mysqli_real_escape_string($db, $_POST["comment"]);

    // Define the query to insert the data into the database
    $query = "INSERT INTO comments (name, phone, email, comment) VALUES ('$name', '$phone', '$email', '$comment')";

    // Execute the query
    mysqli_query($db, $query);

    // Redirect to the display page
    header("Location: display.php");
    exit;
}

// Define the query to select all comments
$query = "SELECT * FROM comments";

// Execute the query and store the result
$result = mysqli_query($db, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($db));
}

// Loop through the result and print the name, phone, email, and comment for each row
while ($row = mysqli_fetch_assoc($result)) {
    echo "Name: " . $row['name'] . "<br>";
    echo "Phone: " . $row['phone'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Comment: " . $row['comment'] . "<br><br>";
}

// Close the database connection
mysqli_close($db);

?>
