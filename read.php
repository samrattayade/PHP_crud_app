<?php
include 'db.php';

$sql = "SELECT id, name, email, created_at FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<body>

<h2>Users List</h2>

<button onclick="window.location.href='create.php';">Add Info</button>


<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["created_at"]."</td>
                    <td><a href='update.php?id=".$row["id"]."'>Edit</a> | <a href='delete.php?id=".$row["id"]."'>Delete</a></td>
                  </tr>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
