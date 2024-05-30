<?php
include 'db.php';

// Check if 'id' is set in the URL and assign it to a variable
if (!isset($_GET['id'])) {
    die("ID not specified.");
}
$id = $_GET['id'];

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Validate input
    if (empty($name) || empty($email)) {
        echo "Name and email cannot be empty.";
    } else {
        // Update the record
        $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
            header('Location: read.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch the current user data
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    die("User not found.");
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Update User</h2>
<form method="post" action="update.php?id=<?php echo $id; ?>">
  Name:<br>
  <input type="text" name="name" value="<?php echo $row['name']; ?>">
  <br>
  Email:<br>
  <input type="text" name="email" value="<?php echo $row['email']; ?>">
  <br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
