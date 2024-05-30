<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Create User</h2>
<form method="post" action="create.php">
  Name:<br>
  <input type="text" name="name">
  <br>
  Email:<br>
  <input type="text" name="email">
  <br><br>
  <input type="submit" value="Submit">
</form> 
<button onclick="window.location.href='read.php';">Show Data</button>
</body>
</html>
