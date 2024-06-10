<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..//css/table.css">
</head>
<body>



<?php
require"configfile.php";

$sql = "SELECT id, username, firstname FROM users1";
$result = $link ->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Actions</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["firstname"] . "</td>
                <td>
                    <form method='post' action='delete.php' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <input type='submit' value='Delete'>
                    </form>
                    <form method='post' action='update.php' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <input type='submit' value='Update'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$link->close();
?>

    
</body>
</html>